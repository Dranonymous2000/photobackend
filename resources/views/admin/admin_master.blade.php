<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Photo Admin Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
 

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('backend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('backend/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('backend/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('backend/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('backend/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('backend/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('backend/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ez9NDf2kS9zjoIa6V5a5pOr3j1tUh4SSDQx5tsv26FPlYxofv+Y2MKO+2w7XmgQ/" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  <!-- Template Main CSS File -->
  <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

 

  <!-- ======= Header ======= -->
  @include('admin.body.header')
 <!-- End Header -->

  <!-- ======= Sidebar ======= -->
 @include('admin.body.sidebar')
  <!-- End Sidebar-->

 <!-- Start #main -->
 @yield('admin')
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.body.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="{{asset('backend/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('backend/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('backend/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('backend/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('backend/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('backend/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('backend/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('backend/js/main.js')}}"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    console.log("Script is running");
    @if(Session::has('message'))
      console.log("Message is present");
      var type = "{{ Session::get('alert-type', 'info') }}";
      console.log("Alert type: " + type);
      switch(type) {
        case 'info':
          toastr.info("{{ Session::get('message') }}");
          console.log("Toastr info triggered");
          break;
        case 'warning':
          toastr.warning("{{ Session::get('message') }}");
          console.log("Toastr warning triggered");
          break;
        case 'error':
          toastr.error("{{ Session::get('message') }}");
          console.log("Toastr error triggered");
          break;
        default:
          toastr.success("{{ Session::get('message') }}");
          console.log("Toastr success triggered");
          break;
      }
    @endif
  </script>
  
  


</body>

</html>