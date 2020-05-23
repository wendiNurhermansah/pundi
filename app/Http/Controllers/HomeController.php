<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Artikel;

class HomeController extends Controller
{
    // Middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Index
    public function index()
    {
        $trending_top = Artikel::select('id', 'judul', 'kategori_id', 'sub_kategori_id', 'gambar', 'penulis_id', 'created_at')->orderBy('created_at', 'desc')->first();

        $trending_bottom  = Artikel::select('id', 'judul', 'kategori_id', 'sub_kategori_id', 'gambar', 'penulis_id', 'created_at')
            // ->whereNotIn('id', $trending_top)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $trending_right = Artikel::select('id', 'judul', 'kategori_id', 'sub_kategori_id', 'gambar', 'penulis_id', 'created_at')
            // ->whereNotIn('id', $trending_bottom)
            ->orderBy('created_at', 'desc')
            ->get();

        $berita_mingguan = Artikel::select('id', 'judul', 'kategori_id', 'sub_kategori_id', 'gambar', 'penulis_id', 'created_at')->get();

        return view('home', compact(
            'trending_top',
            'trending_bottom',
            'trending_right',
            'berita_mingguan'
        ));
    }
}
