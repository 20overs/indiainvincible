<div class="container-fluid margin-top-15 index-div">
	<?php
	$i=0;
	foreach ($posts as $rows) {
		if($rows[0]['user'] != false){	
		$i++;
	?>
	<?php
	$string = strip_tags($rows[0]['content']);
	if (strlen($string) > 100) {
	    $stringCut = substr($rows[0]['content'], 0, 170);
	    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).' ...';
	}
	?>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 child" style="background: url('<?=$rows[0]['img_thumb']?>');background-size: cover;
		background-repeat: no-repeat;background-position: center center;">
		<div class="blurer" style="background:#ccc;">
		</div>
			<h3><?=$rows[0]['heading']?></h3>
			<div class="">
			<center><img src="<?=$rows[0]['img_thumb']?>" class="img-thumbnail index-img"></center>
			<div class="index-description">
				<p><a href="<?=site_url()?>welcome/page/<?=$rows[0]['cat_id']?>" class="cust-a"><?=$rows[0]['cat']?></a></p>
				<?=$string?>
				<a href="<?=site_url()?>welcome/post/<?=$rows[0]['post_id']?>" class="btn btn-danger btn-xs tile-btn">Show more</a>
			</div>
			</div>
			
			
	</div>
	<?php
		}
		if($i==3){
		echo '</div>';
		echo '<div class="container-fluid margin-top-15 index-div">';
		}
	}
	?>
</div>


 <!-- 
 <div class="container-fluid margin-top-15 index-div">

	<div class="col-lg-4 col-md-4 col-sm-12 child">
		<h4><a href="#" class="links">Link 1</a></h4>
		<h4><a href="#" class="links">Link 2</a></h4>
		<h4><a href="#" class="links">Link 3</a></h4>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-12 child">
		<h4><a href="#" class="links">Link 1</a></h4>
		<h4><a href="#" class="links">Link 2</a></h4>
		<h4><a href="#" class="links">Link 3</a></h4>
	</div>

	<div class="col-lg-4 col-md-4 col-sm-12 child">
		<h4><a href="#" class="links">Link 1</a></h4>
		<h4><a href="#" class="links">Link 2</a></h4>
		<h4><a href="#" class="links">Link 3</a></h4>
	</div>

 </div>
  -->