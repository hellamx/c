<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Sidebar;
use App\Models\Presentation;
use App\Models\PresentationImage;
use App\Models\Title;
use App\Models\Review;
use App\Models\Listq;

class MainController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'Главная страница',
            'pages' => Page::select('*')->orderBy('id', 'desc')->get(),
            'sidebar' => Sidebar::find(1),
            'presentation' => Presentation::select('*')->get(),
            'mainImage' => PresentationImage::find(1),
            'presentTitle' => Title::find(1)->title,
            'reviews' => Title::find(2)->title,
            'list' => Title::find(3)->title,
            'topReview' => Review::select('*')->orderBy('rating', 'desc')->first(),
            'allReviews' => Review::select('*')->limit(2)->orderBy('id', 'desc')->get(),
            'lists' => Listq::select('*')->limit(5)->get()
        ]);
    }

    public function show($url)
    {

        $page = Page::select('*')->where('url', '=', $url)->get();

        if (!$page || $page->isEmpty() || $page->first()->status != 1) abort(404);

        return view('page', [
            'title' => $page->first()->title,
            'pages' => Page::select('*')->orderBy('id', 'desc')->get(),
            'page' => $page->first(),
            'sidebar' => Sidebar::find(1),
            'presentation' => Presentation::select('*')->get(),
            'mainImage' => PresentationImage::find(1),
            'presentTitle' => Title::find(1)->title,
            'reviews' => Title::find(2)->title,
            'list' => Title::find(3)->title,
            'topReview' => Review::select('*')->orderBy('rating', 'desc')->first(),
            'allReviews' => Review::select('*')->limit(2)->orderBy('id', 'desc')->get(),
            'lists' => Listq::select('*')->limit(5)->get()
        ]);
    }
}
