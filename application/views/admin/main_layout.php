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
			</div>
	    </div>
    </nav>

	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="span9">
				<section>
					<h2>Page name</h2>
				</section>
			</div>
			<!-- Sidebar -->
			<div class="span3">
				<section>
					<?php echo anchor('admin', '<i class="icon-user"></i> admin'); ?><br>
					<?php echo anchor('admin/user/logout', '<i class="icon-off"></i> logout'); ?>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/admin_footer'); ?>