<x-app-layout>
    <x-slot name="header">Create Blog Post</x-slot>

    <div class="max-w-4xl">
        <div class="card-static p-6">
            <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="space-y-6">
                    <!-- Thumbnail -->
                    <div>
                        <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-2">Thumbnail</label>
                        <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                            class="input @error('thumbnail') border-red-500 @enderror">
                        @error('thumbnail')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <div class="mt-2">
                            <img id="thumbnail-preview" alt="Thumbnail preview"
                                class="hidden max-h-48 rounded border" />
                        </div>
                    </div>

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required
                            class="input @error('title') border-red-500 @enderror">
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required
                            class="input @error('slug') border-red-500 @enderror">
                        @error('slug')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                        <x-trix-input id="content" name="content" value="{{ old('content') }}" />
                        @error('content')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Author -->
                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-700 mb-2">Author</label>
                        <input type="text" name="author" id="author" value="{{ old('author') }}"
                            class="input @error('author') border-red-500 @enderror">
                        @error('author')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tags -->
                    <div>
                        <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                        <input type="text" name="tags" id="tags" value="{{ old('tags') }}"
                            placeholder="Separated by comma"
                            class="input @error('tags') border-red-500 @enderror">
                        @error('tags')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Published -->
                    <div>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="is_published" value="1"
                                {{ old('is_published', true) ? 'checked' : '' }}
                                class="w-4 h-4 rounded border-gray-300 text-gray-900 focus:ring-gray-500">
                            <span class="text-sm text-gray-700">Published</span>
                        </label>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('blog.index') }}" class="btn btn-outline">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/js/imgpreview.js') }}"></script>
    <script src="{{ asset('assets/js/slug.js') }}"></script>
</x-app-layout>
