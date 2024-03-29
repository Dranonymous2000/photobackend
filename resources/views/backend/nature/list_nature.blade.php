@extends('admin.admin_master')
@section('admin')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>About</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Nature</li>
          <li class="breadcrumb-item active">List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

         

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Nature Table</h5>
              
              <!-- Active Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Long Title</th>
                    <th scope="col">Short Desc</th>
                    <th scope="col">Image2</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($result as $item)

                    <tr>
                        <td><img src="{{asset($item->nature_image)}}" style="width: 70px; height: 40px" alt=""></td>
                        <td>{{ Str::limit($item->image_name, 15, '..') }}</td>
                        <td>{{ Str::limit($item->short_desc,15 ,"..") }}</td>
                        <td>{{ Str::limit($item->long_title, 15, '..')}}</td>  
                        <td><img src="{{asset($item->nature_image2)}}" style="width: 70px; height: 40px" alt=""></td>  
                        <td>
                            <div class="d-flex">
                                <a href="{{route('edit.nature', $item->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i>Edit</a>
                                <a href="{{route('delete.nature', $item->id )}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger shadow btn-xs sharp">Delete</a>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
              </table>
              <!-- End Active Table -->

            </div>
          </div>

         

         

        </div>

       
      </div>
    </section>

  </main>
    
@endsection