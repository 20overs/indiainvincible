<div class="container-fluid margin-top-15">
	<span>Logged in as : <b><?=$this->session->userdata('user_name')?></b></span>
	<span class="pull-right">Access level : <b><?=$this->session->userdata('user_level')?></b></span>
	<div class="container">
		<div class="col-lg-6 col-md-6">
		<h2>Add new post:</h2>
		<?php
		echo form_open_multipart('user/do_upload');
		?>
			<div class="form-group">
		      <label for="name">Title:</label>
		      <input type="text" class="form-control form-control-cust" id="name" placeholder="Enter Title" name="title" value="<?php echo set_value('title'); ?>" maxlength=25 required>
		      <?php echo form_error('title', '<div class="text-danger">', '</div>'); ?>
		   </div>
		   <div class="form-group">
		   	<label for="name">Category:</label>
		      <select class="form-control form-control-cust" name="cat" required>
		      <option value="">Select category</option>
		      <?php
				 foreach ($nav as $row) {
				  ?>
				    <option value="<?=$row['cat_id']?>"><?=$row['cat']?></option>
				  <?php
				  }
				?>
		      </select>
		   </div>
		   <div class="form-group">
		   	<div class="checkbox">
			  <label><input type="checkbox" id="image-choice">Dont have image</label>
			</div>
		      <label for="name">Select Image:</label>
		      <input type="file" id="userfile" name="userfile" multiple placeholder="Select an image/ Mulitple image" size="20" class="form-control" value="<?php echo set_value('userfile'); ?>" />
		      <?php echo form_error('userfile', '<div class="text-danger">', '</div>'); ?>
		   </div>
		   <div class="form-group">
		      <label for="name">Your Contents:</label>
		      <textarea class="form-control form-control-cust text-area" placeholder="Your contents" name="content" id="content"><?php echo trim(set_value('content')); ?></textarea>
		      <?php echo form_error('content', '<div class="text-danger">', '</div>'); ?>
		   </div>
			<input type="submit" value="Add Post" class="btn btn-sm btn-inline btn-primary" /> <span id="res"></span>
		</form>
		</div>

		<div class="col-lg-6 col-md-6">
		<div id="resdel" class="col-lg-12"></div>
		<h2>Manage your posts:</h2>
			 	<?php
			 	if($user_post== false){
			 	?>
			 		<div class="alert alert-danger">You have no post</div>
			 	<?php
			 	}else{
				 foreach ($user_post as $posts) {
				?>
					<div class="col-lg-12 margin-top-5 userpage-list">
						<a href="<?=$posts['image_url']?>" class="viewpost" rel="light" data-title="<?=$posts['heading']?>" data-desc="<?=$posts['content']?>" alt="<?=$posts['heading']?>"><?=$posts['heading']?></a>
				   		<a href="#" data-id="<?=$posts['post_id']?>" data-date="<?=$posts['added']?>" data-url="<?=$posts['image_url']?>" class="pull-right btn btn-xs btn-danger delpost">Delete</a>
				   	</div>
				<?php
				  }
				}
				?>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
$('.delpost').click(function(e){
		var date = $(this).attr('data-date');
		var id = $(this).attr('data-id');
		var urls = $(this).attr('data-url');
		var r = confirm("Sure want to delete");
		if (r == true) {
			$(this).parent().fadeOut(1000);
			$.post('<?=site_url()?>user/delete_post',{id:id,date:date,urls:urls},function(data){
				if(data==1){
					$('#resdel').html('<span class="text-success text-center">Post Deleted Successfully.</span>');
				}else{
					$('#resdel').html('<span class="text-danger text-center">Delete Post Failed.</span>');
				}
			});
		}
		e.preventDefault();
	});
});
</script>