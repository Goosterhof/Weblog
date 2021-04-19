@include('frontend.basics.head')
<main class="container">
@include('frontend.basics.header')
@include('frontend.basics.menu')

<div class="row">
  <div class="col p-3">
    <h4 class="text-center underline"><u>Categories</u></h4>
  </div>
  <hr>
</div>
<!-- product from database -->
<div class="row row-cols-4 p-3 mb-3">
  @foreach ($category as $key)
   <div class="col text-center">
     <a href="{{ route('category.show', ['id' => $key->id] ) }}" class="">{{$key->name}}</a>
   </div>
  @endforeach
 </div>
 <nav aria-label="Page navigation example">
   <ul class="pagination justify-content-center">
  {{ $category->links() }}
  </ul>
 </nav>
</main>
@include('frontend.basics.footer')
