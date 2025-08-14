<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Purifier;
use App\Models\Post;
use Auth;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index(){
        $posts = Post::all();
        // return $posts;
       return view('posts', ['posts' => $posts]);
        
    }

    public function hello($name){
        return "Hello $name";
    }

    public function newpost(Request $request)
{
    if ($request->isMethod('post')) {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category' => 'nullable|string',
            'image' => 'nullable|image|max:1024', // Μέγιστο μέγεθος: 1MB
        ]);

        // Local Profanity Check
        $badWords = ['fuck', 'shit', 'asshole', 'bitch', 'bastard', 'dick', 'cunt','μαλάκας','γαμώ','μουνί','πούτσα'];
        $content = strtolower($request->input('body'));

        foreach ($badWords as $word) {
            if (str_contains($content, $word)) {
                return back()->withErrors(['body' => 'Το κείμενο περιέχει ακατάλληλες λέξεις.'])->withInput();
            }
        }

        // OpenAI Moderation API
        $response = \Http::withToken(env('OPENAI_API_KEY'))
            ->post('https://api.openai.com/v1/moderations', [
                'input' => $request->input('body'),
            ]);

        if ($response->failed()) {
            return back()->withErrors(['body' => 'Σφάλμα στον έλεγχο περιεχομένου.'])->withInput();
        }

        $result = $response->json();

        if ($result['results'][0]['flagged']) {
            return back()->withErrors(['body' => 'Το κείμενο θεωρήθηκε ακατάλληλο.'])->withInput();
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('temp'); // προσωρινή αποθήκευση
            $imageUrl = asset('storage/' . $imagePath);
        
            $response = \Http::get('https://api.sightengine.com/1.0/check.json', [
                'models' => 'nudity,wad,offensive',
                'api_user' => env('SIGHTENGINE_API_USER'),
                'api_secret' => env('SIGHTENGINE_API_SECRET'),
                'url' => $imageUrl,
            ]);
        
            if ($response->failed()) {
                \Storage::delete($imagePath);
                return back()->withErrors(['image' => 'Σφάλμα στον έλεγχο εικόνας.'])->withInput();
            }
        
            $result = $response->json();
        
            if (
                $result['nudity']['raw'] > 0.5 ||
                $result['nudity']['partial'] > 0.5 ||
                $result['offensive']['prob'] > 0.5
            ) {
                \Storage::delete($imagePath);
                return back()->withErrors(['image' => 'Η εικόνα θεωρήθηκε ακατάλληλη.'])->withInput();
            }
        
            // Αν περάσει, αποθηκεύουμε για μεταφορά παρακάτω
            $finalImageName = time() . '_' . $request->file('image')->getClientOriginalName();
            \Storage::move($imagePath, 'public/uploads/' . $finalImageName);
        }
        


        $post = new Post();
        $post->title = $request->title;
        $post->body = Purifier::clean($request->body);
        $post->category = $request->category;
        $post->user_id = Auth::id();

        // Αποθήκευση εικόνας αν υπάρχει
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/uploads', $filename);
            $post->image = $filename;
        }

        $post->save(); // εδώ ενεργοποιείται το booted() => created() στο model

        return redirect('/posts')->with('success', 'Το post ανέβηκε με επιτυχία!');
    }

    return view('newpost');
}


public function search(Request $request)
{
    $q = $request->get('q');
    $category = $request->get('category');

    $query = Post::query();

    // Αν υπάρχει λέξη-κλειδί
    if (!empty($q)) {
        $query->where(function ($subQuery) use ($q) {
            $subQuery->where('title', 'like', '%' . $q . '%')
                     ->orWhere('body', 'like', '%' . $q . '%');
        });
    }

    // Αν υπάρχει επιλεγμένη κατηγορία
    if (!empty($category)) {
        $query->where('category', $category);
    }

    $posts = $query->get();

    return view('posts', ['posts' => $posts]);
}



public function post(Post $post)
{
    $postKey = 'viewed_post_' . $post->id;

    // Αν δεν υπάρχει ήδη στο session, αύξησέ το
    if (!session()->has($postKey)) {
        $post->increment('views');
        session()->put($postKey, true);
    }

    return view('post', compact('post'));
}


public function edit_post(Post $post, Request $request)
{
    if ($request->isMethod('post')) {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category' => 'nullable|string',
            'image' => 'nullable|image|max:1024', // 1MB μέγιστο
        ]);

        // Αντικαθιστούμε τα πεδία
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->category = $request->get('category');

        // Νέα εικόνα, αν υπάρχει
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/uploads', $filename);
            if (isset($finalImageName)) {
                $post->image = $finalImageName;
            }
        }

        $post->save();

        return redirect('/posts')->with('success', 'Η ανάρτηση ενημερώθηκε με επιτυχία!');
    }

    return view('edit_post', ['post' => $post]);
}


public function delete_post(Post $post){
    if(\Auth::user()->id != $post->user->id) return redirect('posts');

    $post->delete();
    return redirect('posts');

   
}
public function category($slug)
{
    $categories = [
        'psikhologia' => 'Ψυχολογία',
        'mousiki' => 'Μουσική',
        'politiko' => 'Πολιτικό',
        'tainies' => 'Ταινίες',
        'hobby' => 'Χόμπι',
        'athlisi' => 'Άθληση',
        'vivlia' => 'Βιβλία',
        'syntages-faghto' => 'Συνταγές & Φαγητό',
        'texnologia' => 'Τεχνολογία',
        'taxidia' => 'Ταξίδια',
        'gaming' => 'Gaming',
        'epikairotita' => 'Επικαιρότητα',
        'prosopika' => 'Προσωπικά',
        'fysi-perivallon' => 'Φύση & Περιβάλλον',
        'idees-empnefsi' => 'Ιδέες & Έμπνευση',
        'hobby-diy' => 'Χόμπι & DIY',
    ];

    if (!array_key_exists($slug, $categories)) {
        abort(404);
    }
    
    $categoryName = $categories[$slug]; // π.χ. 'Μουσική'
    
    $posts = Post::where('category', $categoryName)->latest()->get();
    
    return view('posts', compact('posts'));
    
}

public function report(Request $request, Post $post)
{
    $request->validate([
        'reason' => 'required|string|max:255',
    ]);

    // Αποφυγή διπλής αναφοράς από τον ίδιο χρήστη
    $existing = \App\Models\PostReport::where('post_id', $post->id)
        ->where('user_id', auth()->id())
        ->first();

    if ($existing) {
        return back()->with('error', 'Έχεις ήδη αναφέρει αυτό το post.');
    }

    \App\Models\PostReport::create([
        'post_id' => $post->id,
        'user_id' => auth()->id(),
        'reason' => $request->reason,
    ]);

    return back()->with('success', 'Η αναφορά σου υποβλήθηκε.');
}

}