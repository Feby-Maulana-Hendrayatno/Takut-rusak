<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PROYEK 3</title>

  @include("layouts.partials_admin.css.style_css")

  @yield("ajax_calendar_css")

</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake rounded-circle" src="/template/dist/img/SanggarTari.png" alt="AdminLTELogo" height="200" width="200">
    </div>

    <!-- Navbar -->
    @include("layouts.partials_admin.navbar.navbar_header")
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include("layouts.partials_admin.navbar.navbar_admin")

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        @yield("header")
      </div>

    <!-- Main content -->
    <section class="content">
      @yield("content")
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline-block">
      <b>Propertyku</b> Kelompok4
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include("layouts.partials_admin.js.style_js")

@yield("ajax_calendar_js")

</body>
</html>
