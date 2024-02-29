@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add About</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Profile</li>
          <li class="breadcrumb-item active">Edit Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        

        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Profile</h5>

              <!-- Vertical Form -->
              <form method="POST" action="{{route("about.store")}}" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">About Title</label>
                  <input type="text" class="form-control" name="about_title">
                  @error('about_title')
                  <span class="text-danger">{{$message}}</span>
                   @enderror
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">About Description</label>
                    <textarea class="form-control" name="about_description" ></textarea>
                    @error('about_description')
                  <span class="text-danger">{{$message}}</span>
                   @enderror
                  </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">About Intro</label>
                  <input type="text" class="form-control" name="about_intro" >
                  @error('about_intro')
                  <span class="text-danger">{{$message}}</span>
                   @enderror
                </div>
                <div class="col-12">
                    <label for="inputNumber" class="col-sm-2 col-form-label"> Image</label>
                    <div class="col-sm-10">
                      <input class="form-control"  name="about_image" id="image" type="file" >
                      @error('about_image')
                      <span class="text-danger">{{$message}}</span>
                       @enderror
                </div>

                <div class="form-group">
                    <img id="showImage"  src="{{ url('upload/no_image.jpg')}}" alt="" style="width: 100px; height:100px">
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Birthday</label>
                    <input type="text" class="form-control" name="birthday" >
                    @error('birthday')
                    <span class="text-danger">{{$message}}</span>
                     @enderror
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Age</label>
                    <input type="text" class="form-control" name="age" >
                    @error('age')
                    <span class="text-danger">{{$message}}</span>
                     @enderror
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Website</label>
                    <input type="text" class="form-control" name="website" >
                    @error('degree')
                    <span class="text-danger">{{$message}}</span>
                     @enderror
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Degree</label>
                    <input type="text" class="form-control" name="degree" >
                    @error('about_intro')
                    <span class="text-danger">{{$message}}</span>
                     @enderror
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" >
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                     @enderror
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" >
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                     @enderror
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label"> City</label>
                    <input type="text" class="form-control" name="city" >
                    @error('city')
                    <span class="text-danger">{{$message}}</span>
                     @enderror
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Freelance</label>
                    <input type="text" class="form-control" name="freelance" >
                    @error('freelance')
                    <span class="text-danger">{{$message}}</span>
                     @enderror
                  </div>

                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">About Long Description</label>
                    <textarea class="form-control" name="about_longdescription" id="about_longdescription"></textarea>
                    @error('about_longdescription')
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
    });
    
    
</script>

@endsection