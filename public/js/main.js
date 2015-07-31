$(document).ready(function(){
	$('img[rel=light],a[rel=light]').light();
	$('img[rel=light],a[rel=light]').click(function(){
		$('.light-title').html("<span class=\"h3 bold\">"+$(this).attr('data-title')+"</span>");
		$('.light-desc').html("<span class=\"bold\">"+$(this).attr('data-desc')+"</span>");
	});
	$('.viewpost').click(function(e){
		e.preventDefault();
	});
	$('#postform').submit(function(e){
		if($('#name').val().length < 6 || $('#name').val().length > 40){
			$('#res').html('<span class="alert alert-danger">Title must between 6-40 characters.</span>');
			return false;
		}else if($("select[name=cat]").val() == ""){
			$('#res').html('<span class="alert alert-danger">Select a category.</span>');
			return false;
		}
		return true;
	});
	$('#image-choice').change(function(){
		if($(this).prop('checked')){
			$('#userfile').attr('type','hidden');
			$('#userfile').attr('disabled','disabled');
		}else{
			$('#userfile').attr('type','file');
			$('#userfile').removeAttr('disabled');
		}
	});
	$('#slide').click(function(){
		if($(this).hasClass('show')){
			$(this).removeClass('show')
			$('#slider').animate({
          		width: '300px',
          		opacity: '1'
      		},100);
		}else{
			$(this).addClass('show')
			$('#slider').animate({
          		width: '0px',
          		opacity: '0'
      		},100);
		}
	});
	
	$('.items').hover(function(){
		/*$('.logo').animate({
			'height' : '50px'
		});*/
	});
	/*
	$(window).scroll(function () { 
		if($(window).scrollTop() + $(window).height() == $(document).height()) {
       $(".logo").animate({
        height: '+=100px'
    },100);
   }else{
   	$(".logo").animate({
        height: '-=100px'
    },100);
   }
   });
*/

});