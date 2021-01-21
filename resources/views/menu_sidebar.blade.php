<style type="text/css">
    .first-level{
        margin-left: 20px!important;
    }  
</style>
<!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{URL::to('/')}}" aria-expanded="false">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu">Dashboard</span></a>
                        </li>
                                               
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="fas fa-user-md"></i>
                                <span class="hide-menu">Doctors</span></a>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{URL::to('doctors')}}" class="sidebar-link">
                                        <i class="mdi mdi-note-outline"></i><span class="hide-menu"> List </span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a href="{{URL::to('doctors/notification')}}" class="sidebar-link">
                                        <i class="mdi mdi-note-outline"></i><span class="hide-menu"> Notifications</span>
                                    </a>
                                </li>

                            </ul>
                        </li>    

                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="fa fa-users"></i>
                                <span class="hide-menu">Customers</span></a>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{URL::to('customers')}}" class="sidebar-link">
                                        <i class="mdi mdi-note-outline"></i><span class="hide-menu"> List </span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a href="{{URL::to('customers/notification')}}" class="sidebar-link">
                                        <i class="mdi mdi-note-outline"></i><span class="hide-menu"> Notifications</span>
                                    </a>
                                </li>

                            </ul>
                        </li>                   

                        <li class="sidebar-item"> 
                            <a class="sidebar-link" href="{{ URL::to('banners') }}">
                                <i class="fas fa-images"></i>
                                <span class="hide-menu">Banners </span>
                            </a>
                        </li>

                        <li class="sidebar-item"> 
                            <a class="sidebar-link" href="{{ URL::to('package') }}">
                                <i class="fas fa-ribbon"></i>
                                <span class="hide-menu">Packages </span></a>
                        </li>

                        <li class="sidebar-item"> 
                            <a class="sidebar-link" href="{{ URL::to('category') }}">
                                <i class="fas fa-tag"></i>
                                <span class="hide-menu">Categories </span></a>
                        </li>

                        <li class="sidebar-item"> 
                            <a class="sidebar-link" href="{{ URL::to('users') }}">
                                <i class="fas fa-user-secret"></i>
                                <span class="hide-menu">Users </span>
                            </a>
                        </li>

                        <li class="sidebar-item"> 
                            <a class="sidebar-link" href="{{ URL::to('settings') }}">
                                <i class="fas fa-wrench"></i>
                                <span class="hide-menu">Settings </span>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->