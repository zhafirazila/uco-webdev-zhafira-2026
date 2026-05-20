<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function list(Request $request)
    {
        $articles = $request->session()->get('articles');
        return view('article.list', [
            'articles' => $articles
        ]);
    }

    function create(Request $request)
    {
        // 1. Jika form disubmit (POST), simpan data ke session dan redirect
        if ($request->isMethod('post')) {
            $request->session()->push('articles', [
                'title' => $request->title,
                'content' => $request->content,
                'date' => date('Y-m-d H:i:s')
            ]);

            return redirect()->route('article.list');
        }

        // 2. Jika biasa diakses (GET), tampilkan halaman form
        return view('article.form');
    }
}
