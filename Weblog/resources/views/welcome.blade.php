@include('frontend.basics.head')
<main class="container">
@include('frontend.basics.header')
@include('frontend.basics.menu')
@include('frontend.home.featured')
  <div class="row">
    <div class="col">
      @include('frontend.home.blogpost')
    </div>
</div>
@include('frontend.basics.footer')
</main>
