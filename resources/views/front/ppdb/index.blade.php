<x-layouts.app>
    @include('front.header')
    <main class="main-wrapper relative overflow-hidden">
        <!--...::: Breadcrumb Section Start :::... -->
        <section class="section-breadcrumb">
            <!-- Breadcrumb Section Spacer -->
            <div class="breadcrumb-wrapper">
                <!-- Section Container -->
                <div class="container-default">
                    <div class="breadcrumb-block">
                        <h1 class="breadcrumb-title">PPDB Online</h1>
                        <ul class="breadcrumb-nav">
                            <li><a href="/">Home</a></li>
                            <li>Cek Pendaftaran</li>
                        </ul>
                    </div>
                </div>
                <!-- Section Container -->

                <!-- Breadcrumb Shape - 1 -->
                <div class="absolute left-0 top-0 -z-10">
                    <img src="assets/img/elements/breadcrumb-shape-1.svg" alt="hero-shape-1" width="291"
                        height="380" />
                </div>

                <!-- Breadcrumb Shape - 2 -->
                <div class="absolute bottom-0 right-0 -z-[1]">
                    <img src="assets/img/elements/breadcrumb-shape-2.svg" alt="hero-shape-2" width="291"
                        height="380" />
                </div>
            </div>
            <!-- Breadcrumb Section Spacer -->
        </section>
        <!--...::: Breadcrumb Section End :::... -->
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <i class="fas fa-times-circle mr-2"></i>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif
        <!--...::: About Hero Section Start :::... -->
        <section class="">
            <div class="relative z-10 overflow-hidden bg-[#FAF9F5]">
                <!-- Section Space -->
                <div class="section-space">
                    <!-- Section Container -->
                    <div class="container-custom has-container-custom">
                        <!-- About Hero Area -->
                        <div
                            class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
                            <div class="max-w-2xl mx-auto">
                                <!-- Header -->
                                <div class="text-center">
                                    <div class="inline-block p-3 bg-blue-600 rounded-full mb-4">
                                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <h1 class="text-4xl font-bold text-gray-900 mb-2">PPDB Online</h1>
                                    <p class="text-xl text-gray-700 font-semibold">MI Daarul Hikmah</p>
                                    <p class="text-sm mb-8 text-gray-600 mt-2">Penerimaan Peserta Didik Baru Tahun
                                        Ajaran
                                        2026/2027</p>
                                </div>

                                <!-- Main Card -->
                                <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-6">
                                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6">
                                        <h2 class="text-2xl mb-8 font-bold text-dark text-center">Cek Status Pendaftaran
                                        </h2>
                                        <p class="text-blue-100 text-center mt-2 text-sm">Masukkan NIK atau NISN untuk
                                            melihat status
                                            pendaftaran Anda</p>
                                    </div>

                                    <div class="p-8">
                                        <!-- Check Form -->
                                        <div id="checkSection">
                                            <form id="checkForm" class="space-y-6">
                                                @csrf
                                                <div>
                                                    <label for="search_value"
                                                        class="block text-sm font-semibold text-gray-700 mb-2">
                                                        <span class="flex items-center gap-2">
                                                            <svg class="w-5 h-5 text-gray-500" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2">
                                                                </path>
                                                            </svg>
                                                            NIK atau NISN
                                                        </span>
                                                    </label>
                                                    <input type="text" id="search_value" name="search_value"
                                                        placeholder="Masukkan NIK atau NISN Anda"
                                                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 text-gray-900 placeholder-gray-400"
                                                        pattern="[0-9]+" maxlength="16"
                                                        title="Hanya angka yang diperbolehkan" required>
                                                    <span id="searchError"
                                                        class="text-red-500 text-sm hidden mt-1"></span>
                                                </div>

                                                <button type="submit"
                                                    class="w-full bg-blue-600 from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transition duration-200 transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                    </svg>
                                                    Cek Status Pendaftaran
                                                </button>
                                            </form>
                                        </div>

                                        <!-- Result Section -->
                                        <div id="resultSection" class="hidden">
                                            <div id="foundResult" class="hidden">
                                                <div
                                                    class="bg-gradient-to-br from-green-50 to-emerald-50 border-2 border-green-200 rounded-xl p-6 mb-6 shadow-sm">
                                                    <div
                                                        class="flex items-center gap-3 mb-6 pb-4 border-b border-green-200">
                                                        <div class="p-2 bg-green-600 rounded-lg">
                                                            <svg class="w-6 h-6 text-white" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                        <h3 class="text-xl font-bold text-gray-800">Data Ditemukan</h3>
                                                    </div>

                                                    <div class="space-y-4">
                                                        <div class="bg-white rounded-lg p-4 border border-green-100">
                                                            <p
                                                                class="text-xs uppercase tracking-wide text-gray-500 font-semibold mb-1">
                                                                Nama
                                                                Lengkap</p>
                                                            <p id="resultName"
                                                                class="text-lg font-bold text-gray-900">
                                                            </p>
                                                        </div>

                                                        <div class="bg-white rounded-lg p-4 border border-green-100">
                                                            <p
                                                                class="text-xs uppercase tracking-wide text-gray-500 font-semibold mb-1">
                                                                Status Pendaftaran</p>
                                                            <p id="resultStatus" class="text-lg font-bold"></p>
                                                            @foreach ($registrations as $registration)
                                                                <p class="text-base text-red-900 mt-2">
                                                                    {{ $registration->catatan_admin }}</p>

                                                                <div id="revisionButton" class="hidden mt-4">
                                                                    <a href="{{ route('ppdb.edit', $registration->id) }}"
                                                                        class="inline-flex items-center justify-center gap-2 bg-orange-600 hover:bg-orange-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                                                                        <svg class="w-5 h-5" fill="none"
                                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                stroke-width="2"
                                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                                            </path>
                                                                        </svg>
                                                                        Perbaiki Data Pendaftaran
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        <div class="bg-white rounded-lg p-4 border border-green-100">
                                                            <p
                                                                class="text-xs uppercase tracking-wide text-gray-500 font-semibold mb-1">
                                                                Tanggal Pendaftaran</p>
                                                            <p id="resultDate"
                                                                class="text-base text-gray-700 font-medium"></p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="notFoundResult" class="hidden">
                                            <div
                                                class="bg-gradient-to-br from-gray-50 to-slate-50 border-2 border-gray-200 rounded-xl p-8 mb-6 text-center">
                                                <div class="inline-block p-3 bg-gray-200 rounded-full mb-4">
                                                    <svg class="w-12 h-12 text-gray-500" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <h3 class="text-xl font-bold text-gray-800 mb-2">Data Tidak
                                                    Ditemukan</h3>
                                                <p class="text-gray-600">NIK atau NISN yang Anda masukkan tidak
                                                    terdaftar dalam sistem
                                                    PPDB kami.</p>
                                            </div>
                                        </div>

                                        <button type="button" onclick="resetCheck()"
                                            class="w-full mt-4 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-3 px-6 rounded-xl transition duration-200 flex items-center justify-center gap-2 border border-gray-300">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                                </path>
                                            </svg>
                                            Cek Data Lain
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- CTA Button -->
                            <a href="{{ route('ppdb.create') }}"
                                class="block text-center bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold py-4 px-6 rounded-2xl shadow-xl hover:shadow-2xl transition duration-200 transform hover:-translate-y-1 mb-6">
                                <span class="flex items-center justify-center gap-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <span class="text-lg">Daftar Sekarang</span>
                                </span>
                            </a>

                            <!-- Info Card -->
                            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                                <div class="flex items-start gap-3 mb-4">
                                    <div class="p-2 bg-blue-100 rounded-lg mt-1">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-bold text-gray-900 mb-3 text-lg">Informasi Penting</h3>
                                        <ul class="space-y-3">
                                            <li class="flex items-start gap-2 text-gray-700">
                                                <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-sm">Gunakan NIK atau NISN untuk cek status
                                                    pendaftaran</span>
                                            </li>
                                            <li class="flex items-start gap-2 text-gray-700">
                                                <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-sm">Pastikan data yang Anda masukkan sudah
                                                    benar</span>
                                            </li>
                                            <li class="flex items-start gap-2 text-gray-700">
                                                <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-sm">Hubungi sekolah jika mengalami kendala atau
                                                    pertanyaan</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- About Hero Area -->
                </div>
                <!-- Section Container -->
            </div>
            <!-- Section Space -->
            </div>
        </section>
        <!--...::: About Hero Section End :::... -->

        @include('front.footer')
    </main>
    <script>
        document.getElementById('checkForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;

            // Disable button dan tampilkan loading
            submitButton.disabled = true;
            submitButton.textContent = 'Mencari...';

            try {
                const response = await fetch('{{ route('ppdb.check') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams(formData)
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();

                document.getElementById('checkSection').classList.add('hidden');
                document.getElementById('resultSection').classList.remove('hidden');

                if (data.found) {
                    document.getElementById('foundResult').classList.remove('hidden');
                    document.getElementById('notFoundResult').classList.add('hidden');

                    document.getElementById('resultName').textContent = data.data.nama_lengkap;
                    const statusColor = {
                        'pending': 'text-yellow-600',
                        'approved': 'text-green-600',
                        'rejected': 'text-red-600'
                    };
                    document.getElementById('resultStatus').innerHTML =
                        `<span class="${statusColor[data.data.status_value] || 'text-gray-600'}">${data.data.status}</span>`;
                    document.getElementById('resultDate').textContent = data.data.created_at;

                    // Show revision button if status is rejected
                    const revisionButton = document.getElementById('revisionButton');
                    if (data.data.status_value === 'rejected') {
                        revisionButton.classList.remove('hidden');
                    } else {
                        revisionButton.classList.add('hidden');
                    }
                } else {
                    document.getElementById('foundResult').classList.add('hidden');
                    document.getElementById('notFoundResult').classList.remove('hidden');
                }
            } catch (error) {
                console.error('Error details:', error);
                alert('Terjadi kesalahan: ' + error.message + '. Silahkan coba lagi.');
            } finally {
                // Enable button kembali
                submitButton.disabled = false;
                submitButton.textContent = originalText;
            }
        });

        function resetCheck() {
            document.getElementById('checkForm').reset();
            document.getElementById('checkSection').classList.remove('hidden');
            document.getElementById('resultSection').classList.add('hidden');
            document.getElementById('foundResult').classList.add('hidden');
            document.getElementById('notFoundResult').classList.add('hidden');
        }
    </script>
</x-layouts.app>
