@extends('admin.admin_master')
@section('admin')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Home</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a>Home</a></li>
         
          <li class="breadcrumb-item active">List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

         

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Service Table</h5>
              
              <!-- Active Table -->
              <table class="table">
                <thead>
                  <tr>
                   
                    
                    <th scope="col">Service Desc</th>
                    <th scope="col">Service Type1</th>
                    <th scope="col">Service Type2</th>
                    <th scope="col">Service Type3</th>
                    <th scope="col">Service Type4</th>
                    <th scope="col">Action</th>
                 
                  </tr>
                </thead>
                <tbody>

                    @foreach ($result as $item)

                    <tr>
                        <td>{{ Str::limit($item->service_description	, 20, '..') }}</td>
                        <td>{{ Str::limit($item->service_type1,20 ,"..") }}</td>
                        <td>{{ Str::limit($item->service_type2,20 ,"..") }}</td>
                        <td>{{ Str::limit($item->service_type3,20 ,"..") }}</td>
                        <td>{{ Str::limit($item->service_type4,20 ,"..") }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{route('edit.service',$item->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i>Edit</a>
                                <a href="{{route('delete.service', $item->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger shadow btn-xs sharp">Delete</a>
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