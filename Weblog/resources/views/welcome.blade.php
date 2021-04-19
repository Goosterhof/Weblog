@include('frontend.basics.head')
<main class="container">
@include('frontend.basics.header')
@include('frontend.basics.menu')
@include('frontend.home.featured')
  <div class="row mb-2">
    <div class="col-md-8">
      @include('frontend.home.blogpost')
    </div>
  <div class="col-md-4">
    @include('frontend.home.sidebar')
  </div>
</div>
@include('frontend.basics.footer')
</main>
