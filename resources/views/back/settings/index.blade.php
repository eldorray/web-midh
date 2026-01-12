@section('title', 'Pengaturan Sekolah')
<x-app-layout>
    <x-slot name="header">Pengaturan Sekolah</x-slot>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Basic Information --}}
        <x-ui.card header="Informasi Dasar" class="mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-ui.input 
                    label="Nama Sekolah *" 
                    name="school_name" 
                    value="{{ old('school_name', $setting->school_name) }}"
                    required
                    :error="$errors->first('school_name')"
                />

                <x-ui.select 
                    label="Jenjang Sekolah *" 
                    name="school_level" 
                    :options="$schoolLevels"
                    :value="old('school_level', $setting->school_level)"
                    required
                    :error="$errors->first('school_level')"
                />

                <div class="md:col-span-2">
                    <x-ui.textarea 
                        label="Alamat" 
                        name="school_address" 
                        rows="2"
                        :error="$errors->first('school_address')"
                    >{{ old('school_address', $setting->school_address) }}</x-ui.textarea>
                </div>

                <x-ui.input 
                    label="Nomor Telepon" 
                    name="school_phone" 
                    value="{{ old('school_phone', $setting->school_phone) }}"
                    placeholder="021-123456"
                    :error="$errors->first('school_phone')"
                />

                <x-ui.input 
                    label="Email" 
                    type="email"
                    name="school_email" 
                    value="{{ old('school_email', $setting->school_email) }}"
                    placeholder="info@sekolah.sch.id"
                    :error="$errors->first('school_email')"
                />

                <x-ui.input 
                    label="Website" 
                    type="url"
                    name="school_website" 
                    value="{{ old('school_website', $setting->school_website) }}"
                    placeholder="https://sekolah.sch.id"
                    :error="$errors->first('school_website')"
                />

                <div>
                    <label class="block text-sm font-medium text-[hsl(var(--foreground))] mb-2">Logo Sekolah</label>
                    <div class="flex items-start gap-4">
                        @if($setting->logo_url)
                            <div class="flex-shrink-0">
                                <img src="{{ $setting->logo_url }}" alt="Logo" class="w-20 h-20 object-contain rounded border bg-gray-50">
                            </div>
                        @endif
                        <div class="flex-grow">
                            <input type="file" name="school_logo" class="file-input w-full" accept="image/*">
                            <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, GIF, WebP. Max 2MB</p>
                            @error('school_logo')
                                <p class="text-sm text-[hsl(var(--destructive))] mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[hsl(var(--foreground))] mb-2">Favicon</label>
                    <div class="flex items-start gap-4">
                        @if($setting->favicon_url)
                            <div class="flex-shrink-0">
                                <img src="{{ $setting->favicon_url }}" alt="Favicon" class="w-10 h-10 object-contain rounded border bg-gray-50">
                            </div>
                        @endif
                        <div class="flex-grow">
                            <input type="file" name="school_favicon" class="file-input w-full" accept="image/*">
                            <p class="text-xs text-gray-500 mt-1">Format: ICO, PNG. Max 512KB</p>
                            @error('school_favicon')
                                <p class="text-sm text-[hsl(var(--destructive))] mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </x-ui.card>

        {{-- School Identity --}}
        <x-ui.card header="Identitas Sekolah" class="mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-ui.input 
                    label="NPSN" 
                    name="npsn" 
                    value="{{ old('npsn', $setting->npsn) }}"
                    placeholder="20123456"
                    :error="$errors->first('npsn')"
                />

                <x-ui.input 
                    label="NSS" 
                    name="nss" 
                    value="{{ old('nss', $setting->nss) }}"
                    :error="$errors->first('nss')"
                />

                <x-ui.input 
                    label="Kepala Sekolah" 
                    name="kepala_sekolah" 
                    value="{{ old('kepala_sekolah', $setting->kepala_sekolah) }}"
                    :error="$errors->first('kepala_sekolah')"
                />

                <x-ui.input 
                    label="NIP Kepala Sekolah" 
                    name="nip_kepala_sekolah" 
                    value="{{ old('nip_kepala_sekolah', $setting->nip_kepala_sekolah) }}"
                    :error="$errors->first('nip_kepala_sekolah')"
                />

                <x-ui.select 
                    label="Akreditasi" 
                    name="akreditasi" 
                    :options="$accreditations"
                    :value="old('akreditasi', $setting->akreditasi)"
                    placeholder="-- Pilih --"
                    :error="$errors->first('akreditasi')"
                />

                <x-ui.select 
                    label="Tahun Ajaran Aktif" 
                    name="tahun_ajaran_aktif" 
                    :options="$academicYears"
                    :value="old('tahun_ajaran_aktif', $setting->tahun_ajaran_aktif)"
                    placeholder="-- Pilih --"
                    :error="$errors->first('tahun_ajaran_aktif')"
                />
            </div>
        </x-ui.card>

        {{-- PPDB Settings --}}
        <x-ui.card header="Pengaturan PPDB" class="mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="ppdb_open" value="1"
                            class="checkbox rounded border-gray-300 text-primary focus:ring-primary" 
                            {{ old('ppdb_open', $setting->ppdb_open) ? 'checked' : '' }}>
                        <span class="text-sm font-medium text-[hsl(var(--foreground))]">PPDB Dibuka</span>
                    </label>
                </div>

                <x-ui.input 
                    label="Tanggal Mulai PPDB" 
                    type="date"
                    name="ppdb_start_date" 
                    value="{{ old('ppdb_start_date', $setting->ppdb_start_date?->format('Y-m-d')) }}"
                    :error="$errors->first('ppdb_start_date')"
                />

                <x-ui.input 
                    label="Tanggal Akhir PPDB" 
                    type="date"
                    name="ppdb_end_date" 
                    value="{{ old('ppdb_end_date', $setting->ppdb_end_date?->format('Y-m-d')) }}"
                    :error="$errors->first('ppdb_end_date')"
                />

                <div class="md:col-span-2">
                    <x-ui.textarea 
                        label="Persyaratan PPDB" 
                        name="ppdb_requirements" 
                        rows="4"
                        placeholder="Tuliskan persyaratan pendaftaran..."
                        :error="$errors->first('ppdb_requirements')"
                    >{{ old('ppdb_requirements', $setting->ppdb_requirements) }}</x-ui.textarea>
                </div>

                <div class="md:col-span-2">
                    <x-ui.textarea 
                        label="Informasi Tambahan PPDB" 
                        name="ppdb_info" 
                        rows="3"
                        placeholder="Informasi tambahan untuk calon pendaftar..."
                        :error="$errors->first('ppdb_info')"
                    >{{ old('ppdb_info', $setting->ppdb_info) }}</x-ui.textarea>
                </div>
            </div>
        </x-ui.card>

        {{-- Social Media --}}
        <x-ui.card header="Media Sosial" class="mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-ui.input 
                    label="Facebook" 
                    type="url"
                    name="social_facebook" 
                    value="{{ old('social_facebook', $setting->social_media['facebook'] ?? '') }}"
                    placeholder="https://facebook.com/..."
                    :error="$errors->first('social_facebook')"
                />

                <x-ui.input 
                    label="Instagram" 
                    type="url"
                    name="social_instagram" 
                    value="{{ old('social_instagram', $setting->social_media['instagram'] ?? '') }}"
                    placeholder="https://instagram.com/..."
                    :error="$errors->first('social_instagram')"
                />

                <x-ui.input 
                    label="YouTube" 
                    type="url"
                    name="social_youtube" 
                    value="{{ old('social_youtube', $setting->social_media['youtube'] ?? '') }}"
                    placeholder="https://youtube.com/..."
                    :error="$errors->first('social_youtube')"
                />

                <x-ui.input 
                    label="Twitter / X" 
                    type="url"
                    name="social_twitter" 
                    value="{{ old('social_twitter', $setting->social_media['twitter'] ?? '') }}"
                    placeholder="https://twitter.com/..."
                    :error="$errors->first('social_twitter')"
                />

                <x-ui.input 
                    label="TikTok" 
                    type="url"
                    name="social_tiktok" 
                    value="{{ old('social_tiktok', $setting->social_media['tiktok'] ?? '') }}"
                    placeholder="https://tiktok.com/..."
                    :error="$errors->first('social_tiktok')"
                />

                <x-ui.input 
                    label="WhatsApp" 
                    name="social_whatsapp" 
                    value="{{ old('social_whatsapp', $setting->social_media['whatsapp'] ?? '') }}"
                    placeholder="08123456789"
                    :error="$errors->first('social_whatsapp')"
                />
            </div>
        </x-ui.card>

        {{-- Additional Settings --}}
        <x-ui.card header="Pengaturan Lainnya" class="mb-6">
            <div class="grid grid-cols-1 gap-6">
                <x-ui.input 
                    label="Teks Footer" 
                    name="footer_text" 
                    value="{{ old('footer_text', $setting->footer_text) }}"
                    placeholder="© 2024 Nama Sekolah. All rights reserved."
                    :error="$errors->first('footer_text')"
                />

                <div>
                    <x-ui.input 
                        label="Google Maps Embed URL" 
                        name="google_maps_embed" 
                        value="{{ old('google_maps_embed', $setting->google_maps_embed) }}"
                        placeholder="https://www.google.com/maps/embed?pb=..."
                        :error="$errors->first('google_maps_embed')"
                    />
                    <p class="text-xs text-gray-500 mt-1">Salin URL dari Google Maps Embed</p>
                </div>
            </div>
        </x-ui.card>

        {{-- Submit --}}
        <div class="flex justify-end">
            <x-ui.button type="submit">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Simpan Pengaturan
            </x-ui.button>
        </div>
    </form>
</x-app-layout>
