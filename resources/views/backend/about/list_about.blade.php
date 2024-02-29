@extends('admin.admin_master')
@section('admin')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>About</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">About</li>
          <li class="breadcrumb-item active">List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

         

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">About Table</h5>
              
              <!-- Active Table -->
              <table class="table">
                <thead>
                  <tr>
                   
                    <th scope="col">Title</th>
                    <th scope="col">Desc</th>
                    <th scope="col">Into</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                 
                  </tr>
                </thead>
                <tbody>

                    @foreach ($result as $item)

                    <tr>
                        <td>{{ Str::limit($item->about_title, 20, '..') }}</td>
                        <td>{{ Str::limit($item->about_description,20 ,"..") }}</td>
                        <td>{{ Str::limit($item->about_intro, 20, '..')}}</td>
                        <td><img src="{{asset($item->about_image)}}" style="width: 70px; height: 40px" alt=""></td>
                        
                        <td>
                            <div class="d-flex">
                                <a href="{{route('edit.about', $item->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i>Edit</a>
                                <a href="{{route('delete.about', $item->id )}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger shadow btn-xs sharp">Delete</a>
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