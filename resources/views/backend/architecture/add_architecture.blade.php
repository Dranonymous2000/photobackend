@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Architecture</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item">Architecture</li>
          <li class="breadcrumb-item active">Add Architecture</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        

        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Architecture</h5>

              <!-- Vertical Form -->
              <form method="POST" action="{{route("store.architecture")}}" enctype="multipart/form-data">
                @csrf

                <div class="col-12">
                    <label for="inputNumber" class="col-sm-2 col-form-label"> Image</label>
                   
                      <input class="form-control"  name="architecture_image" id="image" type="file" >

                    @error('architecture_image')
                    <span class="text-danger">{{$message}}</span>
                      @enderror
                </div>

                <div class="form-group">
                    <img id="showImage"  src="{{ url('upload/no_image.jpg')}}" alt="" style="width: 100px; height:100px">

                </div>

                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Image Name </label>
                  <input type="text" class="form-control" name="image_name">
                  @error('image_name')
                  <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label ">Short Description</label>
                    <textarea class="form-control" name="short_desc" ></textarea>
                    @error('short_desc')
                    <span class="text-danger">{{$message}}</span>
                      @enderror

                </div>

                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Long Title</label>
                    <input type="text" class="form-control" name="long_title">
                    @error('long_title')
                    <span class="text-danger">{{$message}}</span>
                      @enderror
                </div>

                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Long Description</label>
                    <textarea class="form-control" name="long_desc" ></textarea>
                    @error('long_desc')
                    <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>

                  <div class="col-12">
                    <label for="inputNumber" class="col-sm-2 col-form-label"> Image 2</label>
                   
                      <input class="form-control"  name="architecture_image2" id="image1" type="file" >
                      @error('architecture_image2') 
                      <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>

                <div class="form-group">
                    <img id="showImage1"  src="{{ url('upload/no_image.jpg')}}" alt="" style="width: 100px; height:100px">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Date</label>
                  <input type="text" class="form-control" name="date" >
                  @error('date')
                  <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Client</label>
                    <input type="text" class="form-control" name="client" >
                    @error('client')
                    <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Url</label>
                    <input type="text" class="form-control" name="url" >
                    @error('url')
                    <span class="text-danger">{{$message}}</span>
                      @enderror
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