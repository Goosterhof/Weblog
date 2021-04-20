@foreach ($post as $key)
<div class="modal fade close" id="edit_post_{{ 'post', $key->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<form method="POST" action="{{ route('post.update', ['post' => $key->id] )}}" accept-charset="UTF-8" enctype="multipart/form-data" class="needs-validation">
@csrf
@method('PATCH')
<input type="text" name="user_id" value="{{ Auth::id() }}" hidden>
<input type="text" name="post_id" value="{{ $key->id }}" hidden>

<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
   <div class="modal-header">
      <h6 class="modal-title">Edit the post...</h6>
      <button data-tooltip="Dismiss changes" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
      <div class="row">
         <div class="col">
            <label>Post name</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$key->title}}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
         </div>
         <div class="arrow col">
            <label>Slug</label>
            <input type="text" class="currency form-control @error('slug') is-invalid @enderror" name="slug" value="{{$key->slug}}">
            @error('slug')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
         </div>
         <div class="col col-quan">
           <label>Category</label>
             <select class="form-select" multiple aria-label="multiple select example" name="categories[]" multiple>
               @foreach($category as $cat)
                @if ($category)
                <option value="{{$cat->id}}" {{ in_array($cat->id, $posts) ? ' selected' : '' }} >
                  {{$cat->name}}
                </option>
               @endif
               @endforeach
           </select>
         </div>
      </div>
      <div class="row">
         <div class="col pb-2 pt-1">
            <label class="p-0">Post body</label>
            <textarea rows="8" height="500px" class="form-control @error('body') is-invalid @enderror" name="body" >{{$key->body}}</textarea>
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
                <input type="file" class="form-control" name="image_update" value="{{ asset( 'images/' . $key->media_path ) }}">
             </div>
             @error('image_update')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
          </div>
          <h4>Current Image</h4>
          <img width="50%" class="m-auto" src="{{ asset( 'images/' . $key->media_path ) }}" alt="">
        </div>
      </div>
   <div class="modal-footer">
     <div class="col">
       <input type="hidden" name="is_premium" value="0" {{  ($key->is_premium == 0 ? ' checked' : '') }} >
       <input type="checkbox" name="is_premium" value="1" {{  ($key->is_premium == 1 ? ' checked' : '') }}>
       <label>Premium content</label>
     </div>
      <button type="submit" class="btn btn-primary text-light">Save changes</button>
   </div>
</div>
</div>
</form>
</div>
@endforeach
