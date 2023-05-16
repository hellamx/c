@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление нового пользователя</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
          </div>
        </div>
    </div>

    <div class="content">
        @include('admin.alert')
        <div class="container-fluid">
            <div class="card card-dark">
            
                <form method="post" action="{{ route('admin.user.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="text">Логин</label>
                            <input type="text" class="form-control" name="login" id="login" placeholder="Логин" />
                        </div>

                        <div class="form-group">
                            <label for="fullname">ФИО</label>
                            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="ФИО" />
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Пароль" />
                        </div>

                        <div class="form-group">
                            <label for="phone">Номер телефона</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Номер телефона" />
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="E-mail" />
                        </div>

                        <div class="form-group">
                            <label for="role">Роль</label>
                            <select class="custom-select" name="role" id="role">
                                <option value="0">Обычный пользователь</option>
                                <option value="1">Администратор</option>
                            </select>
                        </div>
                    </div>
            
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Добавить страницу</button>
                    </div>
                </form>

            </div>
            
        </div>
    </div>

  </div>
  
@endsection