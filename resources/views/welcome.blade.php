@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">Welcome to Stephanie's Blog</h1>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">
                Welcome to my Test Blog,I would be showcasing and creating posts that showacse the beauty of Lagos city.
<img src="{{ asset('images/lag.jpg') }}" alt="Blog Introduction Image" class="rounded-lg" style="width: 1500px;">
        </div>
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Latest Posts</h2>
        @foreach ($posts as $post)
            <div class="mb-4 p-4 bg-white dark:bg-gray-800 shadow-md rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-300">
                <h3 class="text-xl font-semibold mb-2">
                    <a href="{{ route('posts.show', $post) }}" class="text-blue-500 hover:text-blue-700">{{ $post->title }}</a>
                </h3>
                <p class="text-gray-600 dark:text-gray-400">{{ Str::limit($post->body, 100) }}</p>
                <div class="flex justify-between mt-4">
                    <p class="text-sm text-gray-500">{{ $post->comments()->count() }} {{ Str::plural('comment', $post->comments()->count()) }}</p>
                    <p class="text-sm text-gray-500">{{ $loop->index + 1 }}/{{ $posts->count() }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection