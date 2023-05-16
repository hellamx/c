<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Page;
use App\Models\Sidebar;

use App\Http\Requests\ValidatePageForm;
use App\Http\Requests\ValidatePageEditForm;


class AdminPageController extends Controller
{
    public function index()
    {
        return view('admin.pages.index', [
            'title' => 'Управление пунктами меню и страницами',
            'pages' => Page::select('*')->orderBy('id', 'desc')->get(),
            'sidebar' => Sidebar::select('*')->get()->first()
        ]);
    }

    public function create()
    {
        return view('admin.pages.create', ['title' => 'Добавление страницы']);
    }

    public function store(ValidatePageForm $request)
    {
        $validated = $request->validated();

        Page::create([
            'title' => $validated['text'],
            'url' => $validated['url'],
        ]);

        
        session()->flash('success', 'Страница успешно добавлена');
        return redirect()->route('admin.pages.index');
    }

    public function edit($id)
    {
        $page = Page::select('*')->where('id', '=', $id)->get();

        if (!$page || $page->isEmpty()) abort(404);

        return view('admin.pages.edit', [
            'title' => 'Редактирование страницы',
            'page' => $page->first(),
        ]);
    }

    public function update(ValidatePageEditForm $request, $id) 
    {
        $page = Page::find($id);
        if (!$page) abort(404);

        $validated = $request->validated();

        $page->title = $validated['title'];
        $page->url = $validated['url'];
        $page->content = $request->text;
        $page->status = $request->status;

        if ($page->save()) {
            session()->flash('success', 'Данные сохранены');
            return redirect()->back();
        }
    }

    public function destroy($id) 
    {
        Page::destroy($id);
        session()->flash('success', 'Страница удалена');
        return redirect()->back();
    }

    public function updateSidebar(Request $request) 
    {
        $rules = [
            'title' => 'required',
            'url' => 'required'
        ];

        $messages = [
            'title.required' => 'Текст кнопки обязателен для заполнения',
            'url.required' => 'Ссылка обязательна для заполнения',
        ];

        \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $messages)->validate();

        $sidebar = Sidebar::find(1);

        $sidebar->title = $request->title;
        $sidebar->url = $request->url;

        if($sidebar->save()) {
            session()->flash('success', 'Данные сохранены');
            return redirect()->back();
        }
    }
}
