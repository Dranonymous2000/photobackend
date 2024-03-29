@extends('admin.admin_master')
@section('admin')


<main id="main" class="main">

    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        

        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Add Home</h5>

              <form method="POST" action="{{route('store.home')}}">
                @csrf

                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Home Title</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text"  name="Home_title" class="form-control" >
                    @error('Home_title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label  class="col-md-4 col-lg-3 col-form-label">Home Description</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text"  name="Home_desc" class="form-control" >
                    @error('Home_desc')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Add Home</button>
                </div>
              </form>

            </div>
          </div>

      

        </div>
      </div>
    </section>

  </main>




@endsection