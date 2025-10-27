<x-layouts.app>
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-2xl mx-auto text-center">
            <div class="mb-8">
                <svg class="w-24 h-24 mx-auto text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>

            <h1 class="text-4xl font-bold text-gray-800 mb-4">Pendaftaran Berhasil!</h1>

            <p class="text-lg text-gray-600 mb-8">
                Terima kasih telah mendaftar. Data pendaftaran Anda telah berhasil dikirim dan akan segera diproses oleh
                tim kami.
            </p>

            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-3">Langkah Selanjutnya</h2>
                <ul class="text-left text-gray-700 space-y-2">
                    <li class="flex items-start">
                        <span class="mr-2">✓</span>
                        <span>Cek email Anda untuk konfirmasi pendaftaran</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-2">✓</span>
                        <span>Simpan nomor pendaftaran Anda untuk referensi</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-2">✓</span>
                        <span>Pantau status pendaftaran secara berkala</span>
                    </li>
                </ul>
            </div>

            <div class="space-x-4">
                <a href="/"
                    class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                    Kembali ke Beranda
                </a>
                <a href="{{ route('ppdb.index') }}"
                    class="inline-block bg-gray-200 text-gray-800 px-6 py-3 rounded-lg hover:bg-gray-300 transition">
                    Cek Status Pendaftaran
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
