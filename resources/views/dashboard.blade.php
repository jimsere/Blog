@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4" style="font-family: 'Great Vibes', cursive; font-size: 60px;">Admin Dashboard</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2 class="mb-3">📋 Χρήστες</h2>
    <div class="table-responsive mb-5">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Όνομα</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Ενέργειες</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->is_admin ? 'Ναι' : 'Όχι' }}</td>
                        <td>
                            @if (!$user->is_admin)
                                <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" onsubmit="return confirm('Σίγουρα;');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Διαγραφή</button>
                                </form>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    <h2 class="mb-3">📢 Αναφορές Posts</h2>
    <div class="table-responsive mb-5">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Post ID</th>
                    <th>Τίτλος</th>
                    <th>Αριθμός Αναφορών</th>
                    <th>Λόγοι</th>
                    <th>Ενέργειες</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reportedPosts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->reports_count }}</td>
                        <td>
                            <ul>
                                @foreach ($post->reports->groupBy('reason') as $reason => $group)
                                    <li>{{ $reason }} ({{ $group->count() }})</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <form action="{{ route('post.delete', $post->slug) }}" method="POST" onsubmit="return confirm('Διαγραφή post;');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">🗑️ Διαγραφή</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    <h2 class="mb-3">📝 Posts</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Τίτλος</th>
                    <th>Κατηγορία</th>
                    <th>Συντάκτης</th>
                    <th>Ενέργειες</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category }}</td>
                        <td>{{ $post->user->name ?? 'Άγνωστος' }}</td>
                        <td>
                            <form action="{{ route('post.delete', $post->slug) }}" method="POST" onsubmit="return confirm('Είσαι σίγουρος ότι θέλεις να διαγράψεις αυτό το post;');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">🗑️ Διαγραφή</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

