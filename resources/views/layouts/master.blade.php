<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('include.css')
    <title>Tracking Covid || Dashboard</title>
</head>
<body>
  @livewireStyles
    <!-- Navbar -->
    @include('include.navbar')
    <!-- /.Navbar -->

    <!-- Sidebar -->
    @include('include.sidebar')
    <!-- /.sidebar -->
    
    <div class="content-wrapper">
    <!-- Content -->
    <section class="content">
      <div class="container-fluid"><br>
       @yield('content')
      </div>
    <!--/. container-fluid -->
    </section>
    <!-- /.Content -->
    </div
  
    <!-- Javascript -->
    @include('include.js')
    <!-- /.Javascript -->
      @livewireScripts
</script>
</body>
</html>