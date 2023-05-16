@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Страницы и главное меню</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
          </div>
        </div>

        <!-- Изображение -->
        <div class="container-fluid">
            <img style="width:100%; height:150px;object-fit:cover" src="{{ route('main') }}/public/images/menu-edit.png" alt="Button">
        </div>
    </div>

    <div class="container-fluid">
      <div class="col-12">
        @include('admin.alert')
      </div>
    </div>

    <div class="content">
    <div class="container-fluid">
      @if(!$pages->isEmpty())
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Все страницы</h3>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Текст ссылки</th>
                    <th>URL</th>
                    <th>Дата создания</th>
                    <th>Последнее изменение</th>
                    <th>Управление</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pages as $page)
                  <tr>
                    <td data-td="id">{{ $page->id }}</td>
                    @if($page->status)
                    <td data-td="title"><a href="{{ route('main') }}/pages/{{ $page->url }}" target="_blank">{{ $page->title }}</a></td>
                    @else
                    <td data-td="title">{{ $page->title }} (Неактивна)</td>
                    @endif
                    <td>{{ $page->url }}</td>
                    <td>{{ $page->created_at }}</td>
                    <td>{{ $page->updated_at }}</td>
                    <td class="d-flex justify-content-start">
                      <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-primary btn-category-edit mr-2">
                        Управление и редактирование
                        <i class="fa-solid fa-pen"></i>
                      </a>
                      <form class="d-inline-block" method="post" action="{{ route('admin.pages.destroy', $page->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                          Удалить
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </form>
                    </td>
                   
                  </tr>
                
                  @endforeach
                </tbody>
              </table>
            </div>
      
          </div>
          
          </div>
        </div>
        @else
        <div class="row">
          <div class="col-12">
            <div class="card text-center text-lg">
              <p class="pt-3">Страницы не созданы</p>
          </div>
          </div>
        </div>
        @endif

        <div class="row">
          <div class="col-12">
            <a href="{{ route('admin.pages.create') }}" class="btn-block btn btn-success">Добавить страницу</a>
          </div>
        </div>
    </div>
    </div>
    

    <div class="content">
        <div class="row mb-2">
            <div class="col">
                <h3 style="color:#000" class=" m-0 ml-2 mt-5 mb-2">Кнопка навигации</h3>
            </div>
        </div>
        
        <!-- Изображение -->
        <div class="container-fluid">
            <img  style="width:100%; height:150px;object-fit:cover" src="{{ route('main') }}/public/images/button-edit.png" alt="Button">
        </div>

    </div>
    <div class="mt-3 content">
        <div class="container-fluid">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Управление кнопкой</h3>
                </div>
            
                <form method="post" action="{{ route('admin.updateSidebar') }}">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="text">Текст кнопки</label>
                            <input type="text" value="{{ $sidebar->title }}" name="title" class="form-control" id="text" placeholder="Текст кнопки" />
                        </div>
                        <div class="form-group">
                            <label>URL</label>
                            <select name="url" class="custom-select">
                                @foreach($pages as $page)
                                <option value="{{ $page->url }}">{{ route('main') }}/pages/{{ $page->url }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Применить изменения</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>

  </div>
@endsection