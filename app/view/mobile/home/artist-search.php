<?php 
@$artists=$data['artists']->result;
//Helper::pre($artists);die();
@$user=$data['user'];
@$form=$data['form'];
@$cityIndex=null;
@$query=Input::get(array('search','city_id','locality_id','rating_min','rating_max','fan_min','fan_max','date','genre_id','tribute_id','sort','art_category_id','artist_category_id','specialization_id','language_id','with_m'));
$tquery=Input::get();
if (!isset($tquery['art_category_id']) && (isset($tquery['genre_id']) || isset($tquery['artist_category_id']) && !isset($tquery['with_m']))) {
  unset($tquery['genre_id']);
  unset($tquery['artist_category_id']);
  unset($tquery['with_m']);
  header('location:/artist?'.http_build_query($tquery));
  die;
}
@$count=$data['artists']->count;
switch (@$_COOKIE['user_type']) {
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
@$event_url=$artist_url.'/event';
@$artist_url.='/artist';

View::make('/mobile/include/v1_header',array('headerKey'=>'artist'));
?>
<style type="text/css">
  ul.select li.active{
    background: #01a2a5;
  }
  .rating li.active a span + span{
    color: #fff;
  }
  .rating li a span + span{
    color: #6e6e6e;
    font-size: 14px;
  }
  li.active a{
    color:#fff !important;
  }
  .hidden{
    display: none !important;
  }
  .featurediv{
    position: absolute;
    left: 0;
    top: 0;
    z-index: 5;
  }
</style>
<style type="text/css">
  footer{
    display: none;
  }
</style>
<section id="content">		
	<section  class="listing_section">
    <div style="margin-left:-7px">
  		<div class="row">
  			<div class="col s12 listingbox-row append_artist">

  			<?php foreach ($artists as $key => $value) { ?>
          <style>
            .no-result{
                  display: none;
                }
          </style>
  				<div class="owlcontrol1">
  					<div class="item card">
            <a href="/artist/<?=$value->id?>">
                  <div><img src="<?=$value->profile_pic?>?d=146x146">
                    <?php 
                if ($value->is_lfeatured) {?>
                  <span class="featurediv tooltipped" data-tooltip="Featured artist" data-position="top">
                 
                  <img src="/assets/v1/img/ribbon3.png">
                </span>
                <?php }
                ?>
                  </div>
                  </a>
  						
  						<div class="m-follow srtist-following <?=$value->is_fan>0?'active':''?>" data-id="<?=$value->id?>" data-fan="<?=$value->fan_count?>">
  							<i class="fa fa-heart" aria-hidden="true"></i>
  							<small>
  								<?php
  								if($value->fan_count>1000){
  									$value->fan_count=round($value->fan_count/1000,1).'k';
  								}
  								?>
  								<?=$value->fan_count?>
  							</small>
  						</div>
  						<div class="event-carousel-content">
  							<a href="/artist/<?=$value->id?>"><h4 class="wrap ellipsis"><?=$value->name?></h4></a>
  							<ul class="wrap">
  								<li class="ellipsis"><?=$value->artist_category?></li>
  							</ul>
  						</div>
  					</div>
  				</div>
  			<?php } ?>
        <p class="no-result" style="font-size:18px">No results Found In Artist</p>
  			</div>
        <?php 
            if ($count>9) {?>
            <div class="center-align event-controls">
              <button class="btn"  id="load_more" style="background:rgb(1, 162, 165)">Load More</button> 
            </div>  
            <?php }
            ?>
  		</div>
    </div>
	</section>

</section>
</div>

<?php 

View::make('/mobile/include/v1_footer');

?>

<div class="main_filter">
  <div class="z-depth-3 filter-toggle"><i class="fa fa-filter" aria-hidden="true"></i></div>

    <div class="filter-panel">
      <div class="filter-panel-head"><a class="filter-toggle"><i class="fa fa-arrow-left"></i></a></div>
      <div class="categories">
        <ul>
          <li data-ref="presentation1" class="active">
            <a href="javascript:void(0)">City <span>0</span></a>
          </li>

          <li data-ref="presentation11">
            <a href="javascript:void(0)">Profiles with <span>0</span></a>
          </li>
          <li data-ref="presentation2">
            <a href="javascript:void(0)">Art Category <span>0</span></a>
          </li>
          <li data-ref="presentation3">
            <a href="javascript:void(0)">Artist Category <span>0</span></a>
          </li>
          <li data-ref="presentation4">
            <a href="javascript:void(0)">Genre <span>0</span></a>
          </li>
          <li data-ref="presentation40">
            <a href="javascript:void(0)">Tributes <span>0</span></a>
          </li>
          <li data-ref="presentation5">
            <a href="javascript:void(0)">Performance Language <span style="margin-right:27px;">0</span></a>
          </li>
          <li data-ref="presentation6">
            <a href="javascript:void(0)">Rating <span>0</span></a>
          </li>
        </ul>
      </div>
      <div class="values">
      <div class="tab-content">

        <div data-filcontent="presentation1" class="tab-pane active">
          <div class="search-inner filter-search">
            <input type="text" placeholder="Search">
            <button type="button" class="input-group-addon">
            <i class="fa fa-search"></i>
            </button>
            </div>
            <ul class="city select" data-multiple="0">
              <?php 
              foreach ($form->city as $key => $value) {?>
                <li name="city_id" class="<?=$value->id==$tquery['city_id']?' active ':''?>" value="<?=$value->id?>"><a href="#" data-index="0"><?=$value->text?></a></li>
              <?php } ?>
            </ul>
          </div>
          <div data-filcontent="presentation11" class="tab-pane">
          <div class="search-inner filter-search">
            <input type="text" placeholder="Search">
            <button type="button" class="input-group-addon">
            <i class="fa fa-search"></i>
            </button>
            </div>
            <ul class="city select" data-multiple="0">
                <li name="with_m" class="<?=$tquery['with_m']=='1'?' active ':''?>" value="1"><a href="javascript:void(0)" data-index="0">Audio/Video</a></li>
            </ul>
          </div>

          <div data-filcontent="presentation2" class="tab-pane">
            <div class="search-inner filter-search">
              <input type="text" placeholder="Search">
            <button type="button" class="input-group-addon">
            <i class="fa fa-search"></i>
            </button>
            </div>
            <ul data-multiple="0" class="select art_category">
              <?php 
              foreach ($form->art_category as $key => $value) {?>
                <li class="<?=$value->id==$tquery['art_category_id']?' active ':''?>" name="art_category_id" value="<?=$value->id?>"><a href="#" data-index="0"><?=$value->text?></a></li>
              <?php } ?>
            </ul>
          </div>

          <div data-filcontent="presentation3" class="tab-pane">
            <div class="search-inner filter-search">
              <input type="text" placeholder="Search">
            <button type="button" class="input-group-addon">
            <i class="fa fa-search"></i>
            </button>
            </div>
            <ul data-multiple="1" class="select artist_category">
              
            </ul>
          </div>

          <div data-filcontent="presentation4" class="tab-pane">
            <div class="search-inner filter-search">
              <input type="text" placeholder="Search">
            <button type="button" class="input-group-addon">
            <i class="fa fa-search"></i>
            </button>
            </div>
            <ul data-multiple="1" class="select genre">
              
            </ul>
          </div>
          <div data-filcontent="presentation40" class="tab-pane">
            <div class="search-inner filter-search">
              <input type="text" placeholder="Search">
              <button type="button" class="input-group-addon">
                <i class="fa fa-search"></i>
              </button>
            </div>
            <ul data-multiple="1" class="select tribute">
              <?php 
              foreach ($form->tributeall as $key => $value) {?>
                <li class="<?=in_array($value->id,$tquery['tribute_id'])?' active ':''?>" name="tribute_id[]" value="<?=$value->id?>"><a href="#" data-index="0"><?=$value->text?></a></li>
                <?php } ?>
              </ul>
          </div>

         <div data-filcontent="presentation5" class="tab-pane">
            <div class="search-inner filter-search">
              <input type="text" placeholder="Search">
            <button type="button" class="input-group-addon">
            <i class="fa fa-search"></i>
            </button>
            </div>
            <ul data-multiple="1" class="select language">
              <?php 
              foreach ($form->language as $key => $value) {?>
                <li name="language_id[]" class="<?=in_array($value->id, $tquery['language_id'])?' active ':''?>" value="<?=$value->id?>"><a href="#" data-index="0"><?=$value->text?></a></li>
              <?php } ?>
            </ul>
          </div>

          

          <div data-filcontent="presentation6" class="tab-pane">
          
            <ul data-multiple="0" class="select rating">
              <li name="rating_min" value="1" <?=$tquery['rating_min']==1?' active ':''?>>
                <a href="#" data-index="0"><span class="filterreating-row"><i class="fa fa-star"></i></span><span>&amp; above</span></a>
              </li>
              <li name="rating_min" value="2" class="<?=$tquery['rating_min']==2?' active ':''?>">
                <a href="#" data-index="0"><span class="filterreating-row"><i class="fa fa-star"></i><i class="fa fa-star"></i></span><span>&amp; above</span></a>
              </li>
              <li name="rating_min" value="3" class="<?=$tquery['rating_min']==3?' active ':''?>">
                <a href="#" data-index="0"><span class="filterreating-row"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><span>&amp; above</span></a>
              </li>
              <li name="rating_min" value="4" class="<?=$tquery['rating_min']==4?' active ':''?>">
                <a href="#" data-index="0"><span class="filterreating-row"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><span>&amp; above</span></a>
              </li>
              <li name="rating_min" value="5" class="<?=$tquery['rating_min']==5?' active ':''?>">
                <a href="#" data-index="0"><span class="filterreating-row"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></a>
              </li>
            </ul>
          </div>

        </div>
    </div>

      <div class="buttons">
        <button class="btn btn-default btn-reset">Reset</button>
        <button class="btn btn-apply">Apply</button>
      </div>
  </div>
</div>

<script type="text/javascript">
var query_token='<?=Helper::queryToken()?>';
access_token="<?=$_COOKIE['access_token']?>";
var tquery=<?=json_encode($tquery)?>;
console.log(tquery);
var page=2;
    $(document).on('click','#load_more',function(){
        $(this).text('Loading..').attr('disabled','disabled');
        $.ajax({
            url: '<?=API_URL?>/artist/page/'+page+'?limit=9&'+query_token+'&'+'<?=http_build_query($query)?>',
        }).done(function(data){
            result=$.parseJSON(data);
            if (result.success==1) {
                html='';
              $.each(result.data.result,function(i,v){
                html+=append_artist(v);
              });

              /*$(html).imagesLoaded().done(function(){
                $(".append_artist").append($(html));
              });*/
        $(".append_artist").append($(html));
            $('#load_more').text('Load More').removeAttr('disabled');
            page=page+1;
            if (result.data.result.length<9) {
              $('#load_more').remove();
            };
            } else {
              $('#load_more').remove();
            };
        })
    });
function append_artist(v){
	var fan_count;
  if(v.is_fan>0){
        str="active";
    }else{
        str='';
    }
    if(v.fan_count>1000){
    	fan_count=Math.round(v.fan_count/1000)+'k';
    }else{
    	fan_count=v.fan_count;
    }
    var lfeatured='';
    if (v.is_lfeatured==1) {
     lfeatured='<span class="featurediv tooltipped" data-tooltip="Featured artist" data-position="top"><img src="/assets/v1/img/ribbon3.png"></span>';
    }
    
    return '<div class="owlcontrol1">'+
						'<div class="item card">'+
							'<div><img src="'+v.profile_pic+'?d=146x146">'+lfeatured+'</div>'+
							'<div class="m-follow srtist-following '+str+'" data-id="'+v.id+'" data-fan="'+v.fan_count+'">'+
								'<i class="fa fa-heart" aria-hidden="true"></i>'+
								'<small>'+fan_count+'</small>'+
							'</div>'+
							'<div class="event-carousel-content">'+
								'<a href="/artist/'+v.id+'"><h4 class="wrap ellipsis">'+v.name+'</h4></a>'+
								'<ul class="wrap">'+
									'<li class="ellipsis">'+v.artist_category+'</li>'+
								'</ul>'+
							'</div>'+
						'</div>'+
					'</div>';
}

$(document).on('ready',function(){
  $(window).scroll(function() {
    var height=$(document).height() - $(window).height()-330;

    if($(window).scrollTop() >  height) {
      $('.loader').fadeIn(1000);
      $('#load_more').trigger('click');
    }
  });
});
</script>
<script type="text/javascript">
  $(document).on("click",".select li" ,function(){
    var parent=$(this).parents('ul');
    console.log(parent.attr('data-multiple'));
    if (parent.attr("data-multiple")==0) {
      $(this).siblings().removeClass('active');
    }
    $(this).toggleClass('active');
    parent.trigger("change");
  });

  $("ul").change(function(){
    var t=$(this).find('li.active').length;
    var e=$('[data-ref="'+$(this).parents(".tab-pane").attr('data-filcontent')+'"]').find('span');
    e.text(t);
    if (t>0) {
      e.show();
    }else{
      e.hide();
    };
  });

  $(".art_category").change(function(){
    var id=$(this).find('li.active').val();

    $(".genre,.artist_category").find('li').remove();
    $(".genre,.artist_category").trigger("change");
    
    $.ajax({
      url: '<?=API_URL?>/form/art_category/'+id+'/artist_category?filter=artist&'+query_token,
    })
    .done(function(data) {
      var result=$.parseJSON(data);
      var html='';
      $.each(result.data,function(i,v) {
        var active=$.inArray(v.id, tquery.artist_category_id)>=0?' active ':'';
        html+='<li name="artist_category_id[]" value="'+v.id+'" class="'+active+'"><a href="#" data-index="0">'+v.text+'</a></li>';
      });
      $(".artist_category").html(html).trigger("change");
    })

    $.ajax({
      url: '<?=API_URL?>/form/art_category/'+id+'/genre?filter=artist&'+query_token,
    })
    .done(function(data) {
      var result=$.parseJSON(data);
      var html='';
      $.each(result.data,function(i,v) {
        var active=$.inArray(v.id, tquery.genre_id)>=0?' active ':'';
        html+='<li name="genre_id[]" value="'+v.id+'" class="'+active+'"><a href="#" data-index="0">'+v.text+'</a></li>';
      });
      $(".genre").html(html).trigger("change");

    })    
  });
  $(document).ready(function(){
    $(".art_category,.language,.rating").trigger("change");
  });
  $(".btn-apply").click(function() {
    var query='';
    $(".select li.active").each(function(index, el) {
      query+=$(this).attr('name')+'='+$(this).val()+'&';
    });
    if ('<?=Input::get("search")?>'!='') {
      query+='search='+'<?=Input::get("search")?>';
    }
    window.location.href='/artist?'+query;
  });
  $(".btn-reset").click(function() {
    if ('<?=Input::get("search")?>'!='') {
     window.location.href='/artist?search='+'<?=Input::get("search")?>'; 
    }else{
      window.location.href='/artist';
    }
  });

  $('.tab-pane input').keyup(function(){
    var val=$(this).val().trim();
     $(".select li").removeClass('hidden');
    if (val=='') {
     return false;
    };
    $(this).parents('.tab-pane').find(".select li").filter(function(){
      return !$(this).find("a").text().toLowerCase().indexOf(val.toLowerCase())==0;
    }).addClass("hidden");
  });
  $(".tab-pane ul").trigger('change');
  $('#artists_id').addClass('activebg-menue');
</script>
</body>
</html>











