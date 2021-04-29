@include('frontend.basics.head')
<main class="container">
@include('frontend.basics.header')
@include('frontend.basics.menu')

<style media="screen">

.pb-5 .rounded {
  height:342px;
  background-position:50% 50%;
  background-size:cover;
  background-repeat:no-repeat;
  background-attachment:scroll;
}

</style>

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

<div class="container-fluid">
<div class="row md-2 pb-5 ">
  <div class="p-5 p-md-5 rounded" style='background-image: url( "{{ asset( 'images/' . $post->media_path ) }}"  );  '></div>
    <div class="col-md-8">
    <h4 class="display-6 mt-3">{{$post->title}}</h4>
    @foreach ($user as $key)
    <div class="mb-1 text-muted">{{ $post->created_at }} by {{$key->name}}</div>
    @endforeach
    <div class="col pt-3">
      <p style="white-space: pre-wrap;" >{!! $post->body !!}</p>
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
