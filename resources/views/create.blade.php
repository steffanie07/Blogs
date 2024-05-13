@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">{{ isset($post) ? 'Edit Post' : 'Create Post' }}</h1>
    <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" class="mt-8">
        @csrf
        @if(isset($post))
            @method('PATCH')
        @endif

        <div class="mb-4">
            <label for="title" class="block text-lg font-medium text-gray-700 dark:text-gray-200">Title</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" value="{{ old('title', $post->title ?? '') }}">
            @error('title')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="body" class="block text-lg font-medium text-gray-700 dark:text-gray-200">Body</label>
            <textarea name="body" id="body" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">{{ old('body', $post->body ?? '') }}</textarea>
            @error('body')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-bold rounded hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition duration-150 ease-in-out">
            {{ isset($post) ? 'Update' : 'Create' }}
        </button>
    </form>
</div>
@endsection

