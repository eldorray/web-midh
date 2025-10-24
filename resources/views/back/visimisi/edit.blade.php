<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Visi Misi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('visiMisi.update', $visiMisi->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="visi"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Visi</label>
                            <input type="text" name="visi" id="visi"
                                value="{{ old('visi', $visiMisi->visi) }}"
                                class="mt-1 block w-full border @error('visi') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            @error('visi')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="misi"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Misi</label>
                            <x-trix-input id="misi" name="misi" :value="old('misi', $visiMisi->misi?->toTrixHtml())" />
                            @error('misi')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tujuan"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tujuan</label>
                            <x-trix-input id="tujuan" name="tujuan" :value="old('tujuan', $visiMisi->tujuan?->toTrixHtml())" />
                            @error('tujuan')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="motto"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Motto</label>
                            <input type="text" name="motto" id="motto"
                                value="{{ old('motto', $visiMisi->motto) }}"
                                class="mt-1 block w-full border @error('motto') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            @error('motto')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="sejarah"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">sejarah</label>
                            <textarea name="sejarah" id="sejarah"
                                class="mt-1 block w-full border @error('sejarah') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">{{ old('sejarah', $visiMisi->sejarah) }}</textarea>
                            @error('sejarah')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image</label>
                            <input type="file" name="image" id="image" accept="image/*"
                                class="block w-full text-sm text-gray-900 border @error('image') border-red-500 @else border-gray-300 @enderror rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                            @error('image')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                            <div class="mt-4">
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Preview:</p>
                                @if ($visiMisi->image)
                                    <img id="image-preview" src="{{ Storage::url($visiMisi->image) }}"
                                        alt="Image preview"
                                        class="w-full max-h-64 object-contain rounded-md border dark:border-gray-600" />
                                @else
                                    <img id="image-preview" src="#" alt="Image preview"
                                        class="hidden w-full max-h-64 object-contain rounded-md border dark:border-gray-600" />
                                @endif
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
            const input = document.getElementById('image');
            const preview = document.getElementById('image-preview');

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

            // Ensure trix editor values are copied into the hidden inputs before form submit.
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    try {
                        // misi
                        const misiInput = document.getElementById('misi_input');
                        const misiEditor = document.getElementById('misi');
                        if (misiInput && misiEditor && (!misiInput.value || misiInput.value.trim() ===
                                '')) {
                            misiInput.value = misiEditor.innerHTML || '';
                        }

                        // tujuan
                        const tujuanInput = document.getElementById('tujuan_input');
                        const tujuanEditor = document.getElementById('tujuan');
                        if (tujuanInput && tujuanEditor && (!tujuanInput.value || tujuanInput.value
                                .trim() === '')) {
                            tujuanInput.value = tujuanEditor.innerHTML || '';
                        }
                    } catch (err) {
                        // swallow errors to avoid blocking submit; logging in browser console for debugging
                        console.warn('Error preparing editor content for submit:', err);
                    }
                }, true);
            }
        });
    </script>
</x-app-layout>
