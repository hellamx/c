@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 fs-4">Управление изображением презентации</h4>
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
        <div class="col-md-12">
            @include('admin.alert')
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-dark">
                <div class="card-header">
                    <h5 class="mb-0">Текущее изображение</h5>
                </div>

                <img src="{{ route('main') }}/public/images/{{ $currentImage->image }}" width="500" alt="Presentation image">
                
                <div class="card-header">
                    <h5 class="mb-0">Загрузить новое изображение</h5>
                </div>
                
                <form enctype="multipart/form-data" method="post" action="{{ route('admin.presentationImage.upload') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFile" />
                                <label class="custom-file-label" for="customFile">Выбрать изображение</label>
                                <div class="form-text text-secondary">
                                    Рекомендуемое соотношение 3:2
                                </div>
                                <div class="form-text text-secondary mt-0">
                                    Размер не более 2МБ
                                </div>
                                <div class="form-text text-secondary mt-0">
                                    Прозрачный фон
                                </div>
                            </div>
                        </div>                        
                    </div>
            
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Загрузить</button>
                    </div>
                </form>

            </div>
            
        </div>
    </div>

  </div>
  
@endsection