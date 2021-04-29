<style media="screen">
.flaot-end {
  -webkit-transform: rotate(-90deg);
  -moz-transform: rotate(-90deg);
  -ms-transform: rotate(-90deg);
  -o-transform: rotate(-90deg);
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
  position:relative;
  top:75px;
  left:-60px;
  text-transform: uppercase;
  font-size: 26px;
  font-weight: bold;
}
</style>




<div class="container">
  <div class="row mb-5">
    <div class="coment-bottom w-50 float-start">
      <hr>




    @auth
     <form action="{{ route('comment.store') }}" method="POST">
        @csrf
        @method('POST')

        <input name="post_id" value="{{ $post->id }}" hidden>
        <input name="user_id" value="{{ Auth::user()->id }}" hidden>

        <div class="row">
           <div class="col-11">
              <div class="mb-1">
                 <label for="floatingInput">Title</label>
                 <input name="title" type="title" class="form-control" id="floatingInput" placeholder="Title" >
              </div>
              <div class="mb-1">
                 <label for="floatingTextarea2">Comment</label>
                 <textarea name="body" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
              </div>
           </div>
           <div class="col-1">
              <button class="btn btn-primary text-light flaot-end" type="submit">Comment</button>
           </div>
        </div>
     </form>
@endauth


@guest
<p>
  login to comment on this post
</p>

@endguest



<div class="row">
@foreach ($comment as $key)
<div class="commented-section mt-3 mb-5">
   <div class="row">
      <div class="col">
         <h5 class="">{{$key->title}}</h5>
       </div>
         <div class="col">
         <small class="float-end">{{$key->created_at}}</small>
       </div>
       @if (Auth::user()->id ==  $key->user_id )

         <div class="col">
           <a class="mr-3 float-end" data-bs-toggle="tooltip" title="Delete the comment">
             <form method="POST" action="{{ route('comment.destroy') }}">
               @csrf
               @method('DELETE')
               <input name="id" value="{{ $key->id }}" hidden>

               <button type="submit">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                   <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                   <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                 </svg>
               </button>
             </form>
           </a>
      </div>
      @endif
      <hr class="">

   </div>
   <div class="comment-text-sm">
      <span>{{ $key->body }}</span>
   </div>
</div>
@endforeach
</div>


</div>
</div>
</div>
