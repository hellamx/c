@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">Управление контентом на странице</h1>
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
            
                <form method="post" action="{{ route('admin.pages.update', $page->id) }}">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Текст ссылки</label>
                            <input type="text" class="form-control" name="title" value="{{ $page->title }}" id="title" placeholder="Текст ссылки" />
                        </div>
                        <div class="form-group">
                            <label for="url">URL адрес</label>
                            <input type="text" class="form-control" name="url" value="{{ $page->url }}" id="url" placeholder="URL" />
                        </div>
                        <div class="form-group mb-0">
                            <label for="text">Текст на странице</label>
                            <input type="text" class="form-control" name="text" value="{{ $page->content }}" id="text" placeholder="Текст" />
                        </div>
                        <div class="form-group mt-2">
                            <label>Статус страницы</label>
                            <select name="status" class="custom-select">
                                @if ($page->status)
                                    <option selected disabled value="1">Активна</option>
                                @else
                                    <option selected disabled value="0">Не активна</option>
                                @endif
                                <option value="1">Активна</option>
                                <option value="0">Не активна</option>
                            </select>
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