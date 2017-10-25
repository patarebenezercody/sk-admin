<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin | SK</title>

    <!-- All CSS Required -->
    <link rel="icon" href="{{ asset('assets/bootstrap/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="">
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Sweetalert2 -->
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    <link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">

    {{-- dataTables --}}
    <link href="{{ asset('assets/dataTables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-green sidebar-mini">
<div id="app" v-cloak>
    <div class="wrapper">

    @include('adminlte::layouts.partials.mainheader')

    @include('adminlte::layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('adminlte::layouts.partials.contentheader')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @include('adminlte::layouts.admin.skdu')
            @include('adminlte::layouts.admin.sktm')
            
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('adminlte::layouts.partials.controlsidebar')

    @include('adminlte::layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('adminlte::layouts.partials.scripts')
@show
    
    <!-- All JS Required -->
    <script src="{{ asset('assets/jquery/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

    {{-- dataTables --}}
    <script src="{{ asset('assets/dataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/js/dataTables.bootstrap.min.js') }}"></script>

    {{-- Validator --}}
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/ie10-viewport-bug-workaround.js') }}"></script>

    <script type="text/javascript">
        var skdu = $('#skdu-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('api/skdu') }}",
                        columns: [
                            {data: 'id', name:'id'},
                            {data: 'name', name:'name'},
                            {data: 'nokk', name:'nokk'},
                            {data: 'nohp', name:'nohp'},
                            {data: 'action', name:'action', orderable: false, searchable:false},
                        ]
                    });

         var sktm = $('#sktm-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('api/sktm') }}",
                        columns: [
                            {data: 'id', name:'id'},
                            {data: 'name', name:'name'},
                            {data: 'nokk', name:'nokk'},
                            {data: 'nohp', name:'nohp'},
                            {data: 'action', name:'action', orderable: false, searchable:false},
                        ]
                    });
        function deleteSkdu(id){
          var popup = confirm('Anda yakin ?');
          var csrf_token = $('meta[name="csrf-token"]').attr('content');
          if(popup == true){
            $.ajax({
              url: "{{ url('skdu') }}" + '/' + id,
              type: "POST",
              data: {'_method' : 'DELETE', '_token':csrf_token},
              success: function(data){
                skdu.ajax.reload();
                console.log(data);
              },

              error: function(){
                alert("Ops! Something wrong!");
              }
            });
          }
        }

        function deleteSktm(id){
          var popup = confirm('Anda yakin ?');
          var csrf_token = $('meta[name="csrf-token"]').attr('content');
          if(popup == true){
            $.ajax({
              url: "{{ url('sktm') }}" + '/' + id,
              type: "POST",
              data: {'_method' : 'DELETE', '_token':csrf_token},
              success: function(data){
                sktm.ajax.reload();
                console.log(data);
              },

              error: function(){
                alert("Ops! Something wrong!");
              }
            });
          }
        }      

    </script>
</body>
</html>
