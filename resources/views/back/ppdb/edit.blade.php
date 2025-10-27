<x-app-layout>
    <main class="main-wrapper relative overflow-hidden mt-4 mb-8">
        <!--...::: Form Section Start :::... -->
        <section class="bg-[#f3f4f6] section-space">
            <div class="section-space">
                <div class="container-default">
                    <div class="max-w-4xl mx-auto">
                        <!-- Header -->
                        <div class="text-center mb-8">
                            <h1 class="text-3xl font-bold text-gray-800 mb-2">Edit Pendaftaran</h1>
                            <p class="text-gray-600">MI Daarul Hikmah - Tahun Ajaran
                                {{ date('Y') }}/{{ date('Y') + 1 }}</p>
                        </div>

                        <!-- Form Card -->
                        <div class="bg-white rounded-lg shadow-lg p-8">
                            <form action="{{ route('ppdb.admin.update', $registration->id) }}" method="POST"
                                enctype="multipart/form-data" id="registrationForm">
                                @csrf
                                @method('PUT')
                                <!-- Section 1: Data Siswa -->
                                <div class="mb-8 pb-8 border-b-2">
                                    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                                        <span
                                            class="bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 text-sm">1</span>
                                        Data Calon Peserta Didik
                                    </h2>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Nama Lengkap -->
                                        <div class="md:col-span-2">
                                            <label for="nama_lengkap"
                                                class="block text-sm font-medium text-gray-700 mb-2">
                                                Nama Lengkap <span class="text-red-500">*</span>
                                            </label>
                                            <input type="text" id="nama_lengkap" name="nama_lengkap"
                                                class="w-full px-4 py-2 border @error('nama_lengkap') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="{{ old('nama_lengkap', $registration->nama_lengkap) }}"
                                                placeholder="Sesuai akta kelahiran" required>
                                            @error('nama_lengkap')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- NIK & NISN -->
                                        <div>
                                            <label for="nik" class="block text-sm font-medium text-gray-700 mb-2">
                                                NIK <span class="text-red-500">*</span>
                                            </label>
                                            <input type="text" id="nik" name="nik"
                                                class="w-full px-4 py-2 border @error('nik') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="{{ old('nik', $registration->nik) }}" placeholder="16 digit NIK"
                                                maxlength="16" inputmode="numeric" required>
                                            @error('nik')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="nisn" class="block text-sm font-medium text-gray-700 mb-2">
                                                NISN (Opsional)
                                            </label>
                                            <input type="text" id="nisn" name="nisn"
                                                class="w-full px-4 py-2 border @error('nisn') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="{{ old('nisn', $registration->nisn) }}"
                                                placeholder="10 digit NISN" maxlength="10" inputmode="numeric">
                                            @error('nisn')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Tempat & Tanggal Lahir -->
                                        <div>
                                            <label for="tempat_lahir"
                                                class="block text-sm font-medium text-gray-700 mb-2">
                                                Tempat Lahir <span class="text-red-500">*</span>
                                            </label>
                                            <input type="text" id="tempat_lahir" name="tempat_lahir"
                                                class="w-full px-4 py-2 border @error('tempat_lahir') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="{{ old('tempat_lahir', $registration->tempat_lahir) }}" required>
                                            @error('tempat_lahir')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="tanggal_lahir"
                                                class="block text-sm font-medium text-gray-700 mb-2">
                                                Tanggal Lahir <span class="text-red-500">*</span>
                                            </label>
                                            <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                                class="w-full px-4 py-2 border @error('tanggal_lahir') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="{{ old('tanggal_lahir', $registration->tanggal_lahir) }}"
                                                required>
                                            @error('tanggal_lahir')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Jenis Kelamin & Agama -->
                                        <div>
                                            <label for="jenis_kelamin"
                                                class="block text-sm font-medium text-gray-700 mb-2">
                                                Jenis Kelamin <span class="text-red-500">*</span>
                                            </label>
                                            <select id="jenis_kelamin" name="jenis_kelamin"
                                                class="w-full px-4 py-2 border @error('jenis_kelamin') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                required>
                                                <option value="">-- Pilih --</option>
                                                <option value="Laki-laki" @selected(old('jenis_kelamin', $registration->jenis_kelamin) == 'Laki-laki')>Laki-laki
                                                </option>
                                                <option value="Perempuan" @selected(old('jenis_kelamin', $registration->jenis_kelamin) == 'Perempuan')>Perempuan
                                                </option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="agama" class="block text-sm font-medium text-gray-700 mb-2">
                                                Agama <span class="text-red-500">*</span>
                                            </label>
                                            <input type="text" value="Islam"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100"
                                                disabled>
                                            <input type="hidden" name="agama" value="Islam">
                                        </div>

                                        <!-- Asal Sekolah -->
                                        <div class="md:col-span-2">
                                            <label for="asal_sekolah"
                                                class="block text-sm font-medium text-gray-700 mb-2">
                                                Asal Sekolah (TK/RA) - Opsional
                                            </label>
                                            <input type="text" id="asal_sekolah" name="asal_sekolah"
                                                class="w-full px-4 py-2 border @error('asal_sekolah') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="{{ old('asal_sekolah', $registration->asal_sekolah) }}">
                                            @error('asal_sekolah')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Alamat -->
                                        <div class="md:col-span-2">
                                            <label for="alamat_lengkap"
                                                class="block text-sm font-medium text-gray-700 mb-2">
                                                Alamat Lengkap <span class="text-red-500">*</span>
                                            </label>
                                            <textarea id="alamat_lengkap" name="alamat_lengkap" rows="3"
                                                class="w-full px-4 py-2 border @error('alamat_lengkap') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                placeholder="Jalan, RT/RW, Kelurahan, Kecamatan, Kota, Kode Pos" required>{{ old('alamat_lengkap', $registration->alamat_lengkap) }}</textarea>
                                            @error('alamat_lengkap')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Anak ke & Status -->
                                        <div>
                                            <label for="anak_ke"
                                                class="block text-sm font-medium text-gray-700 mb-2">
                                                Anak ke- <span class="text-red-500">*</span>
                                            </label>
                                            <input type="number" id="anak_ke" name="anak_ke"
                                                class="w-full px-4 py-2 border @error('anak_ke') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="{{ old('anak_ke', $registration->anak_ke) }}" min="1"
                                                required>
                                            @error('anak_ke')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="status_keluarga"
                                                class="block text-sm font-medium text-gray-700 mb-2">
                                                Status dalam Keluarga <span class="text-red-500">*</span>
                                            </label>
                                            <select id="status_keluarga" name="status_keluarga"
                                                class="w-full px-4 py-2 border @error('status_keluarga') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                required>
                                                <option value="">-- Pilih --</option>
                                                <option value="Anak kandung" @selected(old('status_keluarga', $registration->status_keluarga) == 'Anak kandung')>Anak
                                                    kandung
                                                </option>
                                                <option value="Anak angkat" @selected(old('status_keluarga', $registration->status_keluarga) == 'Anak angkat')>Anak
                                                    angkat
                                                </option>
                                            </select>
                                            @error('status_keluarga')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Kewarganegaraan -->
                                        <div>
                                            <label for="kewarganegaraan"
                                                class="block text-sm font-medium text-gray-700 mb-2">
                                                Kewarganegaraan <span class="text-red-500">*</span>
                                            </label>
                                            <select id="kewarganegaraan" name="kewarganegaraan"
                                                class="w-full px-4 py-2 border @error('kewarganegaraan') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                required>
                                                <option value="">-- Pilih --</option>
                                                <option value="Indonesia" @selected(old('kewarganegaraan', $registration->kewarganegaraan) == 'Indonesia')>Indonesia
                                                </option>
                                                <option value="Asing" @selected(old('kewarganegaraan', $registration->kewarganegaraan) == 'Asing')>Asing</option>
                                            </select>
                                            @error('kewarganegaraan')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Section 2: Data Orang Tua -->
                                <div class="mb-8 pb-8 border-b-2">
                                    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                                        <span
                                            class="bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 text-sm">2</span>
                                        Data Orang Tua / Wali
                                    </h2>

                                    <!-- Data Ayah -->
                                    <div class="mb-8 bg-blue-50 p-6 rounded-lg">
                                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Data Ayah</h3>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label for="nama_ayah"
                                                    class="block text-sm font-medium text-gray-700 mb-2">
                                                    Nama Lengkap <span class="text-red-500">*</span>
                                                </label>
                                                <input type="text" id="nama_ayah" name="nama_ayah"
                                                    class="w-full px-4 py-2 border @error('nama_ayah') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                    value="{{ old('nama_ayah', $registration->nama_ayah) }}" required>
                                                @error('nama_ayah')
                                                    <span
                                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div>
                                                <label for="nik_ayah"
                                                    class="block text-sm font-medium text-gray-700 mb-2">
                                                    NIK <span class="text-red-500">*</span>
                                                </label>
                                                <input type="text" id="nik_ayah" name="nik_ayah"
                                                    class="w-full px-4 py-2 border @error('nik_ayah') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                    value="{{ old('nik_ayah', $registration->nik_ayah) }}"
                                                    placeholder="16 digit NIK" maxlength="16" inputmode="numeric"
                                                    required>
                                                @error('nik_ayah')
                                                    <span
                                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div>
                                                <label for="pendidikan_ayah"
                                                    class="block text-sm font-medium text-gray-700 mb-2">
                                                    Pendidikan Terakhir <span class="text-red-500">*</span>
                                                </label>
                                                <select id="pendidikan_ayah" name="pendidikan_ayah"
                                                    class="w-full px-4 py-2 border @error('pendidikan_ayah') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                    required>
                                                    <option value="">-- Pilih --</option>
                                                    <option value="SD/Tidak Sekolah" @selected(old('pendidikan_ayah', $registration->pendidikan_ayah) == 'SD/Tidak Sekolah')>
                                                        SD/Tidak Sekolah</option>
                                                    <option value="SMP" @selected(old('pendidikan_ayah', $registration->pendidikan_ayah) == 'SMP')>SMP
                                                    </option>
                                                    <option value="SMA/SMK" @selected(old('pendidikan_ayah', $registration->pendidikan_ayah) == 'SMA/SMK')>SMA/SMK
                                                    </option>
                                                    <option value="Diploma" @selected(old('pendidikan_ayah', $registration->pendidikan_ayah) == 'Diploma')>Diploma
                                                    </option>
                                                    <option value="Sarjana" @selected(old('pendidikan_ayah', $registration->pendidikan_ayah) == 'Sarjana')>Sarjana
                                                    </option>
                                                    <option value="Magister" @selected(old('pendidikan_ayah', $registration->pendidikan_ayah) == 'Magister')>Magister
                                                    </option>
                                                </select>
                                                @error('pendidikan_ayah')
                                                    <span
                                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div>
                                                <label for="pekerjaan_ayah"
                                                    class="block text-sm font-medium text-gray-700 mb-2">
                                                    Pekerjaan <span class="text-red-500">*</span>
                                                </label>
                                                <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah"
                                                    class="w-full px-4 py-2 border @error('pekerjaan_ayah') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                    value="{{ old('pekerjaan_ayah', $registration->pekerjaan_ayah) }}"
                                                    required>
                                                @error('pekerjaan_ayah')
                                                    <span
                                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="md:col-span-2">
                                                <label for="penghasilan_ayah"
                                                    class="block text-sm font-medium text-gray-700 mb-2">
                                                    Penghasilan Perbulan <span class="text-red-500">*</span>
                                                </label>
                                                <select id="penghasilan_ayah" name="penghasilan_ayah"
                                                    class="w-full px-4 py-2 border @error('penghasilan_ayah') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                    required>
                                                    <option value="">-- Pilih --</option>
                                                    <option value="< Rp 500.000" @selected(old('penghasilan_ayah', $registration->penghasilan_ayah) == '< Rp 500.000')>&lt;
                                                        Rp
                                                        500.000</option>
                                                    <option value="Rp 500.000 - Rp 1.000.000"
                                                        @selected(old('penghasilan_ayah', $registration->penghasilan_ayah) == 'Rp 500.000 - Rp 1.000.000')>Rp 500.000 - Rp 1.000.000
                                                    </option>
                                                    <option value="Rp 1.000.000 - Rp 2.000.000"
                                                        @selected(old('penghasilan_ayah', $registration->penghasilan_ayah) == 'Rp 1.000.000 - Rp 2.000.000')>Rp 1.000.000 - Rp 2.000.000
                                                    </option>
                                                    <option value="Rp 2.000.000 - Rp 3.000.000"
                                                        @selected(old('penghasilan_ayah', $registration->penghasilan_ayah) == 'Rp 2.000.000 - Rp 3.000.000')>Rp 2.000.000 - Rp 3.000.000
                                                    </option>
                                                    <option value="> Rp 3.000.000" @selected(old('penghasilan_ayah', $registration->penghasilan_ayah) == '> Rp 3.000.000')>
                                                        &gt;
                                                        Rp 3.000.000</option>
                                                </select>
                                                @error('penghasilan_ayah')
                                                    <span
                                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Data Ibu -->
                                    <div class="mb-8 bg-pink-50 p-6 rounded-lg">
                                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Data Ibu</h3>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label for="nama_ibu"
                                                    class="block text-sm font-medium text-gray-700 mb-2">
                                                    Nama Lengkap <span class="text-red-500">*</span>
                                                </label>
                                                <input type="text" id="nama_ibu" name="nama_ibu"
                                                    class="w-full px-4 py-2 border @error('nama_ibu') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                    value="{{ old('nama_ibu', $registration->nama_ibu) }}" required>
                                                @error('nama_ibu')
                                                    <span
                                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div>
                                                <label for="nik_ibu"
                                                    class="block text-sm font-medium text-gray-700 mb-2">
                                                    NIK <span class="text-red-500">*</span>
                                                </label>
                                                <input type="text" id="nik_ibu" name="nik_ibu"
                                                    class="w-full px-4 py-2 border @error('nik_ibu') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                    value="{{ old('nik_ibu', $registration->nik_ibu) }}"
                                                    placeholder="16 digit NIK" maxlength="16" inputmode="numeric"
                                                    required>
                                                @error('nik_ibu')
                                                    <span
                                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div>
                                                <label for="pendidikan_ibu"
                                                    class="block text-sm font-medium text-gray-700 mb-2">
                                                    Pendidikan Terakhir <span class="text-red-500">*</span>
                                                </label>
                                                <select id="pendidikan_ibu" name="pendidikan_ibu"
                                                    class="w-full px-4 py-2 border @error('pendidikan_ibu') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                    required>
                                                    <option value="">-- Pilih --</option>
                                                    <option value="SD/Tidak Sekolah" @selected(old('pendidikan_ibu', $registration->pendidikan_ibu) == 'SD/Tidak Sekolah')>
                                                        SD/Tidak Sekolah</option>
                                                    <option value="SMP" @selected(old('pendidikan_ibu', $registration->pendidikan_ibu) == 'SMP')>SMP
                                                    </option>
                                                    <option value="SMA/SMK" @selected(old('pendidikan_ibu', $registration->pendidikan_ibu) == 'SMA/SMK')>SMA/SMK
                                                    </option>
                                                    <option value="Diploma" @selected(old('pendidikan_ibu', $registration->pendidikan_ibu) == 'Diploma')>Diploma
                                                    </option>
                                                    <option value="Sarjana" @selected(old('pendidikan_ibu', $registration->pendidikan_ibu) == 'Sarjana')>Sarjana
                                                    </option>
                                                    <option value="Magister" @selected(old('pendidikan_ibu', $registration->pendidikan_ibu) == 'Magister')>Magister
                                                    </option>
                                                </select>
                                                @error('pendidikan_ibu')
                                                    <span
                                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div>
                                                <label for="pekerjaan_ibu"
                                                    class="block text-sm font-medium text-gray-700 mb-2">
                                                    Pekerjaan <span class="text-red-500">*</span>
                                                </label>
                                                <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu"
                                                    class="w-full px-4 py-2 border @error('pekerjaan_ibu') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                    value="{{ old('pekerjaan_ibu', $registration->pekerjaan_ibu) }}"
                                                    required>
                                                @error('pekerjaan_ibu')
                                                    <span
                                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="md:col-span-2">
                                                <label for="penghasilan_ibu"
                                                    class="block text-sm font-medium text-gray-700 mb-2">
                                                    Penghasilan Perbulan <span class="text-red-500">*</span>
                                                </label>
                                                <select id="penghasilan_ibu" name="penghasilan_ibu"
                                                    class="w-full px-4 py-2 border @error('penghasilan_ibu') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                    required>
                                                    <option value="">-- Pilih --</option>
                                                    <option value="< Rp 500.000" @selected(old('penghasilan_ibu', $registration->penghasilan_ibu) == '< Rp 500.000')>&lt;
                                                        Rp
                                                        500.000</option>
                                                    <option value="Rp 500.000 - Rp 1.000.000"
                                                        @selected(old('penghasilan_ibu', $registration->penghasilan_ibu) == 'Rp 500.000 - Rp 1.000.000')>Rp 500.000 - Rp 1.000.000
                                                    </option>
                                                    <option value="Rp 1.000.000 - Rp 2.000.000"
                                                        @selected(old('penghasilan_ibu', $registration->penghasilan_ibu) == 'Rp 1.000.000 - Rp 2.000.000')>Rp 1.000.000 - Rp 2.000.000
                                                    </option>
                                                    <option value="Rp 2.000.000 - Rp 3.000.000"
                                                        @selected(old('penghasilan_ibu', $registration->penghasilan_ibu) == 'Rp 2.000.000 - Rp 3.000.000')>Rp 2.000.000 - Rp 3.000.000
                                                    </option>
                                                    <option value="> Rp 3.000.000" @selected(old('penghasilan_ibu', $registration->penghasilan_ibu) == '> Rp 3.000.000')>
                                                        &gt;
                                                        Rp 3.000.000</option>
                                                </select>
                                                @error('penghasilan_ibu')
                                                    <span
                                                        class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Contact Info -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="nomor_telepon"
                                                class="block text-sm font-medium text-gray-700 mb-2">
                                                Nomor Telepon/HP Aktif <span class="text-red-500">*</span>
                                            </label>
                                            <input type="tel" id="nomor_telepon" name="nomor_telepon"
                                                class="w-full px-4 py-2 border @error('nomor_telepon') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="{{ old('nomor_telepon', $registration->nomor_telepon) }}"
                                                placeholder="08123456789" required>
                                            @error('nomor_telepon')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="alamat_orang_tua"
                                                class="block text-sm font-medium text-gray-700 mb-2">
                                                Alamat Orang Tua (Jika berbeda) - Opsional
                                            </label>
                                            <input type="text" id="alamat_orang_tua" name="alamat_orang_tua"
                                                class="w-full px-4 py-2 border @error('alamat_orang_tua') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="{{ old('alamat_orang_tua', $registration->alamat_orang_tua) }}">
                                            @error('alamat_orang_tua')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Section 3: Berkas -->
                                <div class="mb-8">
                                    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                                        <span
                                            class="bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 text-sm">3</span>
                                        Berkas / Dokumen
                                    </h2>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Akta Kelahiran -->
                                        <div
                                            class="border-2 border-dashed border-gray-300 rounded-lg p-6 hover:border-blue-400 transition">
                                            <label for="akta_kelahiran" class="block cursor-pointer">
                                                <div class="text-center">
                                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                        fill="none" viewBox="0 0 48 48">
                                                        <path
                                                            d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h24a4 4 0 004-4V20m-8-12l-4-4m0 0l-4 4m4-4v12"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                    <p class="mt-2 text-sm font-medium text-gray-700">
                                                        Scan Akta Kelahiran (Kosongkan jika tidak ingin mengubah)
                                                    </p>
                                                    <p class="mt-1 text-xs text-gray-500">PDF, JPG, PNG (Max 2MB)
                                                    </p>
                                                    @if ($registration->akta_kelahiran)
                                                        <p class="mt-2 text-xs text-green-600">File saat ini:
                                                            {{ basename($registration->akta_kelahiran) }}</p>
                                                    @endif
                                                </div>
                                                <input type="file" id="akta_kelahiran" name="akta_kelahiran"
                                                    class="hidden" accept=".pdf,.jpg,.jpeg,.png"
                                                    onchange="updateFileName(this, 'akta-name')">
                                            </label>
                                            <p id="akta-name" class="mt-2 text-sm text-gray-600 text-center"></p>
                                            @error('akta_kelahiran')
                                                <span
                                                    class="text-red-500 text-sm block mt-2 text-center">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Kartu Keluarga -->
                                        <div
                                            class="border-2 border-dashed border-gray-300 rounded-lg p-6 hover:border-blue-400 transition">
                                            <label for="kartu_keluarga" class="block cursor-pointer">
                                                <div class="text-center">
                                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                        fill="none" viewBox="0 0 48 48">
                                                        <path
                                                            d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h24a4 4 0 004-4V20m-8-12l-4-4m0 0l-4 4m4-4v12"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                    <p class="mt-2 text-sm font-medium text-gray-700">
                                                        Scan Kartu Keluarga (Kosongkan jika tidak ingin mengubah)
                                                    </p>
                                                    <p class="mt-1 text-xs text-gray-500">PDF, JPG, PNG (Max 2MB)
                                                    </p>
                                                    @if ($registration->kartu_keluarga)
                                                        <p class="mt-2 text-xs text-green-600">File saat ini:
                                                            {{ basename($registration->kartu_keluarga) }}</p>
                                                    @endif
                                                </div>
                                                <input type="file" id="kartu_keluarga" name="kartu_keluarga"
                                                    class="hidden" accept=".pdf,.jpg,.jpeg,.png"
                                                    onchange="updateFileName(this, 'kk-name')">
                                            </label>
                                            <p id="kk-name" class="mt-2 text-sm text-gray-600 text-center"></p>
                                            @error('kartu_keluarga')
                                                <span
                                                    class="text-red-500 text-sm block mt-2 text-center">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="flex flex-col sm:flex-row gap-4 mt-8">
                                    <a href="{{ route('ppdb.index') }}"
                                        class="flex-1 text-center bg-gray-400 hover:bg-gray-500 text-white font-semibold py-3 px-6 rounded-lg transition">
                                        Kembali
                                    </a>
                                    <button type="submit"
                                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition">
                                        Update Pendaftaran
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--...::: Form Section End :::... -->

    </main>
    @include('front.footer')
    <script>
        function updateFileName(input, elementId) {
            const element = document.getElementById(elementId);
            if (input.files && input.files[0]) {
                element.textContent = '✓ ' + input.files[0].name;
                element.classList.add('text-green-600', 'font-medium');
            }
        }

        // Numeric input validation
        const numericInputs = ['nik', 'nik_ayah', 'nik_ibu', 'nisn'];
        numericInputs.forEach(id => {
            const element = document.getElementById(id);
            if (element) {
                element.addEventListener('input', function() {
                    this.value = this.value.replace(/[^0-9]/g, '').slice(0, id === 'nisn' ? 10 : 16);
                });
            }
        });
    </script>
</x-app-layout>
