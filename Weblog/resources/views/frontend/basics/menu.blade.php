
  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      @foreach ($menu as $key)
        <a class="p-2 link-secondary" href="{{ route('category.show', ['id' => $key->id] ) }}">{{ $key->name }}</a>
      @endforeach
    </nav>
  </div>
