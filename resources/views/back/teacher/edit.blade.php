<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Teacher') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>Edit Teacher</div>
                    <form action="{{ route('teacher.update', $teacher->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="photo"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Photo</label>
                            <input type="file" name="photo" id="photo" accept="image/*"
                                class="block w-full text-sm text-gray-900 border @error('photo') border-red-500 @else border-gray-300 @enderror rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                            @error('photo')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                            <div class="mt-4">
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Preview:</p>
                                <img id="photo-preview"
                                    src="{{ $teacher->photo ? asset('storage/' . $teacher->photo) : '' }}"
                                    alt="Photo preview"
                                    class="{{ $teacher->photo ? '' : 'hidden' }} w-full max-h-64 object-contain rounded-md border dark:border-gray-600" />
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                            <input type="text" name="name" id="name"
                                value="{{ old('name', $teacher->name) }}"
                                class="mt-1 block w-full border @error('name') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            @error('name')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="subject"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Subject</label>
                            <input type="text" name="subject" id="subject"
                                value="{{ old('subject', $teacher->subject) }}"
                                class="mt-1 block w-full border @error('subject') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            @error('subject')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="instagram"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Instagram</label>
                            <input type="text" name="instagram" id="instagram"
                                value="{{ old('instagram', $teacher->instagram) }}"
                                class="mt-1 block w-full border @error('instagram') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="@username atau URL">
                            @error('instagram')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="facebook"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Facebook</label>
                            <input type="text" name="facebook" id="facebook"
                                value="{{ old('facebook', $teacher->facebook) }}"
                                class="mt-1 block w-full border @error('facebook') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="username atau URL">
                            @error('facebook')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="twitter"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Twitter</label>
                            <input type="text" name="twitter" id="twitter"
                                value="{{ old('twitter', $teacher->twitter) }}"
                                class="mt-1 block w-full border @error('twitter') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="@username atau URL">
                            @error('twitter')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('photo');
            const preview = document.getElementById('photo-preview');

            // Unhide preview if an existing photo is already set
            if (preview && preview.getAttribute('src')) {
                preview.classList.remove('hidden');
            }

            if (input) {
                input.addEventListener('change', function() {
                    const file = this.files && this.files[0];
                    if (!file || !file.type.startsWith('image/')) {
                        preview.src = '#';
                        preview.classList.add('hidden');
                        return;
                    }
                    const url = URL.createObjectURL(file);
                    preview.src = url;
                    preview.classList.remove('hidden');
                    preview.onload = () => URL.revokeObjectURL(url);
                });
            }
        });
    </script>
</x-app-layout>
