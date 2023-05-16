@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Отзывы</h1>
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

    <div class="container-fluid">
      <div class="col-12">
        @include('admin.alert')
      </div>
    </div>

    <div class="content">
    <div class="container-fluid">
      @if(!$reviews->isEmpty())
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Все отзывы</h3>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Текст отзыва</th>
                    <th>Дата создания</th>
                    <th>Рейтинг</th>
                    <th>Управление</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($reviews as $review)
                  <tr>
                    <td data-td="id">{{ $review->id }}</td>
                    <td style="max-width:150px; overflow:hidden" data-td="title">{{ $review->content }}</td>
                    <td>{{ $review->created_at }}</td>
                    <td>{{ $review->rating }}</td>
                    <td class="d-flex justify-content-start">
                      <a href="{{ route('admin.review.edit', $review->id) }}" class="btn btn-primary btn-category-edit mr-2">
                        Редактирование
                        <i class="fa-solid fa-pen"></i>
                      </a>
                      <form class="d-inline-block" method="post" action="{{ route('admin.review.destroy', $review->id) }}">
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
            <a href="{{ route('admin.review.create') }}" class="btn-block btn btn-success">Добавить отзыв</a>
          </div>
        </div>
    </div>
    </div>

  </div>
@endsection