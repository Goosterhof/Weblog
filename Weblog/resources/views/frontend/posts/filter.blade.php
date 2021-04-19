<div class="collapse show  m-auto p-3 mb-3 border rounded" id="collapseExample">
   <div class="panel panel-default">
      <div class="panel-body">
         <div class="row">


           <div class="col-6">
             <form action="{{ route('post.index') }}" method="GET" role="search">
                <div class="input-group">
                   <input type="text" class="form-control @error('search') is-invalid @enderror mr-2" name="term" placeholder="Search projects" id="term" required>
                   @error('search')
                   <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
                   <button class="btn btn-info text-light" type="submit" title="Search projects" id="search">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                         <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                      </svg>
                   </button>
                </div>
             </form>
           </div>

           <div class="col float-end">
            <form action="{{ route('post.index') }}" method="GET" role="category">
               <div class="col">
                  <select class="form-select" aria-label="select" onchange="this.options [this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                     <option selected class="bottom-border">Select a category</option>
                     <hr>
                     @foreach($category as $cat)
                     <option value="/post?cat={{ $cat->id }}">
                        {{ $cat->name }}
                     </option>
                     @endforeach
                  </select>
               </div>
            </form>
          </div>


            <div class="col float-end">
              <form action="{{ route('post.index') }}" method="GET" role="time">
                 <div class="col">
                    <select class="form-select" aria-label="select" onchange="this.options [this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                      <option value="">Choose</option>
                      <option value="/post?order=DESC">Descending</option>
                       <option value="/post?order=ASC">Ascending</option>
                    </select>
                 </div>
              </form>
            </div>
            <div class="col-1 float-end p-2" style="width:50px;">
              <a class="float-end" href="{{ route('post.index') }}">
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

<script type="text/javascript">
export default {

    data(){
        return {
          newPost: ''
        }
    },
    methods: {
        addNewPost(){

            axios.post('/post',{title: this.newPost, user_id:userId})
            .then((response)=>{

            $('#success').html(response.data.message)

            })
        }
    }
}
</script>
