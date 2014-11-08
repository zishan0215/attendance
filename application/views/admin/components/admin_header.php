<!DOCTYPE html>
<html>
<head>
	<title><?php echo $meta_title; ?></title>
	<!-- Bootstrap -->
	<link href="/jmiams/css/bootstrap.min.css" rel="stylesheet">
	<link href="/jmiams/css/datepicker.css" rel="stylesheet">
	<link href="/jmiams/css/main.css" rel="stylesheet">

	<style type="text/css">
		.bigger_text{
			font-size: 20px;
		}
	</style>
	<script src="/jmiams/js/jquery-1.11.1.min.js"></script>
	<script src="/jmiams/js/bootstrap.min.js"></script>
	<script src="/jmiams/js/bootstrap-datepicker.js"></script>
	<script src="/jmiams/js/main.js"></script>
</head>

<body>
    <nav class="navbar navbar-static-top  navbar-inverse" role="navigation">
	    <div class="container-fluid">
		    <div class="navbar-header">
		    	<a class="navbar-brand" href="<?php echo site_url('admin/'); ?>"><?php echo $meta_title; ?></a>
		    </div>
		    <div class="collapse navbar-collapse">
			    <ul class="nav navbar-nav">
				    <li <?php if($page == 0) echo 'class="active"' ?>><a href="<?php echo site_url('admin/'); ?>">Dashboard</a></li>
				    <li <?php if($page == 1) echo 'class="active"' ?>><?php echo anchor('admin/teachers', 'Teachers'); ?></li>
				    <li <?php if($page == 2) echo 'class="active"' ?>><?php echo anchor('admin/students', 'Students'); ?></li>
				    <li <?php if($page == 3) echo 'class="active"' ?>><?php echo anchor('admin/subjects', 'Subjects'); ?></li>
				    <li <?php if($page == 4) echo 'class="active"' ?>><?php echo anchor('admin/sessionals', 'Sessionals'); ?></li>
				    <li <?php if($page == 5) echo 'class="active"' ?>><?php echo anchor('admin/archiveAtt', 'Archive'); ?></li>

			    </ul>
			    <ul class="nav navbar-nav pull-right">
			    	<li class="dropdown pull-right">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $name ?> <span class="caret"></span></a>
				        <ul class="dropdown-menu" role="menu">
				            <li><?php echo anchor('admin/account', 'Account'); ?></li>
				            <li class="divider"></li>
				            <li><?php echo anchor('admin/logout', 'Logout'); ?></li>
				        </ul>
			        </li>
			    </ul>
			</div>
	    </div>
    </nav>
