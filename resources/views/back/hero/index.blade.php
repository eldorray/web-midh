@section('title', 'Hero')
<x-app-layout>
    <x-slot name="header">Hero</x-slot>

    <div class="card-static p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Hero Section</h3>
                <p class="text-sm text-gray-500 mt-1">Kelola hero banner halaman utama</p>
            </div>
            <a href="{{ route('hero.create') }}" class="btn btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Hero
            </a>
        </div>

        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($heroes as $hero)
                        <tr>
                            <td>
                                @if($hero->image)
                                    <img src="{{ asset('storage/' . $hero->image) }}" alt="{{ $hero->title }}"
                                        class="w-20 h-12 rounded object-cover">
                                @else
                                    <div class="w-20 h-12 rounded bg-gray-100 flex items-center justify-center">
                                        <span class="text-gray-400 text-xs">No Image</span>
                                    </div>
                                @endif
                            </td>
                            <td class="font-medium text-gray-900">{{ $hero->title }}</td>
                            <td class="text-gray-500 max-w-xs truncate">{{ $hero->description }}</td>
                            <td>
                                @if($hero->is_active)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-secondary">Inactive</span>
                                @endif
                            </td>
                            <td class="text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('hero.edit', $hero->id) }}" class="btn btn-ghost btn-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('hero.destroy', $hero->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-ghost btn-sm text-red-600 hover:bg-red-50" onclick="return confirm('Yakin ingin menghapus?')">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-gray-500 py-8">
                                Tidak ada data hero
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
