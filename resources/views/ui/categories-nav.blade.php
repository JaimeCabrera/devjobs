@foreach ($categories as $category)
    <a class="nav-link nav-categories" href="{{ route('categories.show',$category) }}">
        {{$category->name}}
    </a>
@endforeach
