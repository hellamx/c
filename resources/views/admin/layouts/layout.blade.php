<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>{{ $title }}</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/public/assets/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/public/assets/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/public/assets/admin/style.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.index') }}" class="nav-link">Главная</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.pages.index') }}" class="nav-link">Управление меню и страницами</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.presentation.index') }}" class="nav-link">Управление презентацией</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.review.index') }}" class="nav-link">Управление отзывами</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.list.index') }}" class="nav-link">Управление списком</a>
                </li>
            </ul>

        </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="{{ route('admin.index') }}" class="text-center brand-link">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                <span class="text-white ml-1 d-block">{{ Auth::user()->username }}</span>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li data-page="main" class="nav-item d-none d-sm-inline-block">
                        <a style="font-size:18px" href="{{ route('admin.index') }}" class="nav-link">
                            Главная
                        </a>
                    </li>
                    <li data-page="articles" class="nav-item menu-close">
                        <a style="font-size:18px" href="#" class="nav-link">
                            <p>Меню<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.pages.index') }}" class="nav-link">
                                    <i class="far fa-newspaper fa-sm mr-1"></i>
                                    <p>Страницы и меню</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.pages.create') }}" class="text-sm nav-link">
                                    <i class="fa-solid fa-plus fa-sm mr-1"></i>
                                    <p>Добавить страницу</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li data-page="gallery" class="nav-item menu-close">
                        <a style="font-size:18px" href="№" class="nav-link">
                            <p>Презентация<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.presentation.index') }}" class="nav-link">
                                    <i class="fa-solid fa-gear fa-sm mr-1"></i>
                                    <p>Элементы</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.presentation.image') }}" class="nav-link">
                                    <i class="far fa-image fa-sm mr-1"></i>
                                    <p>Изображение</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li data-page="gallery" class="nav-item menu-close">
                        <a style="font-size:18px" href="#" class="nav-link">
                            <p>Отзывы<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.review.index') }}" class="nav-link">
                                    <i class="fa-solid fa-bars fa-sm mr-1"></i>
                                    <p>Управление</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.review.create') }}" class="text-sm nav-link">
                                    <i class="fa-solid fa-plus fa-sm mr-1"></i>
                                    <p>Добавить отзыв</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li data-page="gallery" class="nav-item menu-close">
                        <a style="font-size:18px" href="#" class="nav-link">
                            <p>Заголовки<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.title.presentation') }}" class="nav-link">
                                    <i class="fa-solid fa-bars fa-sm mr-1"></i>
                                    <p>Презентация</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.title.reviews') }}" class="nav-link">
                                    <i class="fa-solid fa-bars fa-sm mr-1"></i>
                                    <p>Отзывы</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.title.list') }}" class="nav-link">
                                    <i class="fa-solid fa-bars fa-sm mr-1"></i>
                                    <p>Список</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li data-page="users" class="nav-item menu-close">
                        <a style="font-size:18px" href="#" class="nav-link">
                            <p>Список<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.list.index') }}" class="nav-link">
                                    <i class="fa-solid fa-users fa-sm mr-1"></i>
                                    <p>Управление</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

        </div>

    </aside>

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->

        <strong>Copyright &copy; {{ date('Y') }} <a class="ml-2" target="_blank" href="{{ env('APP_URL') }}">Перейти на сайт</a>.</strong>
    </footer>
    </div>

    <script src="/public/assets/admin/plugins/jquery/jquery.min.js"></script>
    <script src="/public/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/public/assets/admin/dist/js/adminlte.min.js"></script>
    <script src="/public/assets/admin/js/main.js"></script>
    <script src="https://kit.fontawesome.com/4c106cd837.js" crossorigin="anonymous"></script>
</body>
</html>