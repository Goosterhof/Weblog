@include('frontend.basics.head')
<main class="container">
@include('frontend.basics.header')
@include('frontend.basics.menu')
<div id="app">
   <div class="container">
      <div class="col">
         <!-- Authentication Links -->
         @guest
         @if (Route::is('login'))
         <h4>login</h4>
         <hr>
         @endif
         @if (Route::is('register'))
         <h4>Register</h4>
         <hr>
         @endif
         @else
         @auth
      </div>
      @if (\Session::has('success'))
       <div class="alert alert-success" role="alert">
          <p class="m-0">{!! \Session::get('success') !!}</p>
       </div>
      @endif

      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
         <p class="m-0">{{ $error }}</p>
      </div>
      @endforeach
      @endif

        <div class="container">
        <div class="row flex-lg-nowrap">
          <div class="col">
            <div class="e-profile">
              @include('backend.dashboard.menu')
              <div class="tab-content pt-3 w-75 m-auto">
                <h4>Change Your profile</h4>
                <div class="tab-pane active">
                  @include('backend.dashboard.profile')
              <div class="row">
                <div class="col">
                      <div class="accordion accordion-flush pt-3 pb-3" id="accordion2">
                        <div class="accordion-item">
                          @include('backend.dashboard.password')
                        </div>
                      </div>
                    </div>
                  </div>
                  <small>
                    <p class="text-muted p-2"><a ref="#">Delete account</a></p>
                  </small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endauth
@endguest
<main class="py-4">
 @yield('content')
</main>
</diV>
</diV>
</diV>

@include('frontend.basics.footer')
</main>
