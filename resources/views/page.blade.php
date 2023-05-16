@extends('layouts.main')

@section('content')
<section class="main__show">
    @if($page->content)
    <p>{{ $page->content }}</p>
    @else
    <p>Контент не заполнен</p>
    @endif
</section>
<section class="main__presentation">
    <h1 class="main__presentation--title">{{ $presentTitle }}</h1>
    <div class="main__slider">
        @if($mainImage->image)
            <img class="main__slider--bg" src="{{ route('main') }}/public/images/{{ $mainImage->image }}" width="500" alt="Презентация">
        @else
            <img class="main__slider--bg" src="{{ route('main') }}/public/images/fruits.png" alt="Презентация">
        @endif
        <div class="main__slider--wrapper">
            @foreach($presentation as $item)
            <div class="main__slider--item">
                <img src="{{ route('main') }}/public/icons/{{ $item->icon }}" alt="icon">
                <p>{{ $item->content }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection