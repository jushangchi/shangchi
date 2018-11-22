<!DOCTYPE html>
<html lang="en">

    <head>
    
        <!-- Basic -->
        <meta charset="UTF-8" />

        <title>@yield('title')</title>
     

        
        <!-- Import google fonts -->
    
        
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="/static/admin/ico/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="/static/admin/ico/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="/static/admin/ico/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="/static/admin/ico/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="/static/admin/ico/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="/static/admin/ico/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="/static/admin/ico/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="/static/admin/ico/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="/static/admin/ico/apple-touch-icon-152x152.png" />
        
        <!-- start: CSS file-->
        
        <!-- Vendor CSS-->
        <link href="/static/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/static/admin/vendor/skycons/css/skycons.css" rel="stylesheet" />
        <link href="/static/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="/static/admin/vendor/css/pace.preloader.css" rel="stylesheet" />
        
        <!-- Plugins CSS-->
        <link href="/static/admin/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css" rel="stylesheet" />   
        <link href="/static/admin/plugins/scrollbar/css/mCustomScrollbar.css" rel="stylesheet" />
        <link href="/static/admin/plugins/bootkit/css/bootkit.css" rel="stylesheet" />
        <link href="//static/admin/plugins/magnific-popup/css/magnific-popup.css" rel="stylesheet" />
        <link href="/static/admin/plugins/fullcalendar/css/fullcalendar.css" rel="stylesheet" />
        <link href="/static/admin/plugins/jqvmap/jqvmap.css" rel="stylesheet" />
        
        <!-- Theme CSS -->
        <link href="/static/admin/css/jquery.mmenu.css" rel="stylesheet" />
        
        <!-- Page CSS -->       
        <link href="/static/admin/css/style.css" rel="stylesheet" />
        <link href="/static/admin/css/add-ons.min.css" rel="stylesheet" />
        
        <!-- end: CSS file-->   
        
        
        <!-- Head Libs -->
        <script src="/static/admin/plugins/modernizr/js/modernizr.js"></script>
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->        
        
    </head>
    
    <body>
    
        <!-- Start: Header -->
        <div class="navbar" role="navigation">
            <div class="container-fluid container-nav">
                <!-- Navbar Action -->
                <ul class="nav navbar-nav navbar-actions navbar-left">
                    <li class="visible-md visible-lg"><a href="#" id="main-menu-toggle"><i class="fa fa-th-large"></i></a></li>
                    <li class="visible-xs visible-sm"><a href="#" id="sidebar-menu"><i class="fa fa-navicon"></i></a></li>          
                </ul>
                <!-- Navbar Left -->
                <div class="navbar-left">
                    <!-- Search Form -->                    
                    <form class="search navbar-form">
                        <div class="input-group input-search">
                            <input type="text" class="form-control bk-radius" name="q" id="q" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>                      
                    </form>
                </div>
                <!-- Navbar Right -->
                <div class="navbar-right">                  
                    <!-- Notifications -->
                
                    <!-- End Notifications -->                  
                    <!-- Userbox -->
                    <div class="userbox">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <figure class="profile-picture hidden-xs">
                                <img src="{{session('img')}}" class="img-circle" alt="" />
                            </figure>
                            <div class="profile-info">
                                <span class="name">{{session('name')}}</span>
                                <span class="role"><i class="fa fa-circle bk-fg-success"></i> Administrator</span>
                            </div>          
                            <i class="fa custom-caret"></i>
                        </a>
                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="dropdown-menu-header bk-bg-white bk-margin-top-15">                      
                                    <div class="progress progress-xs  progress-striped active">
                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                            60%
                                        </div>
                                    </div>                          
                                </li>   
                                <li>
                                    <a href="page-profile.html"><i class="fa fa-user"></i> Profile</a>
                                </li>
                                
                                <li>
                                    <a href="/adminlogin"><i class="fa fa-power-off"></i> Logout</a>
                                </li>
                            </ul>
                        </div>                      
                    </div>
                    <!-- End Userbox -->
                </div>
                <!-- End Navbar Right -->
            </div>      
        </div>
        <!-- End: Header -->
        <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >免费网站模板</a></div>
        
        <!-- Start: Content -->
        <div class="container-fluid content">   
            <div class="row">
            
                <!-- Sidebar -->
                <div class="sidebar">
                    <div class="sidebar-collapse">
                        <!-- Sidebar Header Logo-->
                        <div class="sidebar-header">
                            <img src="/static/admin/img/logo.png" class="img-responsive" alt="" />
                        </div>
                        <!-- Sidebar Menu-->
                        <div class="sidebar-menu">                      
                            <nav id="menu" class="nav-main" role="navigation">
                                <ul class="nav nav-sidebar">
                                    <div class="panel-body text-center">                                
                                        <div class="flag">
                                            <img src="/static/admin/img/flags/USA.png" class="img-flags" alt="" />
                                        </div>
                                    </div>
                                    <li class="active">
                                        <a href="/admin">
                                            <i class="fa fa-laptop" aria-hidden="true"></i><span>Dashboard</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-parent">
                                        <a>
                                            <i class="fa fa-male" aria-hidden="true"></i><span>用户管理</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li><a href="/user"><span class="text">用户列表</span></a></li>
                                            <li><a href="/user"><span class="text">添加用户</span></a></li>
                                            <li><a href="/collect"><span class="text">用户收藏列表</span></a></li>        
                                        </ul>
                                    </li>
                                    <li class="nav-parent">
                                        <a>
                                            <i class="fa fa-male" aria-hidden="true"></i><span>管理员管理</span>
                                        </a>
                                        <ul class="nav nav-children">
                                           <li><a href="/adminsuser"><span class="text">管理员列表</span></a></li>
                                            <li><a href="/adminsuser/create"><span class="text">管理员添加</span></a></li>
                                            <li><a href="/role"><span class="text">角色列表</span></a></li>
                                            <li><a href="/role/create"><span class="text">角色添加</span></a></li>
                                            <li><a href="/authlist"><span class="text">权限列表</span></a></li>
                                            <li><a href="/authlist/create"><span class="text">权限添加</span></a></li>
                                            
                                        </ul>
                                    </li>
                                    <li class="nav-parent">
                                        <a>
                                            <i class="fa fa-tasks" aria-hidden="true"></i><span>分类管理</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li><a href="/admincates/create"><span class="text">分类添加</span></a></li>
                                            <li><a href="/admincates"><span class="text">分类列表</span></a></li>                                           
                                        </ul>
                                    </li>
                                    <li class="nav-parent">
                                        <a>
                                            <i class="fa fa-tasks" aria-hidden="true"></i><span>广告管理</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li><a href="/adv/create"><span class="text">广告添加</span></a></li>
                                            <li><a href="/adv"><span class="text">广告列表</span></a></li>                                          
                                        </ul>
                                    </li>
                                    <li class="nav-parent">
                                        <a>
                                            <i class="fa fa-tasks" aria-hidden="true"></i><span>友情链接管理</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li><a href="/flink/create"><span class="text">友情链接添加</span></a></li>
                                            <li><a href="/flink"><span class="text">友情链接列表</span></a></li>                                          
                                        </ul>
                                    </li>
                                    <li class="nav-parent">
                                        <a>
                                            <i class="fa fa-tasks" aria-hidden="true"></i><span>留言管理</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li><a href="/message"><span class="text">留言列表</span></a></li>                                            
                                        </ul>
                                    </li>
                                     <li class="nav-parent">
                                        <a>
                                            <i class="fa fa-tasks" aria-hidden="true"></i><span>商品管理</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li><a href="/good"><span class="text">商品列表</span></a></li>                              <li><a href="/good/create"><span class="text">商品添加</span></a></li>                 
                                        </ul>
                                    </li>
                                    <li class="nav-parent">
                                        <a>
                                            <i class="fa fa-tasks" aria-hidden="true"></i><span>产品明星</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li><a href="/star"><span class="text">明星列表</span></a></li>                
                                        </ul>
                                    </li>   
                                    <li class="nav-parent">
                                        <a>
                                            <i class="fa fa-tasks" aria-hidden="true"></i><span>轮播图管理</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li><a href="/slid"><span class="text">轮播图列表</span></a></li>
                                            <li><a href="/slid/create"><span class="text">轮播图添加</span></a></li>                
                                        </ul>
                                    </li>   
                                    <li class="nav-parent">
                                        <a>
                                            <i class="fa fa-tasks" aria-hidden="true"></i><span>订单管理</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li><a href="/adminorder"><span class="text">订单列表</span></a></li>                
                                        </ul>
                                    </li> 
                                </ul>
                            </nav>
                        </div>
                        <!-- End Sidebar Menu-->
                    </div>
                    <!-- Sidebar Footer-->
                    <div class="sidebar-footer">                    
                        <div class="small-chart-visits">
                            <div class="small-chart" id="sparklineLineVisits"></div>
                            <div class="small-chart-info">
                                <label>New Visits</label>
                                <strong>70,79%</strong>
                            </div>
                            <script type="text/javascript">
                                var sparklineLineVisitsData = [15, 16, 17, 19, 15, 25, 23, 35, 29, 15, 30, 45];
                            </script>
                        </div>
                        <ul class="sidebar-terms bk-margin-top-10">
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">About</a></li>
                        </ul>                   
                    </div>
                    <!-- End Sidebar Footer-->
                </div>
                <!-- End Sidebar -->
                        
                <!-- Main Page -->
                <div class="main ">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="pull-left">
                            <ol class="breadcrumb visible-sm visible-md visible-lg">                                
                                <li><a href="index.html"><i class="icon fa fa-home"></i>Home</a></li>
                                <li class="active"><i class="fa fa-laptop"></i>Dashboard</li>
                            </ol>                       
                        </div>
                        <div class="pull-right">
                            <h2>Dashboard</h2>
                        </div>                  
                    </div>
                   @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        @foreach ($errors->all() as $error)
                        <strong>{{ $error }}</strong>
                        @endforeach 
                    </div>
                    @endif
                    @if(session('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{session('success')}}</strong>
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{session('error')}}</strong>
                    </div>
                    @endif 
                    <div class="row">
                        @section('admin')
                        @show
                    </div>
                    
                
                    
                </div>
                <!-- End Main Page -->
                
                <!-- Footer -->
                <div id="footer">
                    <ul>
                        <li>
                            <div class="title">Memory</div>
                            <div class="bar">
                                <div class="progress light progress-sm  progress-striped active">
                                    <div class="progress-bar progress-squared progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                        60%
                                    </div>
                                </div>
                            </div>          
                            <div class="desc">4GB of 8GB</div>
                        </li>
                        <li>
                            <div class="title">HDD</div>
                            <div class="bar">
                                <div class="progress light progress-sm  progress-striped active">
                                    <div class="progress-bar progress-squared progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                        40%
                                    </div>
                                </div>
                            </div>          
                            <div class="desc">250GB of 1TB</div>
                        </li>
                        <li>
                            <div class="title">SSD</div>
                            <div class="bar">
                                <div class="progress light progress-sm  progress-striped active">
                                    <div class="progress-bar progress-squared progress-bar-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                        70%
                                    </div>
                                </div>
                            </div>          
                            <div class="desc">700GB of 1TB</div>
                        </li>
                        <li>
                          
                        </li>               
                    </ul>   
                </div>
                <!-- End Footer -->
            
            </div>
        </div><!--/container-->
        
        
        <div class="clearfix"></div>        
        
        
        <!-- start: JavaScript-->
        
        <!-- Vendor JS-->               
        <script src="/static/admin/vendor/js/jquery.min.js"></script>
        <script src="/static/admin/vendor/js/jquery-2.1.1.min.js"></script>
        <script src="/static/admin/vendor/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="/static/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="/static/admin/vendor/skycons/js/skycons.js"></script>
        <script src="/static/admin/vendor/js/pace.min.js"></script>
        
        <!-- Plugins JS-->
        <script src="/static/admin/plugins/jquery-ui/js/jquery-ui-1.10.4.min.js"></script>
        <script src="/static/admin/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="/static/admin/plugins/bootkit/js/bootkit.js"></script>
        <script src="/static/admin/plugins/magnific-popup/js/magnific-popup.js"></script>
        <script src="/static/admin/plugins/moment/js/moment.min.js"></script>   
        <script src="/static/admin/plugins/fullcalendar/js/fullcalendar.js"></script>
        <script src="/static/admin/plugins/flot/js/jquery.flot.min.js"></script>
        <script src="/static/admin/plugins/flot/js/jquery.flot.pie.min.js"></script>
        <script src="/static/admin/plugins/flot/js/jquery.flot.resize.min.js"></script>
        <script src="/static/admin/plugins/flot/js/jquery.flot.stack.min.js"></script>
        <script src="/static/admin/plugins/flot/js/jquery.flot.time.min.js"></script>
        <script src="/static/admin/plugins/flot-tooltip/js/jquery.flot.tooltip.js"></script>
        <script src="/static/admin/plugins/chart-master/js/Chart.js"></script>
        <script src="/static/admin/plugins/jqvmap/jquery.vmap.js"></script>
        <script src="/static/admin/plugins/jqvmap/data/jquery.vmap.sampledata.js"></script>
        <script src="/static/admin/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
        <script src="/static/admin/plugins/sparkline/js/jquery.sparkline.min.js"></script>
        
        <!-- Theme JS -->       
        <script src="/static/admin/js/jquery.mmenu.min.js"></script>
        <script src="/static/admin/js/core.min.js"></script>
        
        <!-- Pages JS -->
        <script src="/static/admin/js/pages/index.js"></script>
        
        <!-- end: JavaScript-->
        
    </body>
    
</html>