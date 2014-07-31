<?php $this->load->view('admin/components/admin_header'); ?>
<body>
    <nav class="navbar navbar-static-top navbar-inverse" role="navigation">
	    <div class="container-fluid">
		    <div class="navbar-header">
		    	<a class="navbar-brand" href="<?php echo site_url('admin/'); ?>"><?php echo $meta_title; ?></a>
		    </div>
		    <div class="collapse navbar-collapse">
			    <ul class="nav navbar-nav">
				    <li class="active"><a href="<?php echo site_url('admin/'); ?>">Dashboard</a></li>
				    <li><?php echo anchor('admin/', 'Techers'); ?></li>
				    <li><?php echo anchor('admin/', 'Students'); ?></li>
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

	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-md-9">
				<section>
					<h2>Welcome to Admin dashboard</h2>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/admin_footer'); ?>