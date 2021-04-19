@include('frontend.basics.head')
<main class="container">
@include('frontend.basics.header')
@include('frontend.basics.menu')

<div class="container-fluid">
<div class="row md-2 pb-5 mt-5">
  <div class="col border-bottom">
    <h6>Category:</h6>
    <h4 class="mb-1">{{ $category->name }}</h4>
  </div>
</div>
<div class="row">
  <div class="col">
    @forelse ($category_post as $key)
    <article class="blog-post">
      <h2 class="blog-post-title">{{$key->title}}</h2>
      <p class="blog-post-meta">{{ $key->created_at }} by
      <p class="pb-3">{{ substr(strip_tags($key->body), 0, 750) }}</p>
      <a class="text-primary" href="/post/{{$key->id}}">Read more...</a>
    </article><!-- /.blog-post -->
    <hr>
    @empty
      <p>No posts found in this category.</p>
    @endforelse
  </div>
</div>
</div>
</div>
@include('frontend.basics.footer')
</main>
