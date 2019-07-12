@foreach($categories as $category)
    @if($category->children()->count())
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{{ url("/layout/category/$category->id") }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ $category->title ?? '' }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @include('layouts._menu', ['categories'=>$category->children, 'is_child'=>true])
        </li>
    @else
        @isset($is_child)
            <a href="{{ url("/layout/category/$category->id") }}" class="dropdown-item">{{ $category->title ?? '' }}</a>
            @continue
        @endisset
            <li class="nav-item">
                <a class="nav-link" href="{{ url("/layout/category/$category->id") }}" class="dropdown-item">{{ $category->title ?? '' }}</a>
            </li>
    @endif
@endforeach



<li class="nav-item active">
    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
</li>