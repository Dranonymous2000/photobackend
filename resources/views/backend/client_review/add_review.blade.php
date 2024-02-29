@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Review</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item">Review</li>
          <li class="breadcrumb-item active">Add Review</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        

        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Review</h5>

              <!-- Vertical Form -->
              <form method="POST" action="{{route("review.store")}}" enctype="multipart/form-data">
                @csrf

             
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Client Name </label>
                  <input type="text" class="form-control" name="client_name">
                  @error('client_name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label ">Client Description</label>
                    <textarea class="form-control" name="client_description" ></textarea>
                    @error('client_description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

              

                  <div class="col-12">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Client Image </label>
                    
                      <input class="form-control"  name="client_image" id="image1" type="file" >
                      @error('travel_image2')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                </div>

                <div class="form-group">
                    <img id="showImage1"  src="{{ url('upload/no_image.jpg')}}" alt="" style="width: 100px; height:100px">
                </div>
            

                  </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>

      

        </div>
      </div>
    </section>

  </main>


  <script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });

        $('#image1').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#showImage1').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
    
    
</script>

@endsection