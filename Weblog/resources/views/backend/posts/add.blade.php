<form method="POST" class="mb-5 border-bottom" action="{{ route('post.store') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="needs-validation">
   @csrf
   @method('POST')
   <input type="text" name="user_id" value="{{ Auth::id() }}" hidden>
   <div class="row">
      <div class="col">
         <label>Post title</label>
         <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Name" value="{{ old('title') }}">
         @error('title')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="col">
         <label>Post slug</label>
         <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" placeholder="Slug" value="{{ old('slug') }}" >
         @error('slug')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="col">
      <label>Category</label>
        <select class="form-select" aria-label="multiple select example" name="categories[]" multiple>
        @foreach ($category as $cat)
          <option value="{{ $cat->id }}" {{in_array($cat->id, old("categories") ?: []) ? "selected": ""}} >{{ $cat->name }}</option>
        @endforeach
      </select>
    </div>
 </div>
   <div class="row">
      <div class="col">
         <label class="p-0">Post Body</label>
         <textarea rows="8" class="form-control @error('body') is-invalid @enderror" name="body" placeholder="Enter a description" >{{ old('body') }}</textarea>
         @error('body')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
   </div>
   <div class="row mt-2 mb-2">
      <div class="col">
         <div class="input-group mb-3">
            <input type="file" class="form-control" name="image">
         </div>
         @error('image')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="col">
        <input type="hidden" name="is_premium" value="0" {{ old('is_premium') == '0' ? 'checked' : '' }}>
        <input type="checkbox" name="is_premium" value="1" {{ old('is_premium') == '1' ? 'checked' : '' }}>
        <label>Premium content</label>
      </div>
      <div class="col text-end">
         <button class="btn btn-primary text-light submitit" type="submit" value="Submit">Submit</button>
      </div>
   </div>
</form>
