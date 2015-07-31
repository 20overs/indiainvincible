<?php
	if(!$extras){
?>
	<div class="container">
		<div class="alert alert-info text-center margin-top-15">
			<span class="h2">NO POSTS FOUND IN : <?=$title?></span><br><br>
			<a href="<?=site_url('welcome')?>" class="btn btn-primary btn-sm">Go Back Home</a>
		</div>
	</div>
<?php
	}else{
?>
<div class="container-fluid margin-top-15 index-div">
	<?php
	for($i=0;$i<count($extras);$i++){
	?>

	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 child">

<div class="" style="background: url('<?=$extras[$i]['img_thumb']?>');background-size: cover;
		background-repeat: no-repeat;background-position: center center;height:400px;">
	<div class="texts">
		<div class="title">
			<?=$extras[$i]['heading']?>
		</div>
		<div class="cover bottom">
			<?php
			$string = strip_tags($extras[$i]['content']);
			if (strlen($string) > 100) {
			    $stringCut = substr($extras[$i]['content'], 0, 100);
			    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).' ...';
			}elseif (strlen($string)==0) {
				$string = "No content available";
			}
			?>
		<div class="contents">
			Posted by - <?=$extras[$i]['name']?> |
			<?=$string?>
			<br><a href="<?=site_url()?>welcome/post/<?=$extras[$i]['post_id']?>" class="btn btn-danger btn-xs tile-btn pull-right">Read more</a>
		</div>
	</div>
</div>
</div>
		<hr>
	</div>
	<?php
		if($i==2){
		echo '</div><hr>';
		echo '<div class="container-fluid margin-top-15 index-div">';
		}
	}
	?>
</div>	
<?php
	}
?>