<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('/') }}"><i class="menu-icon fa fa-laptop"></i>Главная </a>
                </li>
                <li class="menu-title">elements</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="№" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Пользователи</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-id-badge"></i><a href="{{route('admin.users.index')}}">Список пользователей</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{route('admin.users.create')}}">Создать пользователя</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="№" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Категории</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-id-badge"></i><a href="{{route('admin.category.index')}}">Список категорий</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{route('admin.category.create')}}">Создать категорию</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="№" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Продукты</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-id-badge"></i><a href="{{route('admin.products.index')}}">Список продуктов</a></li>
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{route('admin.products.create')}}">Создать продукт</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->