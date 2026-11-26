<?php
require_once __DIR__ . '/BaseController.php';

/**
 * BookController
 * Menangani halaman Koleksi Buku, Sedang Dibaca, dan Riwayat Membaca.
 */
class BookController extends BaseController
{
    private function getDefaultUser(): array
    {
        return [
            'nama' => 'Aria Sastra',
            'nama_panggilan' => 'Aria',
            'predikat' => 'Pembaca Setia',
            'level' => 12,
            'total_halaman' => 4850,
        ];
    }

    public function koleksi(): void
    {
        $books = [
            [
                'id' => 1,
                'judul' => 'Atomic Habits',
                'penulis' => 'James Clear',
                'kategori' => 'Self-Help',
                'status' => 'Reading',
                'status_key' => 'sedang_dibaca',
                'halaman_terakhir' => 234,
                'total_halaman' => 300,
                'cover_theme' => 'blue',
            ],
            [
                'id' => 2,
                'judul' => 'Filosofi Teras',
                'penulis' => 'Henry Manampiring',
                'kategori' => 'Self-Help',
                'status' => 'Finished',
                'status_key' => 'selesai',
                'halaman_terakhir' => 320,
                'total_halaman' => 320,
                'cover_theme' => 'green',
            ],
            [
                'id' => 3,
                'judul' => 'Sapiens',
                'penulis' => 'Yuval Noah Harari',
                'kategori' => 'History',
                'status' => 'Not started',
                'status_key' => 'belum_dibaca',
                'halaman_terakhir' => 0,
                'total_halaman' => 512,
                'cover_theme' => 'amber',
            ],
            [
                'id' => 4,
                'judul' => 'Bumi Manusia',
                'penulis' => 'Pramoedya Ananta Toer',
                'kategori' => 'Fiction',
                'status' => 'Finished',
                'status_key' => 'selesai',
                'halaman_terakhir' => 535,
                'total_halaman' => 535,
                'cover_theme' => 'red',
            ],
            [
                'id' => 5,
                'judul' => 'Clean Code',
                'penulis' => 'Robert C. Martin',
                'kategori' => 'Technology',
                'status' => 'Not started',
                'status_key' => 'belum_dibaca',
                'halaman_terakhir' => 0,
                'total_halaman' => 464,
                'cover_theme' => 'indigo',
            ],
            [
                'id' => 6,
                'judul' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'kategori' => 'Fiction',
                'status' => 'Reading',
                'status_key' => 'sedang_dibaca',
                'halaman_terakhir' => 238,
                'total_halaman' => 529,
                'cover_theme' => 'pink',
            ],
        ];

        $categories = ['Self-Help', 'History', 'Fiction', 'Technology'];

        $this->view('books/koleksi', [
            'pageTitle' => 'Koleksi Buku - ReadTrack',
            'activePage' => 'koleksi',
            'user' => $this->getDefaultUser(),
            'books' => $books,
            'categories' => $categories,
        ]);
    }

    public function sedangDibaca(): void
    {
        $readingBooks = [
            [
                'id' => 1,
                'judul' => 'Atomic Habits',
                'penulis' => 'James Clear',
                'tanggal_mulai' => '12 Apr 2026',
                'halaman_terakhir' => 234,
                'total_halaman' => 300,
                'status' => 'Reading',
                'cover_theme' => 'blue',
                'is_expanded' => true,
            ],
            [
                'id' => 6,
                'judul' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'tanggal_mulai' => '01 Apr 2026',
                'halaman_terakhir' => 238,
                'total_halaman' => 529,
                'status' => 'Reading',
                'cover_theme' => 'pink',
                'is_expanded' => false,
            ],
        ];

        $this->view('books/sedang_dibaca', [
            'pageTitle' => 'Sedang Dibaca - ReadTrack',
            'activePage' => 'sedang-dibaca',
            'user' => $this->getDefaultUser(),
            'readingBooks' => $readingBooks,
        ]);
    }

    public function riwayat(): void
    {
        $finishedBooks = [
            [
                'id' => 2,
                'judul' => 'Filosofi Teras',
                'penulis' => 'Henry Manampiring',
                'kategori' => 'Self-Help',
                'tanggal_mulai' => '01 Mar 2026',
                'tanggal_selesai' => '28 Mar 2026',
                'total_halaman' => 320,
                'cover_theme' => 'green',
                'show_cover_title' => true,
            ],
            [
                'id' => 4,
                'judul' => 'Bumi Manusia',
                'penulis' => 'Pramoedya Ananta Toer',
                'kategori' => 'Fiction',
                'tanggal_mulai' => '12 Feb 2026',
                'tanggal_selesai' => '05 Mar 2026',
                'total_halaman' => 535,
                'cover_theme' => 'red',
                'show_cover_title' => true,
            ],
            [
                'id' => 7,
                'judul' => 'Seni Berpikir Cerdas',
                'penulis' => 'Rolf Dobelli',
                'kategori' => 'Self-Help',
                'tanggal_mulai' => '10 Jan 2026',
                'tanggal_selesai' => '31 Jan 2026',
                'total_halaman' => 280,
                'cover_theme' => 'blue',
                'show_cover_title' => false,
            ],
            [
                'id' => 8,
                'judul' => 'Ronggeng Dukuh Paruk',
                'penulis' => 'Ahmad Tohari',
                'kategori' => 'Fiction',
                'tanggal_mulai' => '15 Des 2025',
                'tanggal_selesai' => '30 Des 2025',
                'total_halaman' => 408,
                'cover_theme' => 'indigo',
                'show_cover_title' => false,
            ],
            [
                'id' => 9,
                'judul' => 'Sejarah Ringkas Dunia',
                'penulis' => 'H.G. Wells',
                'kategori' => 'History',
                'tanggal_mulai' => '01 Nov 2025',
                'tanggal_selesai' => '10 Des 2025',
                'total_halaman' => 440,
                'cover_theme' => 'amber',
                'show_cover_title' => false,
            ],
        ];

        $categories = ['Self-Help', 'Fiction', 'History'];

        $this->view('books/riwayat', [
            'pageTitle' => 'Riwayat Membaca - ReadTrack',
            'activePage' => 'riwayat',
            'user' => $this->getDefaultUser(),
            'finishedBooks' => $finishedBooks,
            'categories' => $categories,
        ]);
    }
}
