<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Teacher') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div id="flash-success"
                class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-md flex items-start justify-between"
                role="alert">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm">{{ session('success') }}</span>
                </div>
                <button type="button" class="text-green-700 font-bold ml-4"
                    onclick="document.getElementById('flash-success').remove()" aria-label="Close">×</button>
            </div>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('teacher.create') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Tambah Teacher
                    </a>

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Icon</th>
                                    <th class="px-4 py-2">Title</th>
                                    <th class="px-4 py-2">Deskripsi</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td class="px-4 py-2">{{ $teacher->id }}</td>
                                        <td class="px-4 py-2">
                                            @if ($teacher->photo)
                                                <img src="{{ asset('storage/' . $teacher->photo) }}" alt="Teacher Photo"
                                                    class="w-20 h-auto">
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td class="px-4 py-2">{{ $teacher->name }}</td>
                                        <td class="px-4 py-2">{{ $teacher->subject }}</td>

                                        <td class="px-4 py-2">
                                            <a href="{{ route('teacher.edit', $teacher->id) }}"
                                                class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-4 py-2 text-center me-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800 inline-flex items-center"
                                                aria-label="Edit teacher">Edit</a>
                                            <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-4 py-2 text-center inline-flex items-center"
                                                    onclick="return confirm('Are you sure you want to delete this feature?');"
                                                    aria-label="Delete feature">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
