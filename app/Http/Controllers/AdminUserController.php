<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateRegisterForm;
use App\Http\Requests\ImageStore;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AdminUserController extends Controller
{
    public function create()
    {
        return view('admin.user.create', ['title' => 'Добавление нового пользователя']);
    }

    public function store(ValidateRegisterForm $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'login' => $validated['login'],
            'username' => $validated['fullname'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'password' => Hash::make($validated['password'])
        ]);

        
        session()->flash('success', 'Пользователь успешно добавлен');
        return redirect()->route('admin.index');
    }

    public function destroy($id)
    {
        User::destroy($id);
        session()->flash('success', 'Пользователь удален');
        return redirect()->back();

    }

    public function uploadImg(ImageStore $request)
    {
        /**
         * Валидация и получение данных
         */
        $validated = $request->validated();

        /**
         * Название превью изображения: user_id + метка времени + приставка _preview + расширение
         */
        $previewName = Auth::user()->id . time(). '_preview' . '.'.$validated['image']->extension();

        /**
         * Название исходного изображения: user_id + метка времени + приставка _full + расширение
         */
        $imageName = Auth::user()->id . time(). '_full' . '.'.$validated['image']->extension();

                
        /**
         * Сохранение в публичную папку
         */
        $validated['image']->move(public_path('images'), $imageName);

        /**
         * Обрезание изображения
         */
        $preview = Image::make(public_path('images') . '\\' . $imageName);
        $preview->crop(600, 600, 25, 25)->save(public_path('images') . '\\' . $previewName);;

        /**
         * Обновление данных в базе данных
         */
        Auth::user()->image_full = $imageName;
        Auth::user()->image = $previewName;
        
        if(Auth::user()->save()) {
            session()->flash('success', 'Изображение успешно загружено');
            return redirect()->back();
        } else {
            abort(404);
        }
    }
}
