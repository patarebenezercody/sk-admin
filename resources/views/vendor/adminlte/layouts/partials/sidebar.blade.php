<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('MENU') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li><a href="{{ url('skdu') }}"><i class='fa fa-link'></i> <span>{{ trans('Skdu') }}</span></a></li>

            <li><a href="{{ url('sktm') }}"><i class='fa fa-link'></i> <span>{{ trans('Sktm') }}</span></a></li>
            
            <li><a href="{{ url('skduselesai') }}"><i class='fa fa-link'></i> <span>{{ trans('Skdu(Selesai)') }}</span></a></li>

            <li><a href="{{ url('sktmselesai') }}"><i class='fa fa-link'></i> <span>{{ trans('Sktm(Selesai)') }}</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
