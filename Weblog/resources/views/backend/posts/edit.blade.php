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
   @if ($errors->any())
   @foreach ($errors->all() as $error)
   <div class="alert alert-danger" role="alert">
      <p class="m-0">{{ $error }}</p>
   </div>
   @endforeach
   @endif
   <div class="row w-75 m-auto">
     <div class="col mb-5 mt-5 ">
      <form method="POST" action="{{ route('post.update', $post->id)}}" accept-charset="UTF-8" enctype="multipart/form-data" class="needs-validation">
        @csrf
        @method('PATCH')
        <input type="text" name="user_id" value="{{ Auth::id() }}" hidden>
        <input type="text" name="post_id" value="{{ $post->id }}" hidden>
        <div class="row">
          <div class="col">
            <h4 class="modal-title">Edit the post...</h4>
          </div>
          <div class="col">
            <a class="btn float-end btn-primary btn-sm text-light" href="{{route('post.post')}}" role="button">Go back</a>
          </div>
          <hr>
        </div>
        <div class="row">
           <div class="col">
              <label>Post name</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$post->title}}">
              @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
           </div>
           <div class="arrow col">
              <label>Slug</label>
              <input type="text" class="currency form-control @error('slug') is-invalid @enderror" name="slug" value="{{$post->slug}}">
              @error('slug')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
           </div>
           <div class="col col-quan">
             <label>Category</label>
               <select class="form-select" multiple aria-label="multiple select example" name="categories[]" multiple>
                  @foreach ($category as $cat)
                      <option value="{{$cat->id}}"  {{ in_array($cat->id, $postcat) ? ' selected' : '' }}>
                        {{$cat->name}}
                      </option>
                  @endforeach
             </select>
           </div>
        </div>
        <div class="row">
           <div class="col pb-2 pt-1">
              <label class="p-0">Post body</label>
              <textarea rows="12" class="form-control @error('body') is-invalid @enderror" name="body" >{{$post->body}}</textarea>
              @error('body')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
           </div>
        </div>
        <p>
        <button class="btn btn-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Change Image
        </button>
      </p>
        <div class="collapse" id="collapseExample">
          <div class="card card-body">
            <div class="col">
               <div class="input-group mb-3">
                  <input type="file" class="form-control" name="image_update" value="{{ asset( 'images/' . $post->media_path ) }}">
               </div>
               @error('image_update')
               <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div>
            <h4>Current Image</h4>
            <img src="{{ asset( 'images/' . $post->media_path ) }}" alt="">
          </div>
        </div>
     <div class="modal-footer">
     <div class="col">
       <input type="hidden" name="is_premium" value="0" {{  ($post->is_premium == 0 ? ' checked' : '') }} >
       <input type="checkbox" name="is_premium" value="1" {{  ($post->is_premium == 1 ? ' checked' : '') }}>
       <label>Premium content</label>
     </div>
      <button type="submit" class="btn btn-primary text-light">Save changes</button>
   </div>
 </div>
</div>
</form>
</div>
</div>
@include('frontend.basics.footer')
</main>
