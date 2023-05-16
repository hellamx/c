@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование заголовка отзывов</h1>
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
            
                <form method="post" action="{{ route('admin.title.update') }}">
                    @csrf
                    <input type="hidden" name="id" value="1">
                    <div class="card-body pb-0">
                        <div class="form-group">
                            <label for="text">Текст заголовка</label>
                            <input type="text" class="form-control" value="{{ $text }}" name="title" id="text" placeholder="Текст заголовка" />
                        </div>
                    </div>
            
                    <div class="card-footer pt-0">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>

            </div>
            
        </div>
    </div>

  </div>
  
@endsection