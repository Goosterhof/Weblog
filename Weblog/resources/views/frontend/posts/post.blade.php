@include('frontend.basics.head')
<main class="container">
@include('frontend.basics.header')
@include('frontend.basics.menu')

@if (\Session::has('success'))
<div class="row mt-5 mb-5">
   <div class="col p-0 m-0">
      <div class="alert alert-success" role="alert">
         <p class="m-0">{!! \Session::get('success') !!}</p>
      </div>
   </div>
</div>
@endif


<div class="container-fluid">
<div class="row md-2 pb-5 ">
  <div class="p-5 p-md-5 text-white rounded" style='background-image: url( "{{ asset( 'images/' . $post->media_path ) }}"  ) '>
  </div>
    <div class="col-md-8">
    <h4 class="display-6 mt-3">{{$post->title}}</h4>
    @foreach ($user as $key)
    <div class="mb-1 text-muted">{{ $post->created_at }} by {{$key->name}}</div>
    @endforeach
    <div class="col pt-3">
      <p>{{$post->body}}</p>
    </div>
  </div>
  <div class="col-md-4">
    @include('frontend.posts.sidebar')
  </div>
</div>
@include('frontend.comments.comments')
</div>
</div>
@include('frontend.basics.footer')
</main>
