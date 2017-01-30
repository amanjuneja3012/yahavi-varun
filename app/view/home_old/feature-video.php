<?php 
$videos=$data['videos']->videos;
$user=$data['user'];
@$form=$data['form'];
@$query=Input::get(array('art_category_id','artist_category_id','genre_id'));
$count=$data->count;
$tquery=Input::get();
if (!isset($tquery['art_category_id']) && (isset($tquery['genre_id']) || isset($tquery['artist_category_id']))) {
	unset($tquery['genre_id']);
	unset($tquery['artist_category_id']);
	header('location:/feature-video');
	die;
}
$uri=$data['static']['uri']?$data['static']['uri']:'/event';
$title='Featured Videos - Yahavi';
$desc=htmlspecialchars('Find out happening of events nearby you. Discover standup comedy, sufi, bollywood, rock, pop DJ night, jazz etc. events happening in your city.');
$head=[
'<meta name="Content-Type" content="text/html; charset=utf-8">',
'<meta name="description" content="'.$desc.'">',
'<meta property="og:title" content="'.$title.'">',
'<meta property="og:url" content="https://www.yahavi.com'.$uri.'">',
'<meta property="og:image" content="'.WEB_URL.'/assets/v1/img/facebook_share.png">',
'<meta property="og:description" content="'.$desc.'">',
'<meta property="og:type" content="article">',
'<meta property="og:site_name" content="yahavi.com">',
'<meta property="fb:app_id" content="1537332409822532">',
'<link rel="canonical" href="https://www.yahavi.com'.$uri.'">',
'<meta name="robots" content="noydir,noodp" />',
'<link rel="alternate" hreflang="en" href="https://www.yahavi.com'.$uri.'">',
'<link rel="publisher" href="https://plus.google.com/108957273343148298717">',
'<meta name="twitter:card" content="summary_large_image">',
'<meta name="twitter:site" content="@yahavidotcom">',
'<meta name="twitter:creator" content="@yahavidotcom">',
'<meta name="twitter:title" content="'.$title.'">',
'<meta name="twitter:description" content="'.$desc.'">',
'<meta name="twitter:image" content="'.WEB_URL.'/assets/v1/img/facebook_share.png">',
'<meta name="viewport" content="width=device-width, initial-scale=1.0">',
];
View::make('include/v1_header',array('title'=>$title,'headerKey'=>'event','head'=>$head));
?>
<style type="text/css">
	.mason-grid .grid-item .footer{
		border-top: 1px solid #f1f1f1;
		padding: 5px 10px;
		font-size: 12px;
	}
	.mason-grid .grid-item{
		cursor: default;
	}
	.overlay{
		background:rgba(0,0,0,0.54);
		position: fixed;
		left: 0;
		top:0;
		right: 0;
		bottom: 0;
		width: 100%;
		height: 100%;
		z-index: 999;
		display: none;
	}

	.overlay-loader{
		left: 0;
		right: 0;
		top: 0;
		bottom: 0;
		margin: auto;
		position: absolute;
		z-index: 1000;
		width:55px;
	}
	.btm0{
		bottom:0;
		top:auto !important;
	}
	footer{
		display: none;
	}
	.bookmark-grid{
		position: absolute;
		z-index: 5;
		left:5px;
		top:-5px;
		font-size:34px;
		color:#fe5b56;
	}
	.bookmark-grid:hover{
		color:#ff3029;
	}

	.feautre-section-banner{
		background:#ccc;
		margin-bottom: 15px;
	}

	.feauter-tile{
		float: left;
		width: 205px;
		background:#fff;
		box-shadow:1px 1px 5px rgba(0, 0, 0, 0.2);
		margin:0 20px 20px 0;
	}

	.feauter-tile-video{
		position: relative;
		padding-bottom: 56.25%; /* 16:9 */
		height:115px;
	}

	.feauter-tile-video iframe{
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}

	.feauter-tile-time{
		font-size:12px;
		color:#fff;
		padding:2px 3px;
		background:rgba(0,0,0,0.54);
		position: absolute;
		z-index:10;
		right:3px;
		bottom:3px;
	}
	.feauter-tile-time-left{
		font-size:12px;
		color:#fff;
		padding:2px 3px;
		background:rgba(0,0,0,0.54);
		position: absolute;
		z-index:10;
		left:3px;
		bottom:3px;
	}

	.feauter-tile-bottom{
		padding:0 5px 5px 5px;
		color:#434343;
	}

	.feauter-tile-bottom h5{
		margin:8px 0 3px;
		font-size: 14px;
		text-transform: capitalize;
		font-weight:600;
	}
	.feauter-tile-bottom p{
		margin:0px 0 5px;
		font-size: 12px;
	}
	.feauter-tile-bottom p a{
		color:#2f4b93;
	}

	.overlay-fixed{
  position: fixed;
  top: 0;
  left: 0;
  opacity: .9;
  height: 100%;
  width: 100%;
  display: none;
  z-index: 999;
  background: #000;
}
  .customemodoal{
    position: fixed;
    display: none;
    width: 90%;
    height: 90%;
    z-index: 999;
    cursor: pointer;
  }
  .customemodoal-inner{
    padding: 20px;
    position: absolute;
    left:0;
    top:0;
    right:0;
    bottom:0;
    margin: auto 20px;
    z-index: 3;
  }
  .customemodoal-inner img,.customemodoal-inner iframe{
    max-width: 90%;
    max-height: 95%;
    position: absolute;
    left:0;
    top:0;
    right:0;
    bottom:0;
    margin: auto;
    z-index: 3;
    border: 10px solid rgb(213, 213, 213);
    border-radius: 8px;
  }
  .customemodoal-inner iframe{
    width: 90%;
    height:95%;
  }
  .controls{
    color:#999;
    transform: translateY(-50%);
    top: 46.5%;
    position: relative;
  }
  .controls .left,.controls .right{
    width: 50px;
    height: 50px;
    cursor: pointer;
  }
  .controls .left.active,.controls .right.active{
    color:#fff;
  }
  .controls i{
    font-size: 50px;
  }
  .close{
    z-index: 9999;
    width: 36px;
    height: 36px;
    position: fixed;
    top: 2px;
    right: 10px;
    display: none;
    cursor: pointer;
  }
  .close i{
    color:#fff;
    font-size: 36px;
  }
  .yplay{
    position: absolute;
    width: 52px;
    height: 52px;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
  }
  .yplay i{
    font-size: 52px;
    color:rgba(255, 255, 255, 0.5);
  }
  .featurediv{
  	position: absolute;
  	left: 0;
  	top: 0;
  	z-index: 5;
  }
</style>


<section id="content">
	<div class="row filterbox">
		<div class="col s3">

		</div>
		<div class="col s9">

			<div class="multiple-select-box">
				<?php 
				if ($query['date']!='') {?>
				<span data-remove="dates1" data-value="<?=$query['date']?>" data-name="date" class="tagelm"><?=$query['date']?> <i class="fa fa-times" aria-hidden="true"></i></span>
				<?php }
				?>

				<form class="filter_tag" style="display:none" action="/feature-video">
					
				</form>
			</div>
		</div>
	</div>

	<div class="row zero-bottom-margin">
		<form class="filter_form">
			<div class="col s3 card" id="filter" style="position:fixed;top:62px;min-height:90%">
				<div class="allresult clearfix">
					<span style="font-size:22px" class="left"><h1 style="display:inline;margin:0;padding:0;font-size:22px">Featured Videos</h1>(<count id="vcount">0</count> Results)</span>
				</div>
				<div class="allresult clearfix">
					<h5 class="left">Filter by</h5>
					<a href="/feature-video"><span class="right btnclear">Clear all <i class="fa fa-times"></i></span></a>
				</div>

				<div class="filtersection-inner">
					<div class="filter-type">
						<span class="checkebox">
							<input type="checkbox" class="filtecheckbox" id="filter-art" checked="">
							<label for="filter-art">art category</label>
						</span>
					</div>

					<div class="filter-content" style="display:block;">

						<?php 
						foreach ($form->art_category as $key => $value) {?>

						<div class="filter-inner clearfix">
							<div class="left">
								<input class="with-gap filter-input" <?=$value->id==$query['art_category_id']?'checked="checked"':''?> name="art_category_id" value="<?=$value->id?>" type="radio" id="art_category_<?=$value->id?>">
								<label for="art_category_<?=$value->id?>"><?=$value->text?></label>
							</div>
						</div>

						<?php }

						?>
					</div>
				</div>

				<div class="filtersection-inner" <?=!count($form->artist_category)?'style="display:none"':''?>>
					<div class="filter-type">
						<span class="checkebox">
							<input type="checkbox" class="filtecheckbox" id="filter-artist" checked>
							<label for="filter-artist">artist category</label>
						</span>
					</div>
					<div class="filter-content" style="display:block;">
						<div class="filter-search">
							<label for="a3" class="label">Artist Category</label>
							<input type="text" placeholder="Search by artist category" id="a3">
						</div>

						<?php 
						foreach ($form->artist_category as $key => $value) {
							if ($key<4) { ?>
							<div class="filter-inner clearfix">
								<div class="left">
									<input type="checkbox" <?=in_array($value->id, $query['artist_category_id'])?'checked="checked"':''?> name="artist_category_id[]" value="<?=$value->id?>" class="filled-in filter-input" id="artist_category_<?=$value->id?>" data-artist-category-id="<?=$value->id?>">
									<label for="artist_category_<?=$value->id?>"><?=$value->text?></label>
								</div>
							</div>
							<?php }else{ ?>
							<div class="filter-inner clearfix" style="display:none">
								<div class="left">
									<input type="checkbox" <?=in_array($value->id, $query['artist_category_id'])?'checked="checked"':''?> name="artist_category_id[]" value="<?=$value->id?>" class="filled-in filter-input" id="artist_category_<?=$value->id?>" data-artist-category-id="<?=$value->id?>">
									<label for="artist_category_<?=$value->id?>"><?=$value->text?></label>
								</div>
							</div>
							<?php }
						}
						?>

						<div class="clearfix">
							<div class="filterbtn-row right">
								<span class="filterbtn-allview">view all <i class="fa fa-angle-right"></i></span>

								<div class="filterview-menu">
									<ul>
										<?php 
										foreach ($form->artist_category as $key => $value) {?>

										<li style="width:360px">
											<div class="left">
												<input type="checkbox" <?=in_array($value->id, $query['artist_category_id'])?'checked="checked"':''?> class="filled-in" id="artist_category2_<?=$value->id?>" data-artist-category-id="<?=$value->id?>">
												<label style="width:300px !important" for="artist_category2_<?=$value->id?>"><?=$value->text?></label>
											</div>
										</li>

										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="filtersection-inner" <?=!count($form->genre)?'style="display:none"':''?> >
					<div class="filter-type">
						<span class="checkebox">
							<input type="checkbox" class="filtecheckbox" id="filter-genre" <?=isset($query["genre_id"][0])?'checked="checked"':''?>>
							<label for="filter-genre">genre</label>
						</span>
					</div>
					<div class="filter-content" <?=isset($query["genre_id"][0])?'style="display:block"':''?>>
						<div class="filter-search">
							<input type="text" placeholder="Search by genre" id="a2">
						</div>

						<?php 
						foreach ($form->genre as $key => $value) {
							if ($key<4) { ?>
							<div class="filter-inner clearfix">
								<div class="left">
									<input type="checkbox" <?=in_array($value->id, $query['genre_id'])?'checked="checked"':''?> name="genre_id[]" value="<?=$value->id?>" class="filled-in filter-input" id="genre_<?=$value->id?>" data-genre-id="<?=$value->id?>">
									<label for="genre_<?=$value->id?>"><?=$value->text?></label>
								</div>
							</div>
							<?php }else{ ?>
							<div class="filter-inner clearfix" style="display:none">
								<div class="left">
									<input type="checkbox" <?=in_array($value->id, $query['genre_id'])?'checked="checked"':''?> name="genre_id[]" value="<?=$value->id?>" class="filled-in filter-input" id="genre_<?=$value->id?>" data-genre-id="<?=$value->id?>">
									<label for="genre_<?=$value->id?>"><?=$value->text?></label>
								</div>
							</div>
							<?php }
						}
						?>
						<div class="clearfix">
							<div class="filterbtn-row right">
								<span class="filterbtn-allview">view all <i class="fa fa-angle-right"></i></span>

								<div class="filterview-menu">
									<ul>
										<?php 
										foreach ($form->genre as $key => $value) {?>

										<li style="width:360px">
											<div class="left">
												<input type="checkbox" <?=in_array($value->id, $query['genre_id'])?'checked="checked"':''?> class="filled-in" id="genre2_<?=$value->id?>" data-genre-id="<?=$value->id?>">
												<label style="width:300px !important" for="genre2_<?=$value->id?>"><?=$value->text?></label>
											</div>
										</li>

										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		<div class="col s3">&nbsp;</div>
		<div class="col s9">

			<div class="feautre-section clearfix feature_video">


			</div>

			<div class="center-align">
				<button style="padding:0 .8rem; font-size:12px; margin:20px;" class="btnloder waves-effect waves-light btn"  id="load_more">Load More</button> 
			</div>  
		</div>
	</div>
</section>
</div>

<?php
View::make('/include/v1_footer');
?>
<div class="overlay-fixed"></div>
<div class="close">
        <i class="material-icons">close</i>
</div>
<div class="customemodoal">
    <div class="customemodoal-inner">
      <img src="/assets/images/ajax-circular.gif">
    </div>
    <div class="controls">
        <div class="right"><i class="material-icons">keyboard_arrow_right</i></div>
      </div>
      <div class="controls">
        <div class="left"><i class="material-icons">keyboard_arrow_left</i></div>
      </div>
</div>      
<script type="text/javascript">
	var query_token='<?=Helper::queryToken()?>';
	$(document).on('ready',function(){

		$('.mason-grid').masonry({
			itemSelector: '.grid-item',
			transitionDuration:0,
		});
		$("#load_more").trigger('click');
	})

	$(document).on('click','.grid-cta',function(event){
		$(this).children('a').toggleClass('artist-rating faved');
	});


	$('.btn-social').on('click', function(){
		$(this).parents('.event-cta, .cta').find('.social-popup').show();
	});
	$(document).on('click',function(event){
		if(!$(event.target).closest('.btn-social').length && !$(event.target).closest('.social-popup').length){
			$('.social-popup').hide();
		}
	});
</script>
<script type="text/javascript">
	$('.filtecheckbox').on('change', function(){
		var $this = $(this),
		$wrapper = $this.parents('.filtersection-inner').find('.filter-content');

		if($this.is(':checked')){
			$wrapper.slideDown();
		}else{
			$wrapper.slideUp();
		}
	});

	$('.filterbtn-row').hover(function(){
		$(this).find('.filterview-menu').clearQueue().fadeIn();
	}, function(){
		$(this).find('.filterview-menu').clearQueue().fadeOut();
	});

	$(".filter-search").find('input[type="text"]:first').keyup(function(e){
		val=$(this).val().trim();
		if (val=='') {
			$(this).parents('.filter-content').find('.filter-inner').removeClass('shown').removeClass('hidden');
			return false;
		};
		$(this).parents('.filter-content').find('.filter-inner').removeClass('shown').addClass('hidden');
		$(this).parents('.filter-content').find('label').filter( function (){
			return $( this ).text().toLowerCase().trim().indexOf( val.toLowerCase() ) == 0;
		}).parents('.filter-inner').slice(0,4).removeClass('hidden').addClass('shown');
	});

	$(".filter_form").find("input.filter-input").change(function(){
		$('.overlay').fadeIn('fast');
		$(".filter_form").submit();
	});

	$(".filter_form").submit(function(e){
		e.preventDefault();
		var query=$(this).find('input.filter-input').serialize();
		if ('<?=Input::get('type')?>'=='past') {
			query+='&type=past';
		}
		window.location.href='/feature-video?'+query;
	});
	$('[data-city-id]').change(function(){
		var checked=$(this).is(':checked')?true:false;
		$('[data-city-id="'+$(this).attr('data-city-id')+'"]').prop('checked',checked);
		$(".filter_form").submit();
	});

	$('[data-artist-category-id]').change(function(){
		var checked=$(this).is(':checked')?true:false;
		$('[data-artist-category-id="'+$(this).attr('data-artist-category-id')+'"]').prop('checked',checked);
		$(".filter_form").submit();
	});

	$('[data-genre-id]').change(function(){
		var checked=$(this).is(':checked')?true:false;
		$('[data-genre-id="'+$(this).attr('data-genre-id')+'"]').prop('checked',checked);
		$(".filter_form").submit();
	});

	$('[data-language-id]').change(function(){
		var checked=$(this).is(':checked')?true:false;
		$('[data-language-id="'+$(this).attr('data-language-id')+'"]').prop('checked',checked);
		$(".filter_form").submit();
	});

	$(".filter-input:checked").each(function(){
		var text=$(this).parent().find('label').text();
		var name=$(this).attr('name');
		var value=$(this).attr('value');
		var remove=name.replace('[','').replace(']','')+value;
		$(".multiple-select-box").append('<span data-remove="'+remove+'" data-name="'+name+'" data-val="'+value+'" class="tagelm">'+text+'<i class="fa fa-times" aria-hidden="true"></i></span>');
		$(".multiple-select-box").find('form').append('<input id="'+remove+'" type="hidden" name="'+name+'" value="'+value+'">');
	});
	$('[data-remove]').click(function(){
		$("#"+$(this).attr('data-remove')).remove();
		$(".filter_tag").submit();
	});
	$( "#datepicker" ).datepicker({dateFormat:'yy-mm-dd'});
	$('[name="date2"]').change(function(){
		val=$(this).val();
		if ($(this).is(':checked')) {
			$("#datepicker").val(val);
			$(".filter_form").submit();
		};
	});
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
	});
	$('body').append('<style>.scrollup {position: fixed;bottom: 40px;right: 40px;display: none;border-radius: 50%;border: 1px solid #ff5850;width: 50px;height: 50px;text-align: center;line-height: 50px;color: white;background-color: #ff5850;cursor: pointer;z-index: 999;}</style>');
	$('body').append('<span class="scrollup"><i class="fa fa-arrow-up"></i></span>');
	$(document).on('click','.scrollup',function () {
		$("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});
</script>
<script type="text/javascript">
	$(document).on('ready',function(){
		$(window).scroll(function() {
			var height=$(document).height() - $(window).height()-80;

			if($(window).scrollTop() >  height) {
				$('.loader').fadeIn(1000);
				$('#load_more').trigger('click');
			}
		});
	});



	access_token="<?=$_COOKIE['access_token']?>";
	var page=1;
	$(document).on('click','#load_more',function(){
		$(this).text('Loading..').attr('disabled','disabled');
		$.ajax({
			url: '<?=API_URL?>/video/feature?feature_v=1&page='+page+'<?=Input::get('type')?"&type=past":""?>&'+query_token+'&'+'<?=http_build_query($query)?>',
		}).done(function(data){
			result=$.parseJSON(data);
			if (result.success==1) {
				var html='';
				$.each(result.data.videos,function(i,v){
					html+=appendVideos(v);
				});
				$(".feature_video").append(html);
				$(".tooltipped").tooltip();


				$('#load_more').text('Load More').removeAttr('disabled');
				if (page==1) {
					$("#vcount").text(result.data.count);
				}
				page=page+1;
				if (result.data.videos==null) {
					$('#load_more').remove();
					return false;
				}
				if (result.data.videos.length<9) {
					$('#load_more').remove();
				};
			} else {
				$('#load_more').remove();
				if (page==1) {
					$(".feature_video").html('<p style="text-align:center">No relevent videos found</p>');
				}
			};
		})
	});
	function rand(min, max) {
		return Math.floor(Math.random() * (max - min + 1)) + min;
	}
	function appendVideos(v){
		var ribbon='';
		if(v.is_featured=='1'){
			ribbon='<span class="featurediv tooltipped" data-tooltip="Featured video" data-position="top"><img src="/assets/v1/img/ribbon3.png"></span>';
		}
		var thumb='https://cdn.yahavi.com/url?url='+v.thumb+'&d=205x115';
		return '<div class="feauter-tile">'+
		'<div class="feauter-tile-video">'+
		'<span class="feauter-tile-time">'+parseDuration(v.json.items[0].contentDetails.duration)+'</span>'+
		'<span class="feauter-tile-time-left tooltipped" data-tooltip="Views" data-position="top">'+v.json.items[0].statistics.viewCount+'</span>'+
		'<a class="image" data-type="'+v.type+'" data-id="'+v.id+'" href="#">'+
		'<img src="'+thumb+'">'+ribbon+
		'<div class="yplay"><i class="material-icons">play_circle_outline</i></div>'+
		'</a>'+
		'</div>'+
		'<div class="feauter-tile-bottom">'+
		'<h5 class="ellipsis" title="'+v.json.items[0].snippet.title+'">'+v.json.items[0].snippet.title+'</h5>'+
		'<p class="ellipsis">by <a href="/artist/'+v.artist_id+'">'+v.artist_name+'</a></p>'+
		'</div>'+
		'</div>'
	}
</script>
<script type="text/javascript">
	var ls=0;
	var scrollFix=function(){
		var st=$(window).scrollTop();
		var wh=$(window).height();
		var t=parseInt($("#filter").css('top').replace('px',''));
		var h=parseInt($("#filter").css('height').replace('px',''));
		var b=$("#filter").offset().top + $("#filter").outerHeight(true);
		$('body').css('min-height', h+200);
		if (h+t>wh/1.2 || (t<62 && ls-st>0)) {
			if (t+ls-st>62) {
				$("#filter").css('top', 62);  
			}else {
				$("#filter").css('top',t+ls-st);
			}

		}

		ls=st;
		if($(window).scrollTop() + $(window).height() == $(document).height()) {
			$("#filter").addClass('btm0');
		}else{
			$("#filter").removeClass('btm0');
		}
	}
	$(window).scroll(function() {
		scrollFix();
	});

function parseDuration(PT) {
  var output = [];
  var durationInSec = 0;
  var matches = PT.match(/P(?:(\d*)Y)?(?:(\d*)M)?(?:(\d*)W)?(?:(\d*)D)?T(?:(\d*)H)?(?:(\d*)M)?(?:(\d*)S)?/i);
  var parts = [
    { // years
      pos: 1,
      multiplier: 86400 * 365
    },
    { // months
      pos: 2,
      multiplier: 86400 * 30
    },
    { // weeks
      pos: 3,
      multiplier: 604800
    },
    { // days
      pos: 4,
      multiplier: 86400
    },
    { // hours
      pos: 5,
      multiplier: 3600
    },
    { // minutes
      pos: 6,
      multiplier: 60
    },
    { // seconds
      pos: 7,
      multiplier: 1
    }
  ];
  
  for (var i = 0; i < parts.length; i++) {
    if (typeof matches[parts[i].pos] != 'undefined') {
      durationInSec += parseInt(matches[parts[i].pos]) * parts[i].multiplier;
    }
  }
  
  // Hours extraction
  if (durationInSec > 3599) {
    output.push(parseInt(durationInSec / 3600));
    durationInSec %= 3600;
  }
  // Minutes extraction with leading zero
  output.push(('0' + parseInt(durationInSec / 60)).slice(-2));
  // Seconds extraction with leading zero
  output.push(('0' + durationInSec % 60).slice(-2));
  
  return output.join(':');
};
</script>
<script type="text/javascript">
var currId=false;
var currType=false;
$(document).on('click','[data-type="image"],[data-type="yt"],[data-type="sc"]',function(e){
  e.preventDefault();
  if (!$(this).attr('data-id')) {return false;};
  var currId=parseInt($(this).attr('data-id'))+1;
  var type=$(this).attr('data-type');
  currType=type;
  openGallery();
  slideGallery(currId,type,1);
});
function slideGallery(id,type,dir){
  $('.customemodoal-inner').html('<img src="/assets/images/ajax-circular.gif">');
  var url='<?=API_URL?>/video/'+id+'/next?dir='+dir+'&type='+type+'&'+query_token;
  $.ajax({
    url: url,
  }).done(function(data) {
    var result=$.parseJSON(data);
    if (!result.success==1) {
      closeGallery();
      alert('Some problem occured');
      return false;
    };
    if (!result.data.id) {
      closeGallery();
      alert('No Item found');
      return false;
    };
    currId=result.data.id;
    if (type=='image') {
      var image = new Image();
      image.src = result.data.image;
      image.onload=function(){
        $('.customemodoal-inner').html('<img src="'+image.src+'">');
      }
    } else if(type=='yt' || type=='sc'){
      var src=result.data.src;
      if (type=='yt') {
       src+='?autoplay=1&modestbranding=1';
      }
      $('.customemodoal-inner').append('<iframe allowfullscreen style="display:none" src="'+src+'"></iframe>');
      $('.customemodoal-inner').find('iframe').load(function(){
        $('.customemodoal-inner').find('img').remove();
        $(this).show();
      });
    }
  }); 
}
function closeGallery(){
  $('.overlay-fixed,.close,.customemodoal').hide();
  $('.controls').find('.left,.right').removeClass('active');
  $('.customemodoal-inner').html('<img src="/assets/images/ajax-circular.gif">');
  currType=false;
  currId=false;
}
function openGallery(){
  var w = ($(window).width() - $('.customemodoal').width())/2,h = ($(window).height() - $('.customemodoal').height())/2;
  $('.overlay-fixed,.close').show();
  $('.customemodoal-inner').html('<img src="/assets/images/ajax-circular.gif">');
  $('.customemodoal').css({left:w,top:h}).show();
}
 $('.customemodoal').mousemove(function(e) {
    if (!$('.customemodoal').is(':visible')) {
      return false;
    }
   var pWidth=$('.customemodoal').width();
   var x = e.pageX;
    if(pWidth/2 > x){
      $('.controls').find('.left').addClass('active');
      $('.controls').find('.right').removeClass('active');
    }else{
      $('.controls').find('.right').addClass('active');
      $('.controls').find('.left').removeClass('active');  
    }
  });
  $('.customemodoal').mouseleave(function() {
    $('.controls').find('.left,.right').removeClass('active');
  });
$('.close').click(function(e) {
    closeGallery();
});

$('.customemodoal').click(function() {
  if ($('.controls .right').hasClass('active')) {
    var dir=1;
  }else{
    var dir=0;
  };
  slideGallery(currId,currType,dir);
});
$(document).keyup(function(e) {
  if (!$('.customemodoal').is(':visible')) {
      return false;
    }
    if (e.which=='39') {
      var dir=1;
    } else if(e.which=='37'){
      var dir=0;
    }else if(e.which=='27'){
      closeGallery();
      return false;
    }else{
      return false;
    }
    slideGallery(currId,currType,dir);
});
</script>
</body>
</html>
