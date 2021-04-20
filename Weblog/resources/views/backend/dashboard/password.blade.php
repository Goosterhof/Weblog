<div class="row mt-3 mb-3">
  <div class="col">
    <form action="{{ route('user.pass.update') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="col">
        <h2 class="accordion-header border" id="flush-headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Change Password
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse border-none collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordion1">
          <div class="col m-1">
            <div class="form-group">
              <label class="h6 small">Current password</label>
              <input class="form-control" type="password" name="password" placeholder="••••••••••••">
            </div>
            <div class="form-group pt-3">
              <label class="h6 small">New password</label>
              <input class="form-control" type="password" name="new_password" placeholder="••••••••••••">
            </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm m-2 text-light">Save password</button>
          </div>
        </div>
    </form>
  </div>
</div>
