<div class="container-fluid margin-top-15 index-div">
    <?php
    if($extras){
        foreach ($extras as $row) {
            $email = $row['user'];
            $name = $row['name'];
            $user_id = $row['user_id'];
            $cat = $row['cat'];
            $images = $row['image_url'];
            $heading = $row['heading'];
            $content = $row['content'];
            $cat_id = $row['cat_id'];
            $added = $row['added'];
            $added = strftime($added);
        }
    ?>
        <div class="col-lg-3 col-md-3">
            <div class="panel panel-default">
               <div class="panel-heading">
                  LATEST POST IN <?=$cat?> CATEGORY
               </div>
               <div class="panel-body">
                <ul class="list-group text-center">
                  <?php
                    $latest = $this->general_mod->latest_in_cat($cat_id,5);
                    foreach ($latest as $value) {
                    ?>
                        <li class="list-group-item"><a href="<?=site_url()?>welcome/post/<?=$value['post_id']?>"><?=$value['heading']?></a></li>
                    <?php
                    }
                  ?>
                </ul>
               </div>
            </div>
            <div class="panel panel-default">
               <div class="panel-heading">
                  LATEST POST IN <?=$cat?> CATEGORY
               </div>
               <div class="panel-body">
                <ul class="list-group text-center">
                  <?php
                    $latest = $this->general_mod->latest_in_cat($cat_id,5);
                    foreach ($latest as $value) {
                    ?>
                        <li class="list-group-item"><a href="<?=site_url()?>welcome/post/<?=$value['post_id']?>"><?=$value['heading']?></a></li>
                    <?php
                    }
                  ?>
                </ul>
               </div>
            </div>
        </div>
    <div class="col-lg-6 col-md-6">
    <?php
    if($images !== "http://indiainvincible.com/india/upload/no.png"){
    ?>
        <div class="panel panel-info">
               <div class="panel-heading">
                  <span class="h3"><?=$heading?></span>
               </div>
               <div class="panel-body">
                <img src="<?=$images?>" class="img-thumbnail" align="right" style="width:100%;">
               </div>
               <div class="panel-footer">
                  <span class="margin-top-15">Posted by : <?=$name?></span> <span class="pull-right">Added on: <?=$added?></span> 
               </div>
               <div class="panel-heading">
                  <span class="index-desc font-droid"><?=str_replace("<br />", "</p><p class='index-desc font-droid'>", nl2br($content) . "</p>")?></span>
               </div>
            </div>
        <?php
        }else{
        ?>
        <div class="panel panel-info">
               <div class="panel-heading">
                  <span class="h3"><?=$heading?></span>
               </div>
               <div class="panel-footer">
                  <span class="margin-top-15">Posted by : <?=$name?></span> <span class="pull-right">Added on: <?=$added?></span> 
               </div>
               <div class="panel-body">
                <img src="<?=site_url()?>upload/no.png" class="img-thumbnail" align="right" style="width:30%;" />
                <span class="index-desc font-droid"><?=str_replace("<br />", "</p><p class='index-desc font-droid'>", nl2br($content) . "</p>")?></span>
               </div>
            </div>

        <?php
        }
        ?>
        <!--
        /*
        <h1><?=$heading?></h1><span class="margin-top-15">Posted by : <?=$name?>, Added on: <?=$added?></span> 
        <img src="<?=$images?>" class="img-thumbnail" align="right" style="width:60%;">
        <br><span class="index-desc font-droid">&bullet;<?=str_replace("<br />", "</p><p class='index-desc font-droid'>", nl2br($content) . "</p>")?></span>
        */
        -->
    </div>
    <?php
    }else{
    ?>
        <div class="container">
        <div class="alert alert-info text-center margin-top-15">
            <span class="h2">NO POSTS FOUND</span><br><br>
            <a href="<?=site_url('welcome')?>" class="btn btn-primary btn-sm">Go Back Home</a>
        </div>
        </div>
    <?php
    }
    ?>
        <div class="col-lg-3 col-md-3">
            <div class="panel panel-default">
               <div class="panel-heading text-center">
                  LATEST POSTS
               </div>
               <div class="panel-body">
                <ul class="list-group text-center">
                  <?php
                    $latest = $this->general_mod->latest_by_user($user_id,5);
                    foreach ($latest as $value) {
                    ?>
                        <li class="list-group-item"><a href="<?=site_url()?>welcome/post/<?=$value['post_id']?>"><?=$value['heading']?></a></li>
                    <?php
                    }
                  ?>
                </ul>
               </div>
            </div>
            <div class="panel panel-default">
               <div class="panel-heading text-center">
                  LATEST POSTS
               </div>
               <div class="panel-body">
                <ul class="list-group text-center">
                  <?php
                    $latest = $this->general_mod->latest_by_user($user_id,5);
                    foreach ($latest as $value) {
                    ?>
                        <li class="list-group-item"><a href="<?=site_url()?>welcome/post/<?=$value['post_id']?>"><?=$value['heading']?></a></li>
                    <?php
                    }
                  ?>
                </ul>
               </div>
            </div>
        </div>
</div>
<style>
.carousel-control.left, .carousel-control.right {
    background-image: none
}
</style>
