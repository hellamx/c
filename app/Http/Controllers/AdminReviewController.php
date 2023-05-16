<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageStore;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class AdminReviewController extends Controller
{
    public function index()
    {
        return view('admin.review.index', [
            'title' => 'Управление отзывами',
            'reviews' => Review::select('*')->orderBy('rating', 'desc')->get()
        ]);
    }

    public function create()
    {
        return view('admin.review.create', [
            'title' => 'Добавление отзыва'
        ]);

    }

    public function store(Request $request)
    {
        $rules = [
            'text' => 'required|min:6',
            'author' => 'required|min:3',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:1024'
        ];

        $messages = [
            'text.required' => 'Текст кнопки обязателен для заполнения',
            'text.min' => 'Текст отзыва должен содержать минимум 5 символов',
            'author.required' => 'Ссылка обязательна для заполнения',
            'image.image' => 'Формат не поддерживается',
            'image.mimes' => 'Формат не поддерживается',
            'image.max' => 'Превышен объем загружаемого изображения'
        ];

        \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $messages)->validate();

        if ($request->image != null) {
        
            $previewName = Auth::user()->id . time(). '_preview' . '.'.$request->image->extension();
            $imageName = Auth::user()->id . time(). '_full' . '.'.$request->image->extension();

            $request->image->move(public_path('images'), $imageName);

            $preview = Image::make(public_path('images') . '\\' . $imageName);
            $preview->resize(100, 100)->save(public_path('images') . '\\' . $previewName);

            unlink(public_path('images') . '\\' . $imageName);

        }

        Review::create([
            'content' => $request->text,
            'author' => $request->author,
            'image' => $previewName ?? 'human.png'
        ]);
        
        session()->flash('success', 'Отзыв добавлен');
        return redirect()->back();

    }

    public function destroy($id)
    {
        Review::destroy($id);
        session()->flash('success', 'Отзыв удален');
        return redirect()->back();
    }

    public function edit($id)
    {   
        return view('admin.review.edit', [
            'title' => 'Редактирование комментария',
            'review' => Review::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $review = Review::find($id);
        
        $review->content = $request->text;
        $review->author = $request->author;
        $review->rating = $request->rating;

        if ($review->save()) {
            session()->flash('success', 'Данные сохранены');
            return redirect()->back();
        }
    }
}
