@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление отзыва</h1>
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
            
                <form enctype="multipart/form-data" method="post" action="{{ route('admin.review.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="text">Текст отзыва</label>
                            <input type="text" class="form-control" name="text" id="text" placeholder="Текст">
                        </div>
                        <div class="form-group">
                            <label for="author">Автор отзыва</label>
                            <input type="text" class="form-control" name="author" id="author" placeholder="Автор">
                        </div>
                        <div class="form-group mb-0">
                            <label for="exampleInputFile">Фотография автора (необязательно)</label>
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
                        <button type="submit" class="btn btn-primary">Добавить отзыв</button>
                    </div>
                </form>

            </div>
            
        </div>
    </div>

  </div>
  
@endsection