<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

     

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Profile</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('user.profile')}}">
              <i class="bi bi-circle"></i><span>User Profile</span>
            </a>
          </li>
          <li>
            <a href="{{route('change.password')}}">
              <i class="bi bi-circle"></i><span>Change Password</span>
            </a>
          </li>
        </ul>
      </li>
      
      
      <!-- End Components Nav -->

      <!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" >
          <i class="bi bi-layout-text-window-reverse"></i><span>About</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('list.about')}}">
              <i class="bi bi-circle"></i><span>List About</span>
            </a>
          </li>
          <li>
            <a href="{{route('add.about')}}">
              <i class="bi bi-circle"></i><span>Add Tables</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse">
          <i class="bi bi-bar-chart"></i><span>Commonpage</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('list.commonpage')}}">
              <i class="bi bi-circle"></i><span>List Common</span>
            </a>
          </li>
          <li>
            <a href="{{route('add.commonpage')}}">
              <i class="bi bi-circle"></i><span>Add Commonpage</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse">
          <i class="bi bi-gem"></i><span>Home</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('list.home')}}">
              <i class="bi bi-circle"></i><span>List Home</span>
            </a>
          </li>
          <li>
            <a href="{{route('add.home')}}">
              <i class="bi bi-circle"></i><span>Add Home</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Icons Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#pages-nav" data-bs-toggle="collapse">
          <i class="bi bi-file-earmark-text"></i><span>Service</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pages-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('list.service')}}">
              <i class="bi bi-circle"></i><span>List Service</span>
            </a>
          </li>
          <li>
            <a href="{{route('add.service')}}">
              <i class="bi bi-circle"></i><span>Add Service</span>
            </a>
          </li>
        </ul>
      </li> <!-- End Pages Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#price-nav" data-bs-toggle="collapse">
          <i class="bi bi-file-earmark-text"></i><span>Price</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="price-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('list.price')}}">
              <i class="bi bi-circle"></i><span>List Price</span>
            </a>
          </li>
          <li>
            <a href="{{route('add.price')}}">
              <i class="bi bi-circle"></i><span>Add Price</span>
            </a>
          </li>
        </ul>
      </li> <!-- End Pages Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#team-nav" data-bs-toggle="collapse">
          <i class="bi bi-file-earmark-text"></i><span>Nature</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="team-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('list.nature')}}">
              <i class="bi bi-circle"></i><span>List Nature</span>
            </a>
          </li>
          <li>
            <a href="{{route('add.nature')}}">
              <i class="bi bi-circle"></i><span>Add Nature</span>
            </a>
          </li>
        </ul>
      </li> <!-- End Pages Nav -->

    
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#contact-nav" data-bs-toggle="collapse">
          <i class="bi bi-file text"></i><span>Travel</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="contact-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('list.travel')}}">
              <i class="bi bi-circle"></i><span>List Travel</span>
            </a>
          </li>
          <li>
            <a href="{{route('add.travel')}}">
              <i class="bi bi-circle"></i><span>Add Travel</span>
            </a>
          </li>
        </ul>
      </li> <!-- End Pages Nav -->

   
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#profile-nav">
            <i class="bi bi-menu-button-wide"></i><span>Animal</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="profile-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{route('list.animal')}}">
                    <i class="bi bi-circle"></i><span>List Animal</span>
                </a>
            </li>
            <li>
                <a href="{{route('add.animal')}}">
                    <i class="bi bi-circle"></i><span>Add Animal</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-toggle="collapse" href="#sport-nav">
          <i class="bi bi-trophy"></i><span>Sport</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="sport-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
              <a href="{{route('list.sport')}}">
                  <i class="bi bi-circle"></i><span>List Sport</span>
              </a>
          </li>
          <li>
              <a href="{{route('add.sport')}}">
                  <i class="bi bi-circle"></i><span>Add Sport</span>
              </a>
          </li>
      </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-toggle="collapse" href="#architecture-nav">
        <i class="bi bi-building"></i><span>Architecture</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="architecture-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{route('list.architecture')}}">
                <i class="bi bi-circle"></i><span>List Architecture</span>
            </a>
        </li>
        <li>
            <a href="{{route('add.architecture')}}">
                <i class="bi bi-circle"></i><span>Add Architecture</span>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-toggle="collapse" href="#people-nav">
      <i class="bi bi-person"></i><span>People</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="people-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
          <a href="{{route('list.people')}}">
              <i class="bi bi-circle"></i><span>List People</span>
          </a>
      </li>
      <li>
          <a href="{{route('add.people')}}">
              <i class="bi bi-circle"></i><span>Add People</span>
          </a>
      </li>
  </ul>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-toggle="collapse" href="#others-nav">
      <i class="bi bi-grid-3x2-gap"></i><span>Others</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="others-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
          <a href="{{route('list.others')}}">
              <i class="bi bi-circle"></i><span>List Others</span>
          </a>
      </li>
      <li>
          <a href="{{route('add.others')}}">
              <i class="bi bi-circle"></i><span>Add Others</span>
          </a>
      </li>
  </ul>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-toggle="collapse" href="#contacts-nav">
      <i class="bi bi-telephone"></i><span>Contacts</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="contacts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
          <a href="{{route('list.contact')}}">
              <i class="bi bi-circle"></i><span>List Contacts</span>
          </a>
      </li>
  </ul>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-toggle="collapse" href="#subscribers-nav">
      <i class="bi bi-telephone"></i><span>Client Revies</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="subscribers-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
          <a href="{{route('list.review')}}">
              <i class="bi bi-circle"></i><span>List Review</span>
          </a>
      </li>
      <li>
        <a href="{{route('add.review')}}">
            <i class="bi bi-circle"></i><span>Add Review</span>
        </a>
    </li>
  </ul>
</li>

    </ul><!-- End Sidebar Nav -->


    




        

  </aside>