@extends('admin.admin_master')
@section('admin')


<main id="main" class="main">

    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        

        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Edit Price</h5>

              <form method="POST" action="{{route('update.price', $result->id)}}">
                @csrf

                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Price Amount</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text"  name="price_amount" class="form-control" value="{{$result->price_amount}}" >
                    @error('price_amount')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label  class="col-md-4 col-lg-3 col-form-label">Price Description</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text"  name="price_description" class="form-control" value="{{$result->price_description}}"  >
                    @error('price_description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Edit Price</button>
                </div>
              </form>

            </div>
          </div>

      

        </div>
      </div>
    </section>

  </main>




@endsection