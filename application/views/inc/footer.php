<div class="container-fluid footer">
<div class="col-lg-offset-4 col-lg-6 col-md-offset-4 col-md-6">
<ul class="nav nav-pills">
   <li><a href="<?=site_url()?>">ABOUT US</a></li>
   <li><a href="<?=site_url()?>">CONTACT US</a></li>
   <li><a href="<?=site_url()?>">HOW TO USE</a></li>
   <li><a href="<?=site_url()?>"><img src="<?=site_url()?>public/img/fb.png" height="25" class="follow" /></a></li>
   <li><a href="<?=site_url()?>"><img src="<?=site_url()?>public/img/tweet.png" height="25" class="follow"/></a></li>
</ul>
</div>
</div>
</body>
</html>
<script type="text/javascript">
<? if($this->session->userdata('message')) echo "$.notify('".$this->session->userdata('message')."','success');"; 
$this->session->unset_userdata('message');
?>
</script>

</div>