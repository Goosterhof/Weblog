<div class="row mt-5">
  <div class="col">
    <div class="text-center text-sm-left mb-2 mb-sm-0">
      <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><u>{{ Auth::user()->name }}</u></h4>
      <p class="mb-3">{{ Auth::user()->email }}</p>
      <p>
        <small>{{ Auth::user()->account }}</small>
          @if (Auth::user()->premium)
            <small class="bg-success text-white rounded p-1">Premium</small>
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
