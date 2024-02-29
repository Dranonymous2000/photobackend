@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Others</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item">Others</li>
          <li class="breadcrumb-item active">Edit Others</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        

        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Others</h5>

              <!-- Vertical Form -->
              <form method="POST" action="{{route("update.others", $result->id)}}" enctype="multipart/form-data">
                @csrf

                <div class="col-12">
                    <label for="inputNumber" class="col-sm-2 col-form-label"> Image</label>
                    <div class="col-sm-10">
                      <input class="form-control"  name="other_image" id="image" type="file"  >
                </div>

                <div class="form-group">
                    <img id="showImage"  src="{{asset($result->other_image)}}" alt="" style="width: 100px; height:100px">
                </div>

                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Image Name </label>
                  <input type="text" class="form-control" name="image_name" value="{{$result->image_name}}">
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label ">Short Description</label>
                    <textarea class="form-control" name="short_desc" > {{$result->short_desc}}</textarea>
                </div>

                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Long Title</label>
                    <input type="text" class="form-control" name="long_title" value="{{$result->long_title}}">
                </div>

                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Long Description</label>
                    <textarea class="form-control" name="long_desc" >{{$result->long_desc}}</textarea>
                  </div>

                  <div class="col-12">
                    <label for="inputNumber" class="col-sm-2 col-form-label"> Image 2</label>
                    <div class="col-sm-10">
                      <input class="form-control"  name="other_image2" id="image1" type="file" >
                </div>

                <div class="form-group">
                    <img id="showImage1"  src="{{asset($result->other_image2)}}" alt="" style="width: 100px; height:100px">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Date</label>
                  <input type="text" class="form-control" name="date" value="{{$result->date}}">
                </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Client</label>
                    <input type="text" class="form-control" name="client" value="{{$result->client}}" >
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Url</label>
                    <input type="text" class="form-control" name="url" value="{{$result->url}}">
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