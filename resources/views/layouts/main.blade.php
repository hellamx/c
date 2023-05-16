<!DOCTYPE html>
<html lang="ru">
	<head>
        <title>{{ $title }} | Product 24</title>
		<meta name='keywords' content='CompanyNotes'>
		<meta name='description' content='CompanyNotes'>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
   		<link rel="shortcut icon" href="/icons/favicon.ico" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,700&display=swap" rel="stylesheet">
    	<link rel="stylesheet" href="{{ route('main') }}/css/style.css">
    	<link rel="stylesheet" href="{{ route('main') }}/css/mobile.css">
	</head>
    <body>
        <div class="wrapper">
            <header class="header">
                <div class="header__logo">
                    <a href="{{ route('main') }}" class="header__logo--href">
                        Product 
                        <span class="header__logo--arrow">24</span>
                    </a>
                </div>
                <div class="header__menu">
                    <ul>
                        <li><a href="{{ route('main') }}">Главная</a></li>
                        @foreach ($pages as $page)
                            @if($page->status)
                                <li><a target="_blank" href="{{ route('main') }}/pages/{{ $page->url }}">{{ $page->title }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <nav class="header__nav">
                    @if($sidebar)
                    <a href="{{ route('main') }}/pages/{{ $sidebar->url }}" class="header__nav--btn">{{ $sidebar->title }}</a>
                    @endif
                </nav>
            </header>
            <main class="main">

                @yield('content')
                <section class="main__reviews">
                    <div class="main__reviews--review">
                        <h1 class="main__reviews--title">{{ $reviews }}</h1>
                        <div class="review__main">
                            <img src="{{ route('main') }}/images/human.png" alt="Human">
                            <div class="review__content">
                                <p>{{ $topReview->content }}
                                    <span class="review__author">{{ $topReview->author }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="review__other">
                            @foreach ($allReviews as $review)
                                <div class="review__other--item">
                                    <img width="127" height="127" style="width:127px;height:127;object-fit:cover" src="{{ route('main') }}/public/images/{{ $review->image }}" alt="Human">
                                    <p>{{ $review->content }}
                                    <span class="review__other--author">Jane Doe</span>
                                    </p>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="main__reviews--question">
                        <h1 class="main__reviews--title">{{ $list }}</h1>
                        <small>Porro ab rerum omnis magnam eligendi error nobis dolore?</small>
                        @foreach($lists as $list)
                            <div class="main__question--item">
                                <img src="{{ route('main') }}/icons/{{ $list->icon }}" alt="icon">
                                <div class="question__content">
                                    <span class="question__title">{{ $list->title }}</span>
                                    <span class="question__text">{{ $list->content }}</span>
                                </div>
                                <button class="question__arrow">
                                    <img src="{{ route('main') }}/icons/arrow.svg" alt="arrow">
                                </button>
                            </div>
                        @endforeach
                        
                    </div>
                </section>
			</main>   
        </div>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="{{ route('main') }}/js/main.js"></script>
    </body>
</html>