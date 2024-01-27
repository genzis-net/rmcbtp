
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Genzis Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <meta name="csrf-token" content="{{ csrf_token() }}">


  <!-- Favicons -->
  <link href="/dash/img/favicon.png" rel="icon">
  <link href="/dash/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/dash/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/dash/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/dash/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/dash/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/dash/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/dash/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/dash/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/dash/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/home" class="logo d-flex align-items-center">
        <img src="/dash/img/logo.png" alt="">
        <span class="d-none d-lg-block">GENZIS-ADMIN</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              notifications module coming soon
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              messages coming soon
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="/dash/img/logo.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
              <span>Administrator</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-person"></i>
                <span>My Profile (coming soon)</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-gear"></i>
                <span>Account Settings (coming soon)</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-question-circle"></i>
                <span>Need Help? (coming soon)</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/home">
          <i class="bi bi-grid"></i>
          <span>HOME</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#blog-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-file-richtext"></i><span>Publications</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        @if(Route::currentRouteName() == 'rental.create' || Route::currentRouteName() == 'rental.show' || Route::currentRouteName() == 'simsDecor.create' || Route::currentRouteName() == 'simsDecor.show' || Route::currentRouteName() == 'architecture.create' || Route::currentRouteName() == 'architecture.show' || Route::currentRouteName() == 'quincaillerie.create' || Route::currentRouteName() == 'quincaillerie.show' || Route::currentRouteName() == 'manage-refs' || Route::currentRouteName() == 'show-ref')
        <ul id="blog-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        @else
        <ul id="blog-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        @endif

          <li>
            @if (Route::currentRouteName() == 'manage-refs' || Route::currentRouteName() == 'show-ref')
                <a href="{{ route('manage-refs') }}" class="active">
                  <i class="bi bi-trophy" style="font-size: 1rem;"></i><span>Realisations</span>
                </a>
                @else
                <a href="{{ route('manage-refs') }}">
                  <i class="bi bi-trophy" style="font-size: 1rem;"></i><span>Realisations</span>
                </a>
              @endif
          </li>

          <li>
            @if (Route::currentRouteName() == 'architecture.create' || Route::currentRouteName() == 'architecture.show')
                <a href="{{ route('architecture.create') }}" class="active">
                  <i class="bi bi-trophy" style="font-size: 1rem;"></i><span>Architecture</span>
                </a>
                @else
                <a href="{{ route('architecture.create') }}">
                  <i class="bi bi-trophy" style="font-size: 1rem;"></i><span>Architecture</span>
                </a>
              @endif
          </li>

          <li>
            @if (Route::currentRouteName() == 'simsDecor.create' || Route::currentRouteName() == 'simsDecor.show')
                <a href="{{ route('simsDecor.create') }}" class="active">
                  <i class="bi bi-trophy" style="font-size: 1rem;"></i><span>Sims Decor</span>
                </a>
                @else
                <a href="{{ route('simsDecor.create') }}">
                  <i class="bi bi-trophy" style="font-size: 1rem;"></i><span>Sims Decor</span>
                </a>
              @endif
          </li>

          <li>
            @if (Route::currentRouteName() == 'quincaillerie.create' || Route::currentRouteName() == 'quincaillerie.show')
                <a href="{{ route('quincaillerie.create') }}" class="active">
                  <i class="bi bi-trophy" style="font-size: 1rem;"></i><span>Quincaillerie</span>
                </a>
                @else
                <a href="{{ route('quincaillerie.create') }}">
                  <i class="bi bi-trophy" style="font-size: 1rem;"></i><span>Quincaillerie</span>
                </a>
              @endif
          </li>

          <li>
            @if (Route::currentRouteName() == 'rental.create' || Route::currentRouteName() == 'rental.show')
                <a href="{{ route('rental.create') }}" class="active">
                  <i class="bi bi-trophy" style="font-size: 1rem;"></i><span>Rentals</span>
                </a>
                @else
                <a href="{{ route('rental.create') }}">
                  <i class="bi bi-trophy" style="font-size: 1rem;"></i><span>Rentals</span>
                </a>
              @endif
          </li>
        </ul>
      </li><!-- End blog Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#genzis-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-screwdriver"></i><span>Maintenance</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        @if(Route::currentRouteName() == 'manage-data')
        <ul id="genzis-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        @else
        <ul id="genzis-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        @endif
          <li>
            @if (1==2)
                <a href="#" class="active">
                  <i class="bi bi-exclamation-triangle" style="font-size: 1rem;"></i><span>Tickets (en cours)</span>
                </a>
                @else
                <a href="#">
                  <i class="bi bi-exclamation-triangle" style="font-size: 1rem;"></i><span>Tickets (en cours)</span>
                </a>
              @endif
          </li>

          <li>
            @if (Route::currentRouteName() == 'manage-data')
                <a href="#" class="active">
                  <i class="bi bi-gear" style="font-size: 1rem;"></i><span>Donnees du site <i class="bi bi-lock-fill" style="font-size: 1rem;"></i></span>
                </a>
                @else
                <a href="#">
                  <i class="bi bi-gear" style="font-size: 1rem;"></i><span>Donnees du site <i class="bi bi-lock-fill" style="font-size: 1rem;"></i></span>
                </a>
              @endif
          </li>

          <li>
            @if (1==2)
                <a href="#" class="active">
                  <i class="bi bi-columns-gap" style="font-size: 1rem;"></i><span>Genzis - Updates (en cours)</span>
                </a>
                @else
                <a href="#">
                  <i class="bi bi-columns-gap" style="font-size: 1rem;"></i><span>Genzis - Updates (en cours)</span>
                </a>
              @endif
          </li>
        </ul>
      </li><!-- End Maintenance Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    @yield('page-head')

    <section class="section dashboard">
        @yield('content')
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Genzis</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
     Delivered by <a href="https://genzis.net/">Genzis</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/dash/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="/dash/vendor/php-email-form/validate.js"></script>
  <script src="/dash/vendor/quill/quill.min.js"></script>
  <script src="/dash/vendor/tinymce/tinymce.min.js"></script>
  <script src="/dash/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/dash/vendor/chart.js/chart.min.js"></script>
  <script src="/dash/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/dash/vendor/echarts/echarts.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


  <!-- Template Main JS File -->
  <script src="/dash/js/main.js"></script>

  <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>

  <script>
    CKEDITOR.replace( 'summary-ckeditor' );
    CKEDITOR.replace( 'edit_summary-ckeditor' );
    CKEDITOR.replace( 'summary-ckeditor2' );
    CKEDITOR.replace( 'edit_summary-ckeditor2' );
  </script>
  @yield('scripts')

</body>

</html>