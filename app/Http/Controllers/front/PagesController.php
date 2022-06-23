<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $urls = Page::select('slug', 'title')->where('is_published', true)->get();
        return view('front.home', compact('urls'));
    }
    public function show($pageslug)
    {
        $urls = Page::select('slug', 'title')->where('is_published', true)->get();
        $page = Page::where('slug', $pageslug)->where('is_published', true)->first();
        if (!$page) {
            abort(404);
        }
        return view('front.index', compact('urls', 'page'));
    }
}
