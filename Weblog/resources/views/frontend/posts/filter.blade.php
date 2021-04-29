<div class="collapse show  m-auto p-3 mb-3 border rounded" id="collapseExample">
   <div class="panel panel-default">
      <div class="panel-body">
         <div class="row">
               <div class="col">
                  <select class="form-select category" aria-label="select">
                     <option selected class="bottom-border">Select a category</option>
                     @foreach($category as $cat)
                     <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                     @endforeach
                  </select>
               </div>
            <div class="col-1 float-end p-2" style="width:50px;">
              <a class="float-end" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove filter" href="{{ route('post.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-x-square" viewBox="0 0 26 26">
                  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
               </a>
            </div>
         </div>
      </div>
   </div>
</div>

 <div class="res"></div>
