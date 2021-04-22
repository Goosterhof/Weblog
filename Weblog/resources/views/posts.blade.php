@include('frontend.basics.head')
<main class="container">
@include('frontend.basics.header')
@include('frontend.basics.menu')
<div class="row">
  <div class="col">
    <h3 class="p-1 fst-italic">All News</h3>
  </div>
  <div class="col">
    <a class="btn float-end border rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/>
      </svg>
    </a>
  </div>
</div>
<div class="row">
  <div class="col">
    @include('frontend.posts.filter')
  </div>
</div>
@if (Request::has('term'))
<div class="row w-75 m-auto border p-3 mb-4">
  <div class="col">
    <h5>Search Results for {{request::get('term')}} </h5>
    <hr>
      @forelse ($search as $key)
      <article class="pb-5">
        <div class="row">
          <div class="col">
            <h6 class="m-0"><strong>{{$key->title}}</strong></h6>
            </div>



            <div class="col text-end">
              <div class="mb-1 text-muted"> {{ $key->created_at }} by {{$key->user->name}}
                <span>
                @if ($key->is_premium == 1)
                  <div class="badge bg-success float-end text-wrap" style="width: 6rem;">
                    premium
                  </div>

                @else
                  <div class="badge text-danger float-end text-wrap" >
                    <p>basic</p>
                  </div>
                @endif
              </span>
              </div>
            </div>
            <hr>

        <p class="m-0"><small>{{ substr(strip_tags($key->body), 0, 150) }}</small></p>
        <a class="small" href="/post/{{$key->id}}">Read more...</a>
      </article>
        @empty
          <p>No posts found in this search.</p>
      @endforelse
  </div>
</div>
@endif






@if (Request::has('cat'))
<div class="row w-75 m-auto border p-3 mb-4">
  <div class="col">
    <h4>Results for {{ $cat_name->name }} </h4>
    <hr>
      @forelse ($cat as $key)
      <article class="pb-5">
        <div class="row">
          <div class="col">
            <h6 class="m-0"><strong>{{$key->title}}</strong></h6>
            </div>
            <div class="col text-end">
              <div class="mb-1 text-muted"> {{ $key->created_at }} by {{$key->user->name}}
                <span>
                @if ($key->is_premium == 1)
                  <div class="badge bg-success float-end text-wrap" style="width: 6rem;">
                    premium
                  </div>

                @else
                  <div class="badge text-danger float-end text-wrap" >
                    <p>basic</p>
                  </div>
                @endif
              </span>
              </div>
            </div>
            <hr>
        </div>

        <p class="m-0"><small>{{ substr(strip_tags($key->body), 0, 150) }}</small></p>
        <a class="small" href="/post/{{$key->id}}">Read more...</a>
      </article>
        @empty
          <p>No posts found in this search.</p>
      @endforelse
  </div>
</div>
@endif

  @foreach ($premium as $key)
    <article class="blog-post">
      <div class="row">
       <div class="col-10">
        <h2 class="blog-post-title">{{$key->title}}</h2>
      </div>
      <div class="col-2">
        @if ($key->is_premium == 1)
        <div class="badge bg-success float-end text-wrap" style="width: 6rem;">
          premium
        </div>

        @else
        <div class="badge text-danger float-end text-wrap" >
        <p>basic</p>
      </div>
        @endif
      </div>
      <div class="mb-1 text-muted">{{ $key->created_at }} by  {{$key->user->name}}</div>
    </div>
    <p class="pb-3">{{ substr(strip_tags($key->body), 0, 750) }}</p>
    <a class="text-primary" href="/post/{{$key->id}}">Read more...</a>
    </article><!-- /.blog-post -->
    <hr>
  @endforeach

@foreach ($post as $key)
    <article class="blog-post">
      <div class="row">
       <div class="col-10">
        <h2 class="blog-post-title">{{$key->title}}</h2>
      </div>
      <div class="col-2">
        @if ($key->is_premium == 1)
        <div class="badge bg-success float-end text-wrap" style="width: 6rem;">
          premium
        </div>

        @else
        <div class="badge text-danger float-end text-wrap" >
        <p>basic</p>
      </div>
        @endif
      </div>
      <div class="mb-1 text-muted">{{ $key->created_at }} by  {{$key->user->name}}</div>
    </div>
    <p class="pb-3">{{ substr(strip_tags($key->body), 0, 750) }}</p>
    <a class="text-primary" href="/post/{{$key->id}}">Read more...</a>
    </article><!-- /.blog-post -->
    <hr>
@endforeach




<nav class="blog-pagination" aria-label="Pagination">{{ $post->links() }}</nav>



</main>

@include('frontend.basics.footer')
