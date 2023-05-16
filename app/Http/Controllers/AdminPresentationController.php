<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageStore;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Auth;
use App\Models\Presentation;
use App\Models\PresentationImage;

class AdminPresentationController extends Controller
{
    public function index()
    {
        return view('admin.presentation.index', [
            'title' => 'Управление презентацией',
            'items' => Presentation::select('*')->orderBy('id', 'desc')->get()
        ]);
    }

    public function image()
    {
        return view('admin.presentation.image', [
            'title' => 'Управление изображением презентации',
            'currentImage' => PresentationImage::find(1)
        ]);
    }

    public function update(Request $request)
    {
        $presentation = Presentation::find($request->id);
        $presentation->content = $request->content;
        
        if ($presentation->save()) {
            session()->flash('success', 'Данные сохранены');
            return redirect()->back();
        }
    }

    public function uploadIcon(ImageStore $request)
    {
        $validated = $request->validated();
        
        $previewName = Auth::user()->id . time(). '_preview' . '.'.$validated['image']->extension();
        $imageName = Auth::user()->id . time(). '_full' . '.'.$validated['image']->extension();

        $validated['image']->move(public_path('icons'), $imageName);

        $preview = Image::make(public_path('icons') . '\\' . $imageName);
        $preview->resize(100, 100)->save(public_path('icons') . '\\' . $previewName);

        $dbh = Presentation::find($request->id);
        $dbh->icon = $previewName;

        unlink(public_path('icons') . '\\' . $imageName);
        
        if($dbh->save()) {
            session()->flash('success', 'Изображение успешно загружено');
            return redirect()->back();
        } else {
            abort(404);
        }
    }

    public function uploadImg(ImageStore $request)
    {

        $validated = $request->validated();
        
        $previewName = Auth::user()->id . time(). '_preview' . '.'.$validated['image']->extension();
        $imageName = Auth::user()->id . time(). '_full' . '.'.$validated['image']->extension();

        $validated['image']->move(public_path('images'), $imageName);

        $preview = Image::make(public_path('images') . '\\' . $imageName);
        $preview->resize(600, 400)->save(public_path('images') . '\\' . $previewName);

        $dbh = PresentationImage::find(1);
        $dbh->image = $previewName;

        unlink(public_path('images') . '\\' . $imageName);
        
        if($dbh->save()) {
            session()->flash('success', 'Изображение успешно загружено');
            return redirect()->back();
        } else {
            abort(404);
        }
    }
}
