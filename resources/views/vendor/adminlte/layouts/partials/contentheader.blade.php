<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Selamat Datang, ' ) <b><a href="#">{{ Auth::user()->name }}</a></b>
        <small>@yield('contentheader_description')</small>
    </h1>
    <br>
    
</section>