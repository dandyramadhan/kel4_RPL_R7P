<?php
require_once __DIR__ . '/BaseController.php';

/**
 * DashboardController
 * Menangani halaman ringkasan Dashboard pengguna.
 */
class DashboardController extends BaseController
{
    public function index(): void
    {
        $user = [
            'nama' => 'Aria Sastra',
            'nama_panggilan' => 'Aria',
            'predikat' => 'Pembaca Setia',
            'level' => 12,
            'total_halaman' => 4850,
        ];

        $stats = [
            'total_buku' => 48,
            'belum_dibaca' => 12,
            'sedang_dibaca' => 5,
            'selesai' => 31,
            'persen_tahunan' => 64,
            'sisa_target' => 17,
            'buku_bulan_ini' => 4,
            'nama_bulan' => 'April',
        ];

        $lastRead = [
            'id' => 1,
            'judul' => 'Atomic Habits',
            'penulis' => 'James Clear',
            'status' => 'Reading',
            'halaman_terakhir' => 234,
            'total_halaman' => 300,
            'persen' => 78,
            'cover_theme' => 'blue',
        ];

        $this->view('dashboard/index', [
            'pageTitle' => 'Dashboard - ReadTrack',
            'activePage' => 'dashboard',
            'user' => $user,
            'stats' => $stats,
            'lastRead' => $lastRead,
        ]);
    }
}
