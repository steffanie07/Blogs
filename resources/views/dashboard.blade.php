<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
         <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                <div class="p-6">
                    <div class="container mx-auto">
                        <h1 class="text-3xl font-bold text-red-500 mb-4">Manage Posts</h1>
                        <a href="{{ route('posts.create') }}" class="inline-block bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-300">
                            Create Post
                        </a>
                        @foreach ($posts as $post)
                            <div class="mt-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow hover:shadow-md transition duration-300">
                                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $post->title }}</h2>
                                <p class="text-gray-600 dark:text-gray-300">{{ $post->excerpt }}</p>
                                <div class="flex space-x-4 mt-4">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition duration-300 inline-flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 112.828 2.828L6.343 19.071a2 2 0 01-.89.233H4v-1.414c0-.525.209-1.033.586-1.41L16.474 4.232z"/>
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition duration-300 inline-flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-slot>
</x-app-layout>
