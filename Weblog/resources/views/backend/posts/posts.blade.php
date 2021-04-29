@include('frontend.basics.head')
<main class="container">
   @include('frontend.basics.header')
   @include('frontend.basics.menu')
   @include('backend.dashboard.menu')
   @if (\Session::has('success'))
   <div class="row mt-5 mb-5">
      <div class="col p-0 m-0">
         <div class="alert alert-success" role="alert">
            <p class="m-0">{!! \Session::get('success') !!}</p>
         </div>
      </div>
   </div>
   @endif
   @if ($errors->any())
   @foreach ($errors->all() as $error)
   <div class="alert alert-danger" role="alert">
      <p class="m-0">{{ $error }}</p>
   </div>
   @endforeach
   @endif
   @include('backend.posts.add')
   @forelse ($post as $key)
   <article class="blog-post">
      <div class="row">
         <div class="col-md-6">
           <h2 class="blog-post-title">{{$key->title}}</h2>
         </div>
           <div class="col-md-1">
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
         <div class="col-md-1">
           <a href="{{ route('post.edit',  ['edit' => $key->id] )}}" class="btn btn-primary btn-sm text-light">Edit</a>
         </div>
         <div class="col-md-1">
           <form method="POST" action="{{ route('post.destroy', $key->id) }}">
             @csrf
             @method('DELETE')
             <input type="hidden" name="id" value="{{$key->id}}">
             <button type="submit" class="btn btn-link p-0">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                 <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                 <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
               </svg>
             </button>
           </form>
         </div>
      </div>
      <p class="blog-post-meta">{{ $key->created_at }} by <a href="#">{{ $user->name }}</a></p>
      <p>{!!  substr(strip_tags($key->body), 0, 950) !!}</p>
      <p class=""><a href="{{route('post.show', $key->id)}}" class="fw-bold">Continue reading...</a></p>
      <hr>
   </article>
   @empty
   <p>No posts yet...</p>

   @endforelse
   <nav class="blog-pagination" aria-label="Pagination">
      {{ $post->links() }}
   </nav>
</main>
@include('frontend.basics.footer')
