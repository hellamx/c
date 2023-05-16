@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 ml-2">Элементы презентации</h1>
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
    
    @include('admin.alert')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach($items as $item)
                <div class="card-wrapper col-3 d-flex">
                    <div class="col-12 imgUploadForm">
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Загрузка изображения карточки</h3>
                        </div>
                    
                        <form enctype="multipart/form-data" method="post" action="{{ route('admin.presentation.icon') }}">          
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <div class="card-body">
                                <div class="form-group mb-0">
                                    <label for="exampleInputFile">Файл</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
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
                                <button class="uploadImgBtn btn btn-success">Закрыть</button>
                            </div>
                        </form>
                        </div>
                    
                    </div>

                    <div class="col-12 presentationEditForm">
                        <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Редактирование карточки</h3>
                        </div>
                    
                        <form method="post" action="{{ route('admin.presentation.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">               
                            <div class="card-body">
                                <div class="form-group mb-0">
                                    <label for="content">Текст карточки</label>
                                    <input type="text" id="content" name="content" placeholder="Текст карточки" value="{{ $item->content }}" class="form-control">
                                </div>
                            </div>
                    
                            <div class="card-footer pt-0">
                                <button type="submit" class="btn btn-success">Сохранить</button>
                                <button class="presentationEditBtn btn btn-success">Закрыть</button>
                            </div>
                        </form>
                        </div>
                    
                    </div>

                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img style="object-fit:cover; max-width: 100px" class="img-fluid img-circle pt-2 pb-2" src="{{ route('main') }}/public/icons/{{ $item->icon }}" alt="Presentation icon">
                                </div>
                                <h3 class="pt-4 pb-4 profile-username text-center">{{ $item->content }}</h3>
                                <a href="#" class="presentationEditBtn btn btn-primary btn-block"><b>Редактировать текст</b></a>
                                <a href="#" class="uploadImgBtn btn btn-primary btn-block"><b>Загрузить изображение</b></a>
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