<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Pendaftaran registration') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Status Badge -->
                    <div class="mb-6">
                        <span
                            class="px-3 py-1 rounded-full text-sm font-semibold
                @if ($registration->status === 'approved') bg-green-100 text-green-800
                @elseif($registration->status === 'rejected') bg-red-100 text-red-800
                @else bg-yellow-100 text-yellow-800 @endif">
                            {{ ucfirst($registration->status) }}
                        </span>
                    </div>

                    <!-- Data Siswa -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-4 border-b pb-2">Data Siswa</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div><span class="font-medium">Nama Lengkap:</span> {{ $registration->nama_lengkap }}</div>
                            <div><span class="font-medium">NIK:</span> {{ $registration->nik }}</div>
                            <div><span class="font-medium">NISN:</span> {{ $registration->nisn ?? '-' }}</div>
                            <div><span class="font-medium">Tempat Lahir:</span> {{ $registration->tempat_lahir }}</div>
                            <div><span class="font-medium">Tanggal Lahir:</span>
                                {{ \Carbon\Carbon::parse($registration->tanggal_lahir)->format('d F Y') }}</div>
                            <div><span class="font-medium">Jenis Kelamin:</span> {{ $registration->jenis_kelamin }}
                            </div>
                            <div><span class="font-medium">Agama:</span> {{ $registration->agama }}</div>
                            <div><span class="font-medium">Asal Sekolah:</span> {{ $registration->asal_sekolah ?? '-' }}
                            </div>
                            <div><span class="font-medium">Anak Ke:</span> {{ $registration->anak_ke }}</div>
                            <div><span class="font-medium">Status Keluarga:</span> {{ $registration->status_keluarga }}
                            </div>
                            <div><span class="font-medium">Kewarganegaraan:</span> {{ $registration->kewarganegaraan }}
                            </div>
                            <div class="md:col-span-2"><span class="font-medium">Alamat Lengkap:</span>
                                {{ $registration->alamat_lengkap }}</div>
                        </div>
                    </div>

                    <!-- Data Ayah -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-4 border-b pb-2">Data Ayah</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div><span class="font-medium">Nama Ayah:</span> {{ $registration->nama_ayah }}</div>
                            <div><span class="font-medium">NIK Ayah:</span> {{ $registration->nik_ayah }}</div>
                            <div><span class="font-medium">Pendidikan:</span> {{ $registration->pendidikan_ayah }}
                            </div>
                            <div><span class="font-medium">Pekerjaan:</span> {{ $registration->pekerjaan_ayah }}</div>
                            <div><span class="font-medium">Penghasilan:</span> {{ $registration->penghasilan_ayah }}
                            </div>
                        </div>
                    </div>

                    <!-- Data Ibu -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-4 border-b pb-2">Data Ibu</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div><span class="font-medium">Nama Ibu:</span> {{ $registration->nama_ibu }}</div>
                            <div><span class="font-medium">NIK Ibu:</span> {{ $registration->nik_ibu }}</div>
                            <div><span class="font-medium">Pendidikan:</span> {{ $registration->pendidikan_ibu }}</div>
                            <div><span class="font-medium">Pekerjaan:</span> {{ $registration->pekerjaan_ibu }}</div>
                            <div><span class="font-medium">Penghasilan:</span> {{ $registration->penghasilan_ibu }}
                            </div>
                        </div>
                    </div>

                    <!-- Kontak & Alamat -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-4 border-b pb-2">Kontak & Alamat Orang Tua</h3>
                        <div class="grid grid-cols-1 gap-4">
                            <div><span class="font-medium">Nomor Telepon:</span> {{ $registration->nomor_telepon }}
                            </div>
                            <div><span class="font-medium">Alamat Orang Tua:</span>
                                {{ $registration->alamat_orang_tua ?? '-' }}</div>
                        </div>
                    </div>

                    <!-- Dokumen -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-4 border-b pb-2">Dokumen</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <span class="font-medium">Akta Kelahiran:</span>
                                <a href="{{ Storage::url($registration->akta_kelahiran) }}" target="_blank"
                                    class="text-blue-600 hover:underline ml-2">Lihat Dokumen</a>
                            </div>
                            <div>
                                <span class="font-medium">Kartu Keluarga:</span>
                                <a href="{{ Storage::url($registration->kartu_keluarga) }}" target="_blank"
                                    class="text-blue-600 hover:underline ml-2">Lihat Dokumen</a>
                            </div>
                        </div>
                    </div>

                    <!-- Catatan Admin -->
                    @if ($registration->catatan_admin)
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold mb-4 border-b pb-2">Catatan Admin</h3>
                            <p class="text-gray-700">{{ $registration->catatan_admin }}</p>
                        </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="mt-6 flex gap-3">
                        @if ($registration->status !== 'rejected')
                            <form action="{{ route('ppdb.admin.approve', $registration->id) }}" method="POST"
                                class="inline">
                                @csrf
                                <button type="submit"
                                    class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                                    {{ $registration->status === 'approved' ? 'Sudah Disetujui' : 'Setujui' }}
                                </button>
                            </form>
                        @endif

                        @if ($registration->status !== 'rejected')
                            <button type="button" onclick="showRejectModal()"
                                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                Tolak
                            </button>
                        @endif

                        <!-- Modal Tolak -->
                        <div id="rejectModal"
                            class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                                <div class="mt-3">
                                    <h3 class="text-lg font-medium text-gray-900 mb-4">Alasan Penolakan</h3>
                                    <form action="{{ route('ppdb.admin.reject', $registration->id) }}" method="POST">
                                        @csrf
                                        <textarea name="catatan_admin" rows="4" required
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"
                                            placeholder="Masukkan alasan penolakan..."></textarea>
                                        <div class="mt-4 flex gap-3 justify-end">
                                            <button type="button" onclick="closeRejectModal()"
                                                class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                                                Batal
                                            </button>
                                            <button type="submit"
                                                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                                Tolak Pendaftaran
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <script>
                            function showRejectModal() {
                                document.getElementById('rejectModal').classList.remove('hidden');
                            }

                            function closeRejectModal() {
                                document.getElementById('rejectModal').classList.add('hidden');
                            }
                        </script>
                        <a href="{{ route('ppdb.admin.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            Kembali
                        </a>
                        <a href="{{ route('ppdb.admin.edit', $registration->id) }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Edit
                        </a>
                        <form action="{{ route('ppdb.admin.destroy', $registration->id) }}" method="POST"
                            class="inline"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus pendaftaran ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
