<h3 class="pb-4 mb-4 fst-italic border-bottom">
  Latest News
</h3>
@foreach ($post as $key)
  <article class="blog-post">
    <h2 class="blog-post-title">{{$key->title}}</h2>
    <p class="blog-post-meta">{{ $key->created_at }} by <a href="#">{{ $key->author_id }}</a></p>
    <p>{!!  substr(strip_tags($key->body), 0, 350) !!}</p>
    <p class="-0"><a href="/post/{{$key->id}}" class="fw-bold">Continue reading...</a></p>
  </article><!-- /.blog-post -->
@endforeach
{{ $post->links() }}
