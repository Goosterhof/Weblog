<style media="screen">
   .logout:hover{
   color: red;
   }
</style>
<header class="blog-header py-3">
   <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 d-flex justify-content-start align-items-center">
         <div class="nav-item dropend">
            <a class="nav-link hover border rounded p-3" href="#" id="Dropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                  <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
               </svg>
            </a>
            <ul class="dropdown-menu" aria-labelledby="Dropdown1">
               <li class="nav-item">
               <li class="nav-item">
                  <a class="nav-link" href="/categories">All Categories</a>
               </li>
               <a class="nav-link" href="/post">All Posts</a>
               </li>
            </ul>
         </div>
      </div>
      <div class="col-4 text-center">
         <a class="blog-header-logo text-dark underline" href="/">Large</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
         <div class="nav-item dropstart">
            <a class="nav-link hover border rounded p-3" href="#" id="Dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
               </svg>
            </a>
            <!-- Right Side Of Navbar -->
            <ul class="dropdown-menu" aria-labelledby="Dropdown">
               <!-- Authentication Links -->
               @guest
               @if (Route::has('login'))
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
               </li>
               @endif
               @if (Route::has('register'))
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
               </li>
               @endif
               @else
               <li class="nav-item dropdown">
               <li>
                  <a class="dropdown-item" href="{{ url('/dashboard') }}">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person mr-2" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                     </svg>
                     Account
                  </a>
               </li>
               @if (Auth::user()->account == 'author')
               <hr>
               <li><a class="dropdown-item" href="{{ url('/dashboard/post') }}">Posts</a></li>
               <li><a class="dropdown-item" href="{{ url('/dashboard/cat') }}">Categories</a></li>
               <hr>
               @endif

               <a class="dropdown-item logout" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                     <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                  </svg>
                  {{ __('Logout') }}
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
               </form>
         </div>
         </li>
         @endguest
         </ul>
      </div>
   </div>
   </div>
   </div>
</header>
