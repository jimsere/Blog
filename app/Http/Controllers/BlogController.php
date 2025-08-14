<?php

namespace App\Http\Controllers;

use App\Models\Blog; // μην ξεχάσεις το model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    public function store(Request $request)
{
    // Validation
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    // Local Profanity check
    $badWords = ['fuck', 'shit', 'asshole', 'bitch', 'bastard', 'dick', 'cunt'];

    $content = strtolower($request->input('content'));

    foreach ($badWords as $word) {
        if (str_contains($content, $word)) {
            return back()->withErrors(['content' => 'Το κείμενο περιέχει ακατάλληλες λέξεις.']);
        }
    }

    // Κλήση στο OpenAI Moderation API
    $response = Http::withToken(env('OPENAI_API_KEY'))
        ->post('https://api.openai.com/v1/moderations', [
            'input' => $request->input('content'),
        ]);

    if ($response->failed()) {
        return back()->withErrors(['content' => 'Σφάλμα στον έλεγχο περιεχομένου.']);
    }

    $result = $response->json();

    if ($result['results'][0]['flagged']) {
        return back()->withErrors(['content' => 'Το κείμενο περιέχει ακατάλληλο περιεχόμενο.']);
    }

    // Αποθήκευση
    Blog::create([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('blogs.index')->with('success', 'Το blog ανέβηκε με επιτυχία.');
}

}
