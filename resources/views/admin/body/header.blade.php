<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Pooja Media</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <!-- End Notification Nav -->

       

            <a class="dropdown-item d-flex align-items-center " href={{route('admin.logout')}}>
                <i class="bi bi-box-arrow-right "></i>
                <span>Sign Out</span>
              </a>

         
        <!-- End Messages Nav -->

        

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ (!empty($user->profile_photo_path))?url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block ps-2">Pooja Media</span>
          </a><!-- End Profile Iamge Icon -->

          <!-- End Profile Dropdown Items -->
    <!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>