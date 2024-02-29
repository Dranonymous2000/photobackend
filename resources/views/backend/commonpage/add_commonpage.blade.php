@extends('admin.admin_master')
@section('admin')


<main id="main" class="main">

    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        

        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Add CommonPage</h5>

              <form method="POST" action="{{route('store.commonpage')}}">
                @csrf

                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Web Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text"  name="web_name" class="form-control" >
                    @error('web_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label  class="col-md-4 col-lg-3 col-form-label">Twitter</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text"  name="twitter" class="form-control" >
                    @error('twitter')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                    <label  class="col-md-4 col-lg-3 col-form-label">Facebook</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="text"  name="facebook" class="form-control" >
                      @error('facebook')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label  class="col-md-4 col-lg-3 col-form-label">Instagram</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="text"  name="instagram" class="form-control" >
                      @error('instagram')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label  class="col-md-4 col-lg-3 col-form-label">Linkedin</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="text"  name="linkedin" class="form-control" >
                      @error('linkedin')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label  class="col-md-4 col-lg-3 col-form-label">Copywrite</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="text"  name="copywrite" class="form-control" >
                      @error('copywrite')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
              

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Add CommonPage</button>
                </div>
              </form>

            </div>
          </div>

      

        </div>
      </div>
    </section>

  </main>




@endsection