<style media="screen">
.hallo{
  min-width: 115px !important;
}
</style>

<div class="row mt-5">
  <div class="col">
    <div class="text-center text-sm-left mb-2 mb-sm-0">
      <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><u>{{ Auth::user()->name }}</u></h4>
      <p class="mb-3">{{ Auth::user()->email }}</p>
      <p>
        <small class="text-capitalize">{{ Auth::user()->account }}</small>
          @if (Auth::user()->premium)
          <button type="button" class="btn btn-success btn-sm text-light btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"  data-bs-toggle="tooltip" data-bs-placement="right" title="Unsubscribe" >
              Premium
            </button>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-exclamation-octagon" viewBox="0 0 16 16">
                  <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                  <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
                <h5>Are you sure?</h5>

                  <div class="row m-3">
                    <div class="col">
                      <button type="button" class="btn btn-sm hallo float-end btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                    <div class="col">
                      <form action="{{ route('user.unsubscribe') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="unsubscribe" value="0">
                        <button type="submit" class="btn btn-danger hallo float-start btn-sm text-light m-0"role="button">Unsubscribe </button>
                      </form>
                    </div>
                  </div>

            </div>
            </div>
          </div>
            </div>
          @else
            <a class="btn btn-primary  btn-sm text-light" href="{{ route('user.premium') }}" role="button">get premium</a>
          @endif
      </p>
    </div>
    <hr class="m-1">
    <div class="row mb-5">
      <div class="col text-center">
        @if (Auth::user()->account == 'author')
          <a class="p-2 link-secondary" href="/dashboard">Profile</a>
          <a class="p-2 link-secondary" href="/dashboard/post">Add/Edit Posts</a>
          <a class="p-2 link-secondary" href="/dashboard/cat">Add/Edit Categories</a>
        @endif
    </div>
   </div>
  </div>
</div>
