@extends('admin.admin_master')
@section('admin')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Contact</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Contact</li>
          <li class="breadcrumb-item active">List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

         

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Contact Table</h5>
              
              <!-- Active Table -->
              <table class="table">
                <thead>
                  <tr>
                    
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($result as $item)

                    <tr>
                        
                        <td>{{ Str::limit($item->contact_name, 10, '..') }}</td>
                        <td>{{ Str::limit($item->contact_email,15 ,"..") }}</td>
                        <td>{{ Str::limit($item->contact_subject, 20, '..')}}</td>
                        <td>{{ Str::limit($item->contact_message, 30, '..')}}</td>
                        <td>
                            <div class="d-flex">
        
                                <a href="{{route('delete.contact', $item->id )}}" class="btn btn-danger shadow btn-xs sharp">Delete</a>
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