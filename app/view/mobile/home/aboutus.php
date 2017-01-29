<?php
$section=isset($data['section'])?$data['section']:'';
$curl=new curl;
@$data=json_decode($curl->get(API_URL.'/account?'.Helper::queryToken()));
$user=$data->data;
$yahavi_details=json_decode($curl->get(API_URL.'/yahavi/details?'.Helper::queryToken()))->data;
//Helper::pre($yahavi_details);die;
switch (@$user->user_type) {
  case '1':
    $artist_url=ARTIST_URL;
    break;
  case '2':
    $artist_url=BUSINESS_URL;
    break;
  default:
    $artist_url=WEB_URL;
    break;
}
$event_url=$artist_url.'/event';
$artist_url.='/artist';
$team=array_chunk($yahavi_details->teams, 3);

View::make('mobile/include/v1_header');


?>
<section id="content">
		<div class="aboutbanner-bg">
	        <div class="youtube-row">
	          <iframe width="1170" height="500" frameborder="0" allowfullscreen="" src="https://www.youtube-nocookie.com/embed/Ga7qzV3FzzY?rel=0&amp;controls=0&amp;showinfo=0"></iframe>
	        </div>
	    </div>

	    <div class="card cultertab-row">
	    	<ul class="cultertab clearfix">
	    		<li data-ref="company"  class="show_item active"><a id="company" href="javascript:void(0)">Company</a></li>
	    		<li data-ref="culture"  class="show_item"><a id="culture" href="javascript:void(0)">Culture</a></li>
	    		<li data-ref="team"  class="show_item"><a id="team" href="javascript:void(0)">Team</a></li>
	    		
	    		<li data-ref="news"  class="hide_item"><a id="news" href="javascript:void(0)"> &nbsp;&nbsp; News room</a></li>
	    		<li data-ref="testim"  class="hide_item"><a id="testimonial" href="javascript:void(0)">Testimonial</a></li>
	    	</ul>
	    	<span class="culter-doite">
	    		<i class="fa fa-angle-right"></i>
	    	</span>
	    </div>

	    <div data-cultertab="company" class="cultertab-article active">
	    	<div class="company-article card">
	    		<p>The journey from talent and creativity to recognition and fame has never been an easy one. The artist within us must navigate a maze of activities: creating content, showcasing artworks, connecting et al until our free spirit feels trapped in systems and business protocols. The internet is our generation’s obvious and omnipresent messiah, but it’s just as easy to be lost as it is to be found or be discovered on the web. This is where we, Yahavi, pop up.</p>
	    		<p>At Yahavi, we are working to create a one-stop platform, a smooth accession path that will not only help you discover the right opportunities week-in, week-out but also will help you connect directly with the right people, be they promoters, fans or audiences. The idea is to use technology as the enabler and provide you the access to all this on-the-go so that art takes the centre stage but managing it doesn’t.</p>
	    		<p>With a young team that has extensive experience across technology and management and has a strong passion for arts, we have our heart in the right place and the DNA to deliver. What we are working on right now is just the beginning</p>
	    	</div>
	    </div>

	    <div data-cultertab="culture" class="cultertab-article">
	    	<div class="card culturerowmain">
		    	<div class="culturerow">
			        <img alt="culture img" src="/assets/mobile/v1/img/culture.png">
			        <span class="culter-text1">Creative</span>
			        <span class="culter-text2">Friendly</span>
			        <span class="culter-text3">Fun</span>
			        <span class="culter-text4">Energetic</span>
			        <span class="culter-text5">Informal</span>
			        <span class="culter-text6">Youthful</span>
		      	</div>
	      	</div>
	    </div>

	    <div data-cultertab="team" class="cultertab-article">
	    	<div class="company-article">
	    		<ul class="teamlist">

	    		<?php 
	    			foreach ($yahavi_details->teams as $key => $value) { ?>
	    			<li class="card align-center">
	    				<img  src="<?=$value->pic?>" alt="img">
	    				<div class="team-heading">
	    					<span><?=$value->name?></span>
	    					<small><?=$value->designation?></small>
	    				</div>
	    			</li>
	    			<?php  } ?>
	    		</ul>
	    	</div>
	    </div>


	    <div data-cultertab="news" class="cultertab-article">
	    	<div class="newssection">
	    		<?php foreach ($yahavi_details->news as $key => $value) {?>

			    	<div class="item card">
		              <div class="crousel-content">
		                <img src="<?=WEB_URL.'/assets/yahavi_images/'.$value->pic?>" alt="Image" onError="this.onerror=null;this.src='/assets/images/yahavi_logo_large.png';"> 
		                <div class="crouselcontent-inner">
		                  <span><?=substr($value->news_head,0,40)?></span>
		                  <p><?=substr($value->content,0,100)?><?php
		                  	if ($value->link!='') {?>
		                  	...<br><a target="_blank" href="<?=$value->link?>">Read More</a>
		                  	<?php }
		                  	?></p>
		                </div>
		              </div>
		            </div>
	            <?php } ?>

	            
            </div>
	    </div>

	    <div data-cultertab="testim" class="cultertab-article">
	    	<div class="newssection">
	    	<?php foreach ($yahavi_details->testimonials as $key => $value) { ?>
		    	<div class="item card">
	              <div class="crousel-content">
	                <div class="crouselcontent-inner">
	                  <p><?=$value->content?> </p>
	                  <span style="color:#01b7ba"><?=$value->name?></span>
	                </div>
	              </div>
	            </div>
	        <?php  } ?>   
            </div>
	    </div>
	</section>
</div>

<?php
	View::make('mobile/include/v1_footer');
?>

<script type="text/javascript">
$(document).ready(function(){


// COMPNAY CULTER AND ACTION
 	$('.culter-doite').on('click', function(){
      var s_item=$('.show_item');
      var h_item=$('.hide_item');
      if(s_item.is(':visible')){
        s_item.fadeOut();
        h_item.fadeIn();
      }else{
        h_item.fadeOut();
        s_item.fadeIn();
      }
      if ($(this).find('i').hasClass('fa-angle-right')) {
        $(this).find('i').removeClass('fa-angle-right').addClass('fa-angle-left');
      }else{
        $(this).find('i').addClass('fa-angle-right').removeClass('fa-angle-left');
      }
    });

 	$('.cultertab li').on('click', function(){
 		$('.aboutus_li').find('li').removeClass('active-color');
 		var data=$(this).data('ref');
 		$('[data-ref]').removeClass('active');
 		$('[data-ref="'+data+'"]').addClass('active');
 		$('#'+data+'1').addClass('active-color');
 		$('[data-cultertab]').hide();
 		$('[data-cultertab="'+data+'"]').show();
 	});
 	$('#aboutus_id').addClass('activebg-menue');
 	$('#click_plus').trigger('click');


	
});
</script>

<script type="text/javascript">
var section="<?=$section?>";
$(document).ready(function(){
	$('#'+section).trigger('click');
	if(section=='news' || section=='testimonial'){
	$('.culter-doite').trigger('click');
	}
});

</script>
 </body>
</html>