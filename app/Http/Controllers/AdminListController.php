<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Listq;

class AdminListController extends Controller
{
    
    public function index()
    {
        return view('admin.list.index', [
            'title' => 'Редактирование списков',
            'items' => Listq::select('*')->orderBy('id', 'desc')->get()
        ]);
    }

    public function update(Request $request)
    {
        $list = Listq::find($request->id);

        $list->title = $request->title;
        $list->content = $request->content;

        if ($list->save()) {
            session()->flash('success', 'Данные сохранены');
            return redirect()->back();
        }
    }

}
