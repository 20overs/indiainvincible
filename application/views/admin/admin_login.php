
<div class="container-fluid margin-top-15">
<div class="container">
	<div class="col-lg-4 col-lg-offset-4 form-wrapper">
	<div class="panel panel-success">
   <div class="panel-heading">
      <h3 class="panel-title text-center">Admin Login</h3>
   </div>
   		<div class="panel-body">
      		<form class="form-horizontal" role="form" action="<?=site_url('admin')?>" method="post">
			   <div class="form-group">
			      <label for="firstname" class="col-sm-4 control-label">User Name</label>
			      <div class="col-sm-8">
			         <input type="email" class="form-control" id="username"  name="username" value="<?php echo set_value('username'); ?>"
			            placeholder="Enter Username" required>
			           <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
			      </div>
			   </div>
			   <div class="form-group">
			      <label for="lastname" class="col-sm-4 control-label">Password</label>
			      <div class="col-sm-8">
			         <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>"
			            placeholder="Enter Password" required>
			            <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
			      </div>
			   </div>
			   <div class="form-group">
			      <div class="col-sm-offset-4 col-sm-10">
			         <button type="submit" class="btn btn-default">Sign in</button>
			      </div>
			   </div>
			   <?php
			   if($error==1){
			   	?>
			   	<div class="alert alert-danger text-center">
			   		Username / Password not match
			   	</div>
			   	<?
			   }
			   ?>
			</form>
   		</div>
	</div>
</div>
</div>
</div>