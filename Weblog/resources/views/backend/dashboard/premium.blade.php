
@include('frontend.basics.head')
<main class="container">
@include('frontend.basics.header')
@include('frontend.basics.menu')
<div class="row w-75 m-auto">
  <div class="col mb-5 mt-5">
     <form action="{{ route('user.pay')}}" method="POST" class="needs-validation">
       @csrf
       @method('PATCH')

       <input hidden type="checkbox" name="premium" value="1" checked>


          <div class="row">
             <div class="col">
                <h4>Checkout</h4>
             </div>
          </div>
          <hr>
          <div class="row">
             <div class="col">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" readonly="true"/>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
             </div>
             <div class="col">
                <label for="email" class="form-label">EmaiL</label>
                <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" readonly="true"/>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
             </div>
          </div>
          <hr class="my-4">
          <h4 class="mb-3">Payment</h4>
          <div class="row gy-3">
             <div class="col">
                <label>Select bank</label>
                <select required class="form-select" aria-label="select" name="bank">
                  <option selected="true" disabled="disabled">Select your bank</option>
                  <option value="​ABN-Amro">​ABN-Amro</option>
                  <option value="ASN">ASN</option>
                  <option value="Bunq">Bunq</option>
                  <option value="ING">ING</option>
                  <option value="Knab">Knab</option>
                  <option value="Rabobank">Rabobank</option>
                  <option value="SNS">SNS</option>
                </select>
                @error('bank')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
             </div>
          </div>
          <hr class="my-4">
          <button class="w-100 btn btn-primary btn-lg text-light" type="submit">Continue to checkout</button>
       </form>
    </div>
 </div>
 @include('frontend.basics.footer')
 </main>
