@extends('layouts.app')

@section('content')
    
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white">{{ $post->title }}</h1>
    <p class="mt-2 text-gray-600 dark:text-gray-300">{{ $post->body }}</p>

    <h2 class="mt-8 mb-4 text-2xl font-semibold text-gray-700 dark:text-gray-200">Comments</h2>
    @forelse ($post->comments as $comment)
        <div class="mt-4 p-4 bg-white dark:bg-gray-800 shadow rounded-md">
            <p class="text-gray-600 dark:text-gray-300">{{ $comment->content }}</p>
            <small class="block mt-2 text-sm text-gray-500 dark:text-gray-400">Commented by: {{ $comment->email ?? 'Anonymous' }} on {{ $comment->created_at->toFormattedDateString() }}</small>
        </div>
    @empty
        <p class="text-gray-500 dark:text-gray-400">No comments yet.</p>
    @endforelse

    <div class="mt-8">
        <form method="POST" action="{{ route('comments.store') }}" class="space-y-6">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email (optional):</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter email">
            </div>
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Comment:</label>
                <textarea id="content" name="content" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></textarea>
            </div>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add Comment</button>
        </form>
    </div>
</div>
@endsection
