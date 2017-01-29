<?php 
$events=$data['events']->events;
$user=$data['user'];
@$form=$data['form'];
$cityIndex=null;
@$query=Input::get(array('search','city_id','locality_id','rating_min','rating_max','fan_min','fan_max','date','genre_id','sort','art_category_id','artist_category_id','specialization_id','language_id','date','cost','is_yahavi'));
$count=$data['events']->count;
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
$event_url=$artist_url.'/event';
$artist_url.='/artist';


$tquery=Input::get();
if (!isset($tquery['art_category_id']) && (isset($tquery['genre_id']) || isset($tquery['artist_category_id']))) {
  unset($tquery['genre_id']);
  unset($tquery['artist_category_id']);
  header('location:/event?'.http_build_query($tquery));
  die;
}
$uri=$data['static']['uri']?$data['static']['uri']:'/event';
$title=$data['static']['title']?$data['static']['title']:'Event - Discover events in Delhi/NCR, Bangalore, Mumbai, Kolkata, Chennai, Hyderabad - Yahavi';
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
  .event-following {
    cursor: pointer;
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
            
            <form class="filter_tag" style="display:none" action="/event">
              <?php if ($query['date']!='') {?>
            <label for="dates1" class="label">Date</label>
            <input type="hidden" name="date" value="<?=$query['date']?>" id="dates1">
          <?php }
          ?>
            </form>
          </div>
        </div>
      </div>

    <div class="row zero-bottom-margin">
      <form class="filter_form">
        <div class="col s3 card" id="filter" style="position:fixed;top:62px">
          <div class="allresult clearfix">
            <span style="font-size:22px" class="left"><?=Input::get('type')=='past'?'Past <h1 style="display:inline;margin:0;padding:0;font-size:22px">Events</h1>':'Upcoming <h1 style="display:inline;margin:0;padding:0;font-size:22px">Events</h1>'?> (<?=$data['events']->count?:'0'?> Results)</span>
            </div>
            <div class="allresult clearfix">
               <h5 class="left">Filter by</h5>
              <a href="/event"><span class="right btnclear">Clear all <i class="fa fa-times"></i></span></a>
            </div>

            <div class="filtersection-inner">
              <div class="filter-type">
                  <span class="checkebox">
                    <input type="checkbox" class="filtecheckbox" id="filter-city" checked>
                    <label for="filter-city">CITY</label>
                  </span>
              </div>

              <div class="filter-content" style="display:block;">
                <div class="filter-search">
                <label for="city_search" class="label">City</label>
                  <input type="text" placeholder="Search by city" id="city_search">
                </div>

                
                <?php 
                foreach ($form->city as $key => $value) {
                  if ($key<4) { ?>
                    <div class="filter-inner clearfix">
                      <div class="left">
                        <input  class="with-gap filter-input" <?=$value->id==$query['city_id']?'checked="checked"':''?>  name="city_id" type="radio" id="city_<?=$value->id?>" value="<?=$value->id?>" data-city-id="<?=$value->id?>">
                        <label for="city_<?=$value->id?>"><?=$value->text?></label>
                      </div>
                    </div>
                  <?php }else{ ?>
                  <div class="filter-inner clearfix" style="display:none">
                      <div class="left">
                        <input class="with-gap filter-input" <?=$value->id==$query['city_id']?'checked="checked"':''?>  name="city_id" type="radio" id="city_<?=$value->id?>" value="<?=$value->id?>" data-city-id="<?=$value->id?>">
                        <label for="city_<?=$value->id?>"><?=$value->text?></label>
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
                        foreach ($form->city as $key => $value) {?>
                        <li>
                          <div class="left">
                            <input class="with-gap" name="group1"  <?=$value->id==$query['city_id']?'checked="checked"':''?> type="radio" id="city2_<?=$value->id?>" data-city-id="<?=$value->id?>">
                            <label for="city2_<?=$value->id?>"><?=$value->text?></label>
                          </div>
                        </li>  
                        <?php }
                        ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="filtersection-inner">
          <div class="filter-type">
              <span class="checkebox">
                <input type="checkbox" class="filtecheckbox" id="filterevent-date" checked>
                <label for="filterevent-date">event date</label>
              </span>
          </div>

          <div class="filter-content" style="display:block;">
            <div class="filter-search">
              <label for="datepicker" class="label">Date</label>
              <input type="text" placeholder="Select Date" id="datepicker" readonly="true" class="filter-input" name="date" value="<?=$query['date']?>">
            </div>

            <div class="filter-inner clearfix">
              <div class="left">
                <input class="with-gap" name="date2" type="radio" <?=$query['date']==date('Y-m-d',strtotime("+0 day",time()))?'checked="checked"':''?> id="filterevent1" value="<?=date('Y-m-d',strtotime("+0 day",time()))?>">
                <label for="filterevent1"><?=date('d M,Y',strtotime("+0 day",time()))?></label>
              </div>
              
            </div>
            <div class="filter-inner clearfix">
              <div class="left">
                <input class="with-gap" name="date2" type="radio" <?=$query['date']==date('Y-m-d',strtotime("+1 day",time()))?'checked="checked"':''?> id="filterevent2" value="<?=date('Y-m-d',strtotime("+1 day",time()))?>">
                <label for="filterevent2"><?=date('d M,Y',strtotime("+1 day",time()))?></label>
              </div>
            </div>
            <div class="filter-inner clearfix">
              <div class="left">
                <input class="with-gap" name="date2" type="radio" <?=$query['date']==date('Y-m-d',strtotime("+2 day",time()))?'checked="checked"':''?> id="filterevent3" value="<?=date('Y-m-d',strtotime("+2 day",time()))?>">
                <label for="filterevent3"><?=date('d M,Y',strtotime("+2 day",time()))?></label>
              </div>
            </div>
            <div class="filter-inner clearfix">
              <div class="left">
                <input class="with-gap" name="date2" type="radio" <?=$query['date']==date('Y-m-d',strtotime("+3 day",time()))?'checked="checked"':''?> id="filterevent4" value="<?=date('Y-m-d',strtotime("+3 day",time()))?>">
                <label for="filterevent4"><?=date('d M,Y',strtotime("+3 day",time()))?></label>
              </div>
            </div>
          </div>
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

            <div class="filtersection-inner">
          <div class="filter-type">
              <span class="checkebox">
                <input type="checkbox" class="filtecheckbox" id="filterevent-type" checked>
                <label for="filterevent-type">event type</label>
              </span>
          </div>

          <div class="filter-content" style="display:block;">
            <div class="filter-inner clearfix">
              <div class="left">
                <input class="with-gap filter-input" name="is_yahavi" type="radio" id="filtereventy1" value="1" <?=$query['is_yahavi']=='1'?'checked':''?>>
                <label for="filtereventy1">Yahavi Events</label>
              </div>
              
            </div>
            <div class="filter-inner clearfix">
              <div class="left">
                <input class="with-gap filter-input" name="is_yahavi" type="radio" id="filtereventn2" value="0" <?=$query['is_yahavi']=='0'?'checked':''?>>
                <label for="filtereventn2">Other Events</label>
              </div>
            </div>
          </div>
        </div>
            
            <div class="filtersection-inner" style="display:none">
          <div class="filter-type clearfix">
            <span class="checkebox">
              <input type="checkbox" class="filtecheckbox" id="filter-cost" checked>
              <label for="filter-cost">cost for two</label>
            </span>
          </div>

          <div class="filter-content" style="display:block">
            <div class="filter-inner clearfix">
              <div class="left">
                <input type="radio" name="cost" class="with-gap filter-input" id="filtercost1" <?=$query['cost']=='0-500'?'checked':''?> value="0-500">
                <label for="filtercost1">Less than &#8377; 500</label>
              </div>
              
            </div>
            <div class="filter-inner clearfix">
              <div class="left">
                <input type="radio" name="cost" class="with-gap filter-input" id="filtercost2" <?=$query['cost']=='500-1000'?'checked':''?> value="500-1000">
                <label for="filtercost2">&#8377; 500 - &#8377; 1000 </label>
              </div>
              
            </div>
            <div class="filter-inner clearfix">
              <div class="left">
                <input type="radio" name="cost" class="with-gap filter-input" id="filtercost3" <?=$query['cost']=='1000-1500'?'checked':''?> value="1000-1500">
                <label for="filtercost3">&#8377;1000 - &#8377; 1500</label>
              </div>
              
            </div>
            <div class="filter-inner clearfix">
              <div class="left">
                <input type="radio" name="cost" class="with-gap filter-input" id="filtercost4" <?=$query['cost']=='2000-5000'?'checked':''?> value="2000-5000">
                <label for="filtercost4">&#8377; 2000 - &#8377; 5000</label>
              </div>
              
            </div>
            <div class="filter-inner clearfix">
              <div class="left">
                <input type="radio" name="cost" class="with-gap filter-input" id="filtercost5" <?=$query['cost']=='5000'?'checked':''?> value="5000">
                <label for="filtercost5">more than &#8377; 5000 above</label>
              </div>
              
            </div>
          </div>
        </div>
        </div>
        </form>


      
      <div class="col s3">&nbsp;</div>
      <div class="col s9">
        <div class="right-align">
          <a href="/bookartist" target="_blank" style="position: relative;">
            <i class="fibernew">New</i>
            <button class="btnloder waves-effect waves-light btn btn-list">List an Event</button>
          </a>
          <a href="/event<?=Input::get('type')=='past'?'':'?type=past'?>" target="_blank">
            <button class="btnloder waves-effect waves-light btn btn-list"><?=Input::get('type')=='past'?'Upcoming Events':'Past Events'?></button>
          </a>
        </div>

        <div class="mason-grid mason-artist-tile">

        <?php foreach ($events as $key => $value) { 
            $h=rand(200,300);
            $sh=$h+92;
            if ($value->view_count>=1000) {
              $value->view_count=round($value->view_count/1000,1).'k';
            }
          ?>
          
        <div class="grid-item" style="width:205px;height:<?=$sh?>px">
            <div class="image grid-image">
              <?php 
              if ($value->is_yahavi==1) {?>
              <a class="tooltipped bookmark-grid" data-position="top" data-delay="50" data-tooltip="Yahavi event">
                <i class="fa fa-bookmark" aria-hidden="true"></i>
              </a>
              <?php } ?>
              <a href="/event/<?=$value->slug?>" target="_blank">
              <img onError="this.onerror=null;this.src='https://cdn.yahavi.com/content/images/logod.png?d=205x<?=$h?>';" style="min-height:<?=$h?>px" src="<?=$value->event_image?>?d=205x<?=$h?>" alt="<?=$value->name?>" class="img-responsive"></a>
              <span class="viewcurrent"><?=$value->view_count?> views</span>
            </div>

            <div class="grid-cta">
              <a class="event-following <?=!empty($value->is_follow)?'artist-rating faved':''?>" data-id="<?=$value->id?>">
                <span class="icon smooth-transition"><i class="fa fa-heart"></i></span>
                <span class="count smooth-transition follow_count"><?=$value->event_follow_count?></span>
              </a>
            </div>
            <?php 
            $artist_name='';
            if (sizeof($value->artists)) {
              foreach ($value->artists as $key => $value1) {
                $artist_name.='<a style="color:#2f4b93" href="/artist/'.$value1->id.'">'.$value1->name.'</a>,';
              }
              $artist_name=rtrim($artist_name,',');
            }
            ?>
            <div class="grid-data" >
              <a href="/event/<?=$value->slug?>" target="_blank"><h3 class="ellipsis" title="<?=$value->name?>"><?=$value->name?></h3></a>
              <h4 class="ellipsis" style="margin-top:5px"><?=$artist_name?> <?=$value->other_artists?></h4>
              <div class="footer">
                <div class="ellipsis"><?=$value->venue_name?></div>
                <div class="grid-item-time" style="font-weight:600;"><i class="fa fa-calendar"></i><span>&nbsp;</span><?=date('d-M-y ,  h:i A',strtotime($value->t_from))?></div>
              </div>
            </div>
          </div>

       <?php   }   ?>
        </div>

        <?php 
          if ($count>9) {?>
          <div class="center-align">
            <button style="padding:0 .8rem; font-size:12px; margin:20px;" class="btnloder waves-effect waves-light btn"  id="load_more">Load More</button> 
          </div>  
          <?php }
          ?>

      </div>

  </div>
  </section>
</div>

<?php
View::make('/include/v1_footer');
?>

<script type="text/javascript">
var query_token='<?=Helper::queryToken()?>';
  $(document).on('ready',function(){

  $('.mason-grid').masonry({
      itemSelector: '.grid-item',
      transitionDuration:0,
    });
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
    window.location.href='/event?'+query;
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
var page=2;
    $(document).on('click','#load_more',function(){
        $(this).text('Loading..').attr('disabled','disabled');
        $.ajax({
            url: '<?=API_URL?>/admin/event/?page='+page+'<?=Input::get('type')?"&type=past":""?>&'+query_token+'&'+'<?=http_build_query($query)?>',
        }).done(function(data){
            result=$.parseJSON(data);
            if (result.success==1) {
                html='';
              $.each(result.data.events,function(i,v){
                html+=append_artist(v);
              });
              var mhtml=$(html);
              $(".mason-grid").append(mhtml).masonry('appended',mhtml);

            
            $('#load_more').text('Load More').removeAttr('disabled');
            /*$(".input-id").rating('refresh',{
              showClear:false,
              showCaption:false,
              size:'xs',
              step:1
            });*/

            page=page+1;
            if (result.data.events==null) {
              $('#load_more').remove();
              return false;
            }
            if (result.data.events.length<9) {
              $('#load_more').remove();
            };
            } else {
              $('#load_more').remove();
            };
        })
    });
function rand(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}
function append_artist(v){
  if(v.is_fan>0){
        str="faved";
    }else{
        str='';
    }
    var h=rand(190,300);
    var sh=h+92;
    // if(v.is_approved>0 || v.user_type==3){
    //   a_fan_count = v.fan_count;
    // }else{
    //   a_fan_count = v.fan_count-1;
    // }
    if (v.view_count>1000) {
      v.view_count=MATH.round(v.view_count/1000,1)+'k';
    }
    var fstr='';
    if (v.is_follow) {
      fstr='artist-rating faved';
    }
    var artists='';
    if (v.artists.length) {
      $.each(v.artists,function(index, el) {
        artists+='<a style="color:#2f4b93" href="/artist/'+el.id+'">'+el.name+'</a>,';
      });
      artists=artists.substring(0, artists.length - 1);
    }
    
    return '<div class="grid-item" style="width:205px;height:'+sh+'px">'+
'<div class="image grid-image">'+
'<a href="/event/'+v.slug+'" target="_blank">'+
'<img style="min-height:'+h+'px" src="'+v.event_image+'?d=205x'+h+'" class="img-responsive" onError="this.onerror=null;this.src=\'https://cdn.yahavi.com/content/images/logod.png?d=205x'+h+'\';"></a>'+
'<span class="viewcurrent">'+v.view_count+' views</span>'+
'</div>'+

'<div class="grid-cta">'+
'<a class="event-following '+fstr+'" data-id="'+v.id+'">'+
'<span class="icon smooth-transition"><i class="fa fa-heart"></i></span>'+
'<span class="count smooth-transition follow_count">'+v.event_follow_count+'</span>'+
'</a>'+
'</div>'+
'<div class="grid-data" >'+
'<a href="/event/'+v.slug+'" target="_blank"><h3 title="'+v.name+'" class="ellipsis">'+v.name+'</h3></a>'+
'<h4 class="ellipsis" style="margin-top:5px">'+artists+' '+v.other_artists+'</h4>'+
'<div class="footer">'+
'<div class="ellipsis">'+v.venue_name+'</div>'+
'<div class="grid-item-time"><i class="fa fa-calendar"></i><span>&nbsp;</span>'+v.dateStr+'</div>'+
'</div>'+
'</div>'+
'</div>';
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
</script>
</body>
</html>
