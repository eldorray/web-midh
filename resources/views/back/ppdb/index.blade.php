<x-app-layout>
    <x-slot name="header">PPDB Registrations</x-slot>

    <div class="card-static p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Daftar Pendaftar PPDB</h3>
                <p class="text-sm text-gray-500 mt-1">Kelola pendaftaran peserta didik baru</p>
            </div>
            <a href="{{ route('ppdb.admin.export') }}" class="btn btn-success">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                Export Excel
            </a>
        </div>

        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Tempat Lahir</th>
                        <th>Status</th>
                        <th>Registered At</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registrations as $registration)
                        <tr>
                            <td class="text-gray-500">{{ $loop->iteration }}</td>
                            <td class="font-medium text-gray-900">{{ $registration->nama_lengkap }}</td>
                            <td class="text-gray-500">{{ $registration->nik }}</td>
                            <td class="text-gray-500">{{ $registration->tempat_lahir }}</td>
                            <td>
                                @if($registration->status === 'approved')
                                    <span class="badge badge-success">Diterima</span>
                                @elseif($registration->status === 'rejected')
                                    <span class="badge badge-destructive">Ditolak</span>
                                @else
                                    <span class="badge badge-warning">Menunggu</span>
                                @endif
                            </td>
                            <td class="text-gray-500">{{ $registration->created_at->format('d M Y H:i') }}</td>
                            <td class="text-right">
                                <a href="{{ route('ppdb.admin.show', $registration->id) }}" class="btn btn-ghost btn-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-gray-500 py-8">
                                <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                Tidak ada data pendaftar
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($registrations->hasPages())
            <div class="mt-6">
                {{ $registrations->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
