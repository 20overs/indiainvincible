<div class="container-fluid margin-top-15 index-div">
	<?php
	$i=0;
	foreach ($posts as $rows) {
		if($rows[0]['user'] != false){	
		$i++;
	?>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 child">

<div class="" style="background: url('<?=$rows[0]['img_thumb']?>');background-size: cover;
		background-repeat: no-repeat;background-position: center center;height:400px;">
	<div class="texts">
		<div class="title">
			<?=$rows[0]['heading']?>
		</div>
		<div class="cover bottom">
			<?php
			$string = strip_tags($rows[0]['content']);
			if (strlen($string) > 120) {
			    $stringCut = substr($rows[0]['content'], 0, 120);
			    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).' ...';
			}elseif (strlen($string)==0) {
				$string = "No content available";
			}
			?>
		<div class="contents">
			<!--<span class="h5">Category: <a href="<?=site_url()?>welcome/page/<?=$rows[0]['cat_id']?>" class="cust-a"><?=$rows[0]['cat']?></a></span>-->
			<?php
			$datetym = $rows[0]['added'];
			$newdate = date('d-m-Y',strtotime($datetym));
			?>
			<span class="h5">Date:<?=$newdate?></span> |
			<?=$string?>
			<br><a href="<?=site_url()?>welcome/post/<?=$rows[0]['post_id']?>" class="btn btn-danger btn-xs tile-btn pull-right">Read more</a>
		</div>
	</div>
</div>
</div>
		<hr>
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