<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Title;

class AdminTitleController extends Controller
{
    public function presentation(Request $request)
    {
        return view('admin.title.presentation', [
            'title' => 'Редактирование заголовка презентации',
            'text' => Title::find(1)->title
        ]);
    }

    public function reviews(Request $request)
    {
        return view('admin.title.reviews', [
            'title' => 'Редактирование заголовка отзывов',
            'text' => Title::find(2)->title
        ]);

    }

    public function list(Request $request)
    {
        return view('admin.title.list', [
            'title' => 'Редактирование заголовка списка',
            'text' => Title::find(3)->title
        ]);

    }
    
    public function update(Request $request)
    {
        $title = Title::find($request->id);
        $title->title = $request->title;

        if($title->save()) {
            session()->flash('success', 'Данные изменены');
            return redirect()->back();
        }
    }
}
