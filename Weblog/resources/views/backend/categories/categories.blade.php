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
   <div class="row">
      <div class="col m-3">
         <h4 class="pb-0 text-center">Add a item to your Category list...</h4>
         <hr class="pt-0 mt-0">
      </div>
   </div>
   <!-- add categories to database  -->
   <form method="POST" action="{{ route('cat.store') }}" accept-charset="UTF-8">
      @csrf
      @method('POST')
			<div class="row w-50 m-auto">
         <div class="col">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" >
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
         </div>
         <div class="row p-3">
            <div class="col text-center">
               <button class="btn text-light btn-primary" type="submit" value="Submit">Submit</button>
            </div>
         </div>
      </div>
   </form>
   </div>
   <!-- product from database -->
   <div class="row row-cols-4 mt-3 mb-3">
      @foreach ($category as $key)
      <div class="d-grid gap-1">
         <div class="p-2 border mb-3">
            <div class="col text-center">
               <a class="h6 p-3" href="{{ route('category.show', ['id' => $key->id] ) }}">{{$key->name}}</a>
               <hr>
            </div>
            <div class="row">
               <div class="col">
                  <a class="mr-3 float-end" data-bs-toggle="tooltip" title="Edit the category!">
                     <button class="btn btn-link border" data-bs-toggle="modal" data-bs-target="#edit_category_{{$key->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                           <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                           <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                     </button>
                  </a>
               </div>
               <div class="col">
                  <a class="mr-3 float-start" data-bs-toggle="tooltip" title="Delete the category!">
                     <form method="POST" action="{{ route('cat.destroy', ['cat' => $key->id] ) }}">
                        @csrf
                        @method('DELETE')
												<input type="hidden" name="id" value="{{ $key->id }}">
												<button type="submit" class="btn btn-link border">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                           </svg>
                        </button>
                     </form>
                  </a>
               </div>
            </div>
         </div>
      </div>
      @endforeach
   </div>
   @foreach ($category as $key)
   <!-- For editing products -->
   <div class="modal fade close" id="edit_category_{{$key->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <form method="POST" action="{{ route('cat.update', ['cat' => $key->id])}}">
         @csrf
         @method('PUT')
         <div class="modal-dialog modal-lg" role="document">
					 <input type="hidden" name="id" value="{{ $key->id }}">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title">Edit the categories...</h6>
                  <button data-tooltip="Dismiss changes" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col">
                        <label>Category</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$key->name}}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn text-light btn-primary">Save changes</button>
               </div>
            </div>
         </div>
      </form>
   </div>
   @endforeach
   <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
         {{ $category->links() }}
      </ul>
   </nav>
</main>
@include('frontend.basics.footer')
