@section('title', 'Visi Misi')
<x-app-layout>
    <x-slot name="header">Visi & Misi</x-slot>

    <div class="card-static p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Visi & Misi Sekolah</h3>
                <p class="text-sm text-gray-500 mt-1">Kelola visi, misi, tujuan dan motto sekolah</p>
            </div>
            <a href="{{ route('visiMisi.create') }}" class="btn btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah
            </a>
        </div>

        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Visi</th>
                        <th>Motto</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($visiMisis as $visiMisi)
                        <tr>
                            <td>
                                @if($visiMisi->image)
                                    <img src="{{ asset('storage/' . $visiMisi->image) }}" alt="Visi Misi"
                                        class="w-20 h-12 rounded object-cover">
                                @else
                                    <div class="w-20 h-12 rounded bg-gray-100 flex items-center justify-center">
                                        <span class="text-gray-400 text-xs">No Image</span>
                                    </div>
                                @endif
                            </td>
                            <td class="font-medium text-gray-900 max-w-xs truncate">{{ $visiMisi->visi }}</td>
                            <td class="text-gray-500">{{ $visiMisi->motto ?? '-' }}</td>
                            <td class="text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('visiMisi.edit', $visiMisi->id) }}" class="btn btn-ghost btn-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('visiMisi.destroy', $visiMisi->id) }}" method="POST" class="inline">
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
                            <td colspan="4" class="text-center text-gray-500 py-8">
                                Tidak ada data visi misi
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
