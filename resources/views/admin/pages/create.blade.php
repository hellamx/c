@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление страницы</h1>
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
            
                <form method="post" action="{{ route('admin.pages.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="text">Текст ссылки</label>
                            <input type="text" class="form-control" name="text" id="text" placeholder="Текст кнопки" />
                        </div>
                        <div class="form-group">
                            <label for="url">URL адрес</label>
                            <input type="text" class="form-control" name="url" id="url" placeholder="URL" />
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