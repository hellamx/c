@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование комментария</h1>
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
            
                <form method="post" action="{{ route('admin.review.update', $review->id) }}">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="author">Автор</label>
                            <input type="text" class="form-control" name="author" value="{{ $review->author }}" id="author" placeholder="Автор">
                        </div>
                        <div class="form-group">
                            <label for="rating">Рейтинг</label>
                            <input type="text" class="form-control" name="rating" value="{{ $review->rating }}" id="rating" placeholder="Рейтинг">
                        </div>
                        <div class="form-group mb-0">
                            <label for="text">Текст отзыва</label>
                            <input type="text" class="form-control" name="text" value="{{ $review->content }}" id="text" placeholder="Текст отзыва">
                        </div>
                    </div>
            
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Сохранить изменения</button>
                    </div>
                </form>

            </div>
            
        </div>
    </div>

  </div>
  
@endsection