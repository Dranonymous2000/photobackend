@extends('admin.admin_master')
@section('admin')


<main id="main" class="main">

    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        

        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Edit Service</h5>

              <form method="POST" action="{{route('update.service', $result->id)}}">
                @csrf

                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Service Description</label>
                  <div class="col-md-8 col-lg-9">
                    <textarea name="service_description" class="form-control"  >{{$result->service_description}}</textarea>
                    @error('service_description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label  class="col-md-4 col-lg-3 col-form-label">Service Type 1 </label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text"  name="service_type1" class="form-control" value="{{$result->service_type1}}">
                    @error('service_type1')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label  class="col-md-4 col-lg-3 col-form-label">Service Type2</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text"  name="service_type2" class="form-control"value="{{$result->service_type2}}" >
                    @error('service_type2')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label  class="col-md-4 col-lg-3 col-form-label">Service Type3</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text"  name="service_type3" class="form-control" value="{{$result->service_type3}}" >
                    @error('service_type3')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label  class="col-md-4 col-lg-3 col-form-label">Service Type4</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text"  name="service_type4" class="form-control" value="{{$result->service_type4}}" >
                    @error('service_type4')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label  class="col-md-4 col-lg-3 col-form-label">Service Type1 comment</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text"  name="service_type1_desc" class="form-control" value="{{$result->service_type1_desc}}">
                        @error('service_type1_desc')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                  </div>
                </div>

                <div class="row mb-3">
                  <label  class="col-md-4 col-lg-3 col-form-label">Service Type2 comment</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text"  name="service_type2_desc" class="form-control" value="{{$result->service_type2_desc}}" >
                    @error('service_type2_desc')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label  class="col-md-4 col-lg-3 col-form-label">Service Type3 comment</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text"  name="service_type3_desc" class="form-control" value="{{$result->service_type3_desc}}">
                    @error('service_type3_desc')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label  class="col-md-4 col-lg-3 col-form-label">Service Type4 comment</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text"  name="service_type4_desc" class="form-control"  value="{{$result->service_type4_desc}}">
                    @error('service_type4_desc')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-secondary">Edit Service</button>
                </div>
              </form>

            </div>
          </div>

      

        </div>
      </div>
    </section>

  </main>




@endsection