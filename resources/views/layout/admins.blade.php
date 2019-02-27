
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">
<link href="/images/20130807185439172736.png" rel="shortcut icon">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/admins/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admins/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admins/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/themer.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/styles.css" media="screen">

<meta name="csrf-token" id="token" content="{{ csrf_token() }}">

<title>@yield('title')</title>

</head>

<body>

	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<!-- <img src="/admins/images/mws-logo.png" alt="mws admin"> -->

                <h3 style='color:white'>因乐 后台管理</h3>
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
        	<!-- Notifications -->
        	
            @php

                $rs = DB::table('rooter')->where('rid',session('rid'))->first();
                   
            @endphp
            <!-- Messages -->
            
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">

                    
                	<img src="{{$rs->photo}}" alt="User Photo">
                    
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, {{$rs->rname}}
                    </div>
                    <ul>
                    	<li><a href="/admin/profile">修改头像</a></li>
                        <li><a href="/admin/pass">修改密码</a></li>
                        <li><a href="/admin/outlogin">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<!-- Searchbox -->
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="typography.html">
                	<input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    
                    <li>
                        <a href="#"><i class="icon-users"></i>管理员</a>
                        <ul class='closed'>
                            <li><a href="/admin/rooter/create">添加管理员</a></li>
                            <li><a href="/admin/rooter">浏览管理员</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-github"></i>角色管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/role/create">添加角色</a></li>
                            <li><a href="/admin/role">浏览角色</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-key"></i>权限管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/permission/create">添加权限</a></li>
                            <li><a href="/admin/permission">浏览权限</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-lollipop"></i>音乐管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/music/create">添加音乐</a></li>
                            <li><a href="/admin/music">浏览音乐</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-github-3"></i>歌手管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/userssong/create">添加歌手</a></li>
                            <li><a href="/admin/userssong">浏览歌手</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-movie"></i>专辑管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/album/create">添加专辑</a></li>
                            <li><a href="/admin/album">浏览专辑</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-film"></i>歌单管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/special/create">添加歌单</a></li>
                            <li><a href="/admin/special">浏览歌单</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-pacman"></i>用户管理</a>
                        <ul class='closed'>
                            
                            <li><a href="/admin/user/user">浏览用户</a></li>
                        </ul>
                    </li>
                </ul>
            </div>         
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container" style="min-width: 1200px;min-height: 684px">
            
            @section('content')


            @show
            
               
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/admins/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/admins/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admins/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admins/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admins/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admins/jui/jquery-ui.custom.min.js"></script>
    <script src="/admins/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admins/plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/admins/plugins/flot/jquery.flot.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/admins/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/admins/plugins/validate/jquery.validate-min.js"></script>
    <script src="/admins/custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="/admins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admins/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admins/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/admins/js/demo/demo.dashboard.js"></script>

   @section('js')


   @show

</body>
</html>