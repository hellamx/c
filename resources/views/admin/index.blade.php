@extends('admin.layouts.layout')

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 ml-2">Административная панель | Сотрудники</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Главная</a></li>
                </ol>
            </div>
          </div>
      </div>
    </div>

    <div class="content">
    <div class="container-fluid">
        
        <div class="col-12" id="imgUploadForm">
          <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Загрузка изображения профиля</h3>
            </div>
        
            <form enctype="multipart/form-data" method="post" action="{{ route('admin.image.upload') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label for="exampleInputFile">Файл</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile" />
                                <label class="custom-file-label" for="exampleInputFile">Выбрать</label>
                            </div>
                        </div>
                        <span class="text-muted pt-2 d-block">Рекомендуемый формат 1:1</span>
                        <span class="text-muted d-block">Максимальный размер файла - 1МБ</span>
                        <span class="text-muted d-block">Допустимые расширения - jpg/jpeg, png, webp</span>
                    </div>
                </div>
        
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Загрузить</button>
                </div>
            </form>
          </div>
        
        </div>

        <div class="container-fluid">
          <div class="col-md-12">
            @include('admin.alert')
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3">

            <div class="col-md-12">

              <div class="card card-primary card-outline">
                
                <div class="card-body box-profile">
                  <div class="text-center">
                    @if(Auth::user()->image)
                    <a href="{{ route('main') }}/public/images/{{ Auth::user()->image_full }}" target="_blank">
                      <img class="profile-user-img img-fluid img-circle" src="{{ route('main') }}/public/images/{{ Auth::user()->image }}" width="100" height="100" alt="User profile picture">
                    </a>
                    @else
                    <img class="profile-user-img img-fluid img-circle" src="{{ route('main') }}/public/images/user.png" alt="User profile picture">
                    @endif
                  </div>
                  <h3 class="profile-username text-center">{{ Auth::user()->username }} (Вы)</h3>
                  <p class="text-muted text-center">{{ Auth::user()->position }}</p>
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Дата регистрации</b> <a class="float-right">{{ Auth::user()->created_at }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Номер телефона</b> <a class="float-right">{{ Auth::user()->phone }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>E-mail</b> <a class="float-right">{{ Auth::user()->email }}</a>
                    </li>
                  </ul>
                  <a href="{{ route('admin.user.create') }}" class="btn btn-success btn-block"><b>Добавить нового пользователя</b></a>
                  <button id="uploadImgBtn" class="btn btn-primary btn-block"><b>Загрузить изображение профиля</b></button>
                  <form action="{{ route('admin.logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger mt-2 btn-block"><b>Выйти</b></button>
                  </form>
                </div>  
              
              </div>     
              
              </div>

          </div>

          @foreach($users as $user)
          <div class="col-lg-3">

            <div class="col-md-12">

              <div class="card card-dark card-outline">
                
                <div class="card-body box-profile">
                  <div class="text-center">
                    @if($user->image)
                    <a href="{{ route('main') }}/public/images/{{ $user->image_full }}" target="_blank">
                      <img class="profile-user-img img-fluid img-circle" src="{{ route('main') }}/public/images/{{ $user->image }}" width="100" height="100" alt="User profile picture">
                    </a>
                    @else
                    <img class="profile-user-img img-fluid img-circle" src="{{ route('main') }}/public/images/user.png" alt="User profile picture">
                    @endif
                  </div>
                  <h3 class="profile-username text-center">{{ $user->username }}</h3>
                  <p class="text-muted text-center">{{ $user->position }}</p>
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Дата регистрации</b> <a class="float-right">{{ $user->created_at }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Номер телефона</b> <a class="float-right">{{ $user->phone }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>E-mail</b> <a class="float-right">{{ $user->email }}</a>
                    </li>
                  </ul>
                  <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger mt-2 btn-block"><b>Удалить</b></button>
                  </form>
                </div>  
              
              </div>     
              
            </div>
        
          </div>
          @endforeach

        </div>
    </div>
    </div>
  </div>    
@endsection