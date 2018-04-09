<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>jssDevOps | @yield("title")</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/theme/adminLTE/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/theme/adminLTE/css/skins/_all-skins.min.css">
  
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.siderbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
       
        
      </section>

      <!-- Main content -->
      <section class="content">
     @yield('content')
        
     
    
      </section>
    
    

  </div>

<script src="/js/jquery.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/plugin/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/plugin/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/theme/adminLTE/js/app.min.js"></script>
@yield('scripts')

</body>
</html>
