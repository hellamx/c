<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidateLoginForm;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'title' => 'Панель управления сайтом',
            'users' => User::select('*')->where('id', '!=', Auth::user()->id)->orderBy('id', 'desc')->get()
        ]);
    }

    public function login()
    {
        return view('admin.login', ['title' => 'Авторизация пользователя']);
    }

    public function auth(ValidateLoginForm $request)
    {
        $validated = $request->validated();
    
        /**
         * Аутентификация
         */
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->route('admin.index');
        } else {
            session()->flash('error', 'Неверный логин или пароль');
            return redirect()->back();
        }
    }

    /**
     * Выход из аккаунта
     */
    public function logout(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
