<form action="{{ route('user.account.update') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PATCH')
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label class="h6 small">Full Name</label>
            <input class="form-control" type="text" name="name" placeholder="{{ Auth::user()->name }}" value="{{ Auth::user()->name }}">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label class="h6 small">Email</label>
            <input class="form-control" type="text" name="email" placeholder="{{ Auth::user()->email }}" value="{{ Auth::user()->email }}">
          </div>
        </div>
      </div>



  <div class="row">
    <div class="col">
      <div class="form-group">
        <label class="h6 small">Bio</label>
        <textarea rows="8" class="form-control" name="bio">{{ Auth::user()->bio }}</textarea>
      </div>
    </div>
  </div>

    <div class="col">
      <hr>
      <div class="mb-2"><b>Keeping in Touch</b></div>
      <div class="row">
        <div class="col">
          <label>Email Notifications</label>
          <div class="custom-controls-stacked">
            <div class="custom-control custom-checkbox mt-3">
              <div class="form-check form-check-inline">
                <input type="hidden" name="newsletter" value="0" {{  ( Auth::user()->newsletter == 0 ? ' checked' : '') }}>
                <input type="checkbox" name="newsletter" value="1"  {{  ( Auth::user()->newsletter == 1 ? ' checked' : '') }}>
                <label class="custom-control-label" for="notifications-news">Newsletter</label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
    </div>



<button class="btn btn-primary text-light" type="submit">Save Changes</button>


</form>
