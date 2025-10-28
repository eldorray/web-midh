<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'Kegiatan Peringatan Maulid Nabi Muhammad SAW 2025',
                'slug' => 'kegiatan-peringatan-maulid-nabi-muhammad-saw-2025',
                'content' => '<p>Pada hari Senin, 25 Oktober 2025, MI Daarul Hikmah mengadakan kegiatan peringatan Maulid Nabi Muhammad SAW yang dihadiri oleh seluruh siswa, guru, dan wali murid. Kegiatan dimulai dengan pembacaan sholawat badar dan ceramah dari ustadz tamu yang mengupas tentang sejarah kelahiran Nabi Muhammad SAW.</p><p>Acara berlangsung khidmat dan meriah dengan berbagai lomba islami seperti kaligrafi, hafalan surat pendek, tilawah Al-Quran, dan rebana. Para siswa sangat antusias mengikuti setiap kegiatan yang diadakan.</p><p>Kepala Madrasah dalam sambutannya berharap kegiatan ini dapat meningkatkan kecintaan siswa kepada Rasulullah SAW dan mengamalkan akhlak beliau dalam kehidupan sehari-hari.</p>',
                'author' => 'Admin Madrasah',
                'tags' => 'kegiatan,islam,maulid,peringatan',
                'is_published' => true,
            ],
            [
                'title' => 'Prestasi Gemilang: Siswa MI Daarul Hikmah Raih Juara OSN',
                'slug' => 'prestasi-gemilang-siswa-mi-daarul-hikmah-raih-juara-osn',
                'content' => '<p>Membanggakan! Siswa MI Daarul Hikmah berhasil meraih medali emas dan perak dalam Olimpiade Sains Nasional (OSN) tingkat provinsi tahun 2025. Muhammad Rizki dari kelas 6 meraih medali emas untuk bidang Matematika, sementara Siti Aisyah kelas 6 meraih medali perak untuk bidang IPA.</p><p>Prestasi ini merupakan hasil kerja keras para siswa yang telah mempersiapkan diri dengan latihan intensif selama 3 bulan dibimbing oleh guru-guru berpengalaman. Mereka rutin berlatih setiap hari setelah jam pelajaran selesai.</p><p>Kepala Madrasah mengucapkan terima kasih kepada para guru pembimbing dan orang tua yang telah mendukung prestasi gemilang ini. Madrasah berharap prestasi ini dapat memotivasi siswa lain untuk terus berprestasi.</p>',
                'author' => 'Koordinator Akademik',
                'tags' => 'prestasi,olimpiade,sains,juara',
                'is_published' => true,
            ],
            [
                'title' => 'Implementasi Kurikulum Merdeka di MI Daarul Hikmah',
                'slug' => 'implementasi-kurikulum-merdeka-di-mi-daarul-hikmah',
                'content' => '<p>Mulai tahun ajaran 2025/2026, MI Daarul Hikmah resmi menerapkan Kurikulum Merdeka untuk memberikan pembelajaran yang lebih fleksibel dan sesuai dengan kebutuhan siswa. Kurikulum ini memungkinkan siswa mengembangkan minat dan bakat sesuai potensi masing-masing.</p><p>Guru-guru telah mendapat pelatihan khusus dari Kementerian Agama untuk implementasi kurikulum baru ini. Mereka dibekali dengan berbagai metode pembelajaran inovatif yang berpusat pada siswa (student-centered learning).</p><p>Dengan Kurikulum Merdeka, siswa akan mendapat lebih banyak kesempatan untuk belajar secara praktik, berkolaborasi, dan mengembangkan karakter sesuai dengan nilai-nilai Pancasila dan ajaran Islam.</p>',
                'author' => 'Kepala Madrasah',
                'tags' => 'kurikulum,pendidikan,inovasi,merdeka belajar',
                'is_published' => true,
            ],
            [
                'title' => 'Kunjungan Edukatif ke Museum Nasional Jakarta',
                'slug' => 'kunjungan-edukatif-ke-museum-nasional-jakarta',
                'content' => '<p>Siswa kelas 4 dan 5 MI Daarul Hikmah mengikuti kunjungan edukatif ke Museum Nasional Jakarta pada tanggal 15 Oktober 2025. Kegiatan ini bertujuan untuk menambah wawasan siswa tentang sejarah dan budaya Indonesia.</p><p>Para siswa sangat antusias melihat berbagai koleksi bersejarah seperti prasasti kuno, keramik, tekstil, hingga peninggalan kerajaan-kerajaan di Nusantara. Mereka mendapat penjelasan lengkap dari pemandu museum yang sangat informatif.</p><p>Kegiatan ini merupakan bagian dari pembelajaran IPS yang mengintegrasikan teori di kelas dengan pengalaman langsung di lapangan. Siswa diharapkan dapat lebih memahami dan mencintai sejarah bangsa Indonesia.</p>',
                'author' => 'Guru IPS',
                'tags' => 'edukatif,museum,sejarah,kunjungan',
                'is_published' => true,
            ],
            [
                'title' => 'Tim Robotika MI Daarul Hikmah Juara 1 Kompetisi Robotika',
                'slug' => 'tim-robotika-mi-daarul-hikmah-juara-1-kompetisi-robotika',
                'content' => '<p>Ekstrakurikuler robotika MI Daarul Hikmah kembali mengukir prestasi! Tim yang terdiri dari 5 siswa berhasil meraih juara 1 dalam kompetisi robotika tingkat kota yang diikuti oleh 25 tim dari berbagai sekolah.</p><p>Tim berhasil menunjukkan kemampuan mereka dalam merancang dan memprogram robot untuk menyelesaikan berbagai tantangan yang diberikan. Robot yang mereka buat dinilai paling inovatif dan efisien dalam menyelesaikan misi.</p><p>Prestasi ini membuktikan bahwa MI Daarul Hikmah tidak hanya unggul di bidang akademik dan keagamaan, tetapi juga di bidang teknologi. Madrasah terus mendorong siswa untuk mengembangkan kemampuan di bidang STEM (Science, Technology, Engineering, and Mathematics).</p>',
                'author' => 'Pembina Robotika',
                'tags' => 'ekstrakurikuler,robotika,prestasi,teknologi',
                'is_published' => true,
            ],
            [
                'title' => 'Pembukaan Tahun Ajaran Baru 2025/2026',
                'slug' => 'pembukaan-tahun-ajaran-baru-2025-2026',
                'content' => '<p>MI Daarul Hikmah resmi membuka tahun ajaran baru 2025/2026 dengan upacara bendera yang dihadiri seluruh warga madrasah pada hari Senin, 15 Juli 2025. Kepala Madrasah menyampaikan sambutan dan harapan untuk tahun ajaran yang baru.</p><p>Tahun ini, madrasah menerima 180 siswa baru dari berbagai daerah di Jakarta dan sekitarnya. Para siswa baru terlihat sangat antusias memulai perjalanan pendidikan mereka di MI Daarul Hikmah.</p><p>Madrasah telah mempersiapkan berbagai program unggulan untuk tahun ajaran ini, termasuk implementasi Kurikulum Merdeka, penguatan tahfidz Quran, dan pengembangan ekstrakurikuler berbasis minat dan bakat siswa.</p>',
                'author' => 'Humas Madrasah',
                'tags' => 'tahun ajaran,pembukaan,pendidikan,siswa baru',
                'is_published' => true,
            ],
            [
                'title' => 'Kegiatan Bakti Sosial Peduli Panti Asuhan',
                'slug' => 'kegiatan-bakti-sosial-peduli-panti-asuhan',
                'content' => '<p>OSIS MI Daarul Hikmah mengadakan kegiatan bakti sosial ke Panti Asuhan Al-Hikmah pada tanggal 20 Oktober 2025. Kegiatan ini membawa bantuan berupa sembako, buku, alat tulis, dan perlengkapan sekolah untuk anak-anak panti.</p><p>Selain menyerahkan bantuan, para siswa juga mengadakan pertunjukan seni berupa nasyid, drama islami, dan permainan edukatif bersama anak-anak panti. Suasana menjadi sangat ceria dan penuh keakraban.</p><p>Kegiatan ini bertujuan menumbuhkan kepedulian sosial dan empati siswa terhadap sesama. Siswa diharapkan dapat memahami pentingnya berbagi dan membantu mereka yang membutuhkan.</p>',
                'author' => 'Pembina OSIS',
                'tags' => 'bakti sosial,osis,kegiatan,peduli sesama',
                'is_published' => true,
            ],
            [
                'title' => 'Workshop Pembuatan Film Pendek untuk Siswa',
                'slug' => 'workshop-pembuatan-film-pendek-untuk-siswa',
                'content' => '<p>MI Daarul Hikmah mengadakan workshop pembuatan film pendek pada tanggal 18 Oktober 2025 yang diikuti oleh 30 siswa pecinta seni. Workshop ini menghadirkan praktisi film profesional sebagai pembicara dan instruktur.</p><p>Siswa belajar tentang teknik pengambilan gambar, editing video, storytelling, dan akting. Mereka juga praktik langsung membuat film pendek dengan tema "Akhlak Terpuji" yang akan ditampilkan dalam acara pentas seni madrasah.</p><p>Workshop ini merupakan bagian dari upaya madrasah untuk mengembangkan kreativitas dan kemampuan siswa di bidang multimedia. Diharapkan siswa dapat menyalurkan bakat mereka melalui karya-karya positif dan inspiratif.</p>',
                'author' => 'Koordinator Kesenian',
                'tags' => 'workshop,film,seni,kreativitas',
                'is_published' => true,
            ],
            [
                'title' => 'Pelatihan Public Speaking dan Leadership untuk Pengurus OSIS',
                'slug' => 'pelatihan-public-speaking-dan-leadership-untuk-pengurus-osis',
                'content' => '<p>MI Daarul Hikmah menyelenggarakan pelatihan public speaking dan leadership pada tanggal 12 Oktober 2025 untuk mengasah kemampuan siswa dalam berkomunikasi dan memimpin. Pelatihan diikuti oleh 40 siswa yang merupakan pengurus OSIS dan perwakilan kelas.</p><p>Materi pelatihan meliputi teknik berbicara di depan umum, mengatasi nervous, leadership style, manajemen organisasi, dan problem solving. Pelatihan disampaikan dengan metode interaktif dan banyak praktik langsung.</p><p>Kepala Madrasah berharap para siswa dapat mengaplikasikan ilmu yang didapat untuk memimpin organisasi dengan baik dan menjadi role model bagi teman-teman mereka. Leadership skill sangat penting untuk mempersiapkan siswa menjadi pemimpin masa depan.</p>',
                'author' => 'Wakil Kesiswaan',
                'tags' => 'pelatihan,leadership,public speaking,osis',
                'is_published' => true,
            ],
            [
                'title' => 'Launching Perpustakaan Digital MI Daarul Hikmah',
                'slug' => 'launching-perpustakaan-digital-mi-daarul-hikmah',
                'content' => '<p>MI Daarul Hikmah resmi meluncurkan perpustakaan digital pada tanggal 10 Oktober 2025 yang memudahkan siswa mengakses ribuan buku elektronik. Perpustakaan digital ini dapat diakses melalui website madrasah dan aplikasi mobile yang bisa diunduh gratis.</p><p>Koleksi perpustakaan digital meliputi buku pelajaran, buku cerita anak, komik edukatif, ensiklopedia, dan buku-buku islami. Siswa dapat membaca kapan saja dan di mana saja menggunakan smartphone atau tablet mereka.</p><p>Fasilitas ini diharapkan dapat meningkatkan minat baca siswa dan mempermudah akses informasi untuk mendukung pembelajaran. Perpustakaan digital ini merupakan investasi madrasah dalam bidang teknologi pendidikan untuk mempersiapkan generasi digital yang literat.</p>',
                'author' => 'Kepala Perpustakaan',
                'tags' => 'perpustakaan,digital,teknologi,literasi',
                'is_published' => true,
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}

