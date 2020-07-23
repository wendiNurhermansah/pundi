<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

// Model
use App\Models\Artikel;

class UserComposer
{
    public function compose(View $view)
    {
        /**
         * View Header
         */
        // Get data post terbaru
        $header_news = Artikel::select('id', 'judul', 'status')
            ->wherestatus(1)
            ->orderBy('created_at', 'desc')
            ->get();

        /**
         * View Right Sidebar
         */
        // Get data artikel
        $right_sideBar = Artikel::select('id', 'judul', 'kategori_id', 'sub_kategori_id', 'gambar', 'penulis_id', 'created_at')
            ->wherestatus(1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Return
        $view->with('header_news', $header_news)
            ->with('right_sideBar', $right_sideBar);
    }
}
