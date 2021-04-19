<style media="screen">
.container .col-md-6 .col-auto img{
min-height:100%;
}
body .container > .text-white{
	background-size:cover;
  background-repeat:no-repeat;
}
</style>
@foreach ($featured_1 as $key)
  <div class="p-4 p-md-5 mb-4 text-white rounded" style="background-image: url('{{$key->media_path}}');">
    <div class="col-md-6 px-0" >
      <h1 class="display-4 fst-italic">{{$key->title}}</h1>
      <p class="lead my-3">{{$key->slug}}</p>
      <p class="lead mb-0"><a href="/post/{{$key->id}}" class="text-white fw-bold">Continue reading...</a></p>
    </div>
  </div>
  @endforeach
  @foreach ($featured_2 as $key)
  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <h3 class="mb-0">{{$key->title}}</h3>
          <div class="mb-1 text-muted">{{ $key->created_at }} by {{$key->user_id}}</div>
          <p class="card-text mb-auto">{{$key->slug}}</p>
          <a href="/post/{{$key->id}}" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img min-height="100%" class="bd-placeholder-img" src="{{$key->media_path}} " alt="{{$key->media_name}}" width="200">
        </div>
      </div>
    </div>
    @endforeach
  @foreach ($featured_3 as $key)
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <h3 class="mb-0">{{$key->title}}</h3>
          <div class="mb-1 text-muted">{{ $key->created_at }}</div>
          <p class="mb-auto">{{$key->slug}}</p>
          <a href="/post/{{$key->id}}" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img class="bd-placeholder-img" src="{{$key->media_path}} " alt="{{$key->media_name}}" width="200">
        </div>
      </div>
    </div>
  </div>
  @endforeach
