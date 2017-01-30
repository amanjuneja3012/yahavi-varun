<?php 
@$artists=$data['artists']->result;
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
$uri=$data['static']['uri']?$data['static']['uri']:'/artist';
$title=$data['static']['title']?$data['static']['title']:'Artist - Book artists in Delhi/NCR, Bangalore, Mumbai, Kolkata, Chennai, Hyderabad - Yahavi';
$desc=htmlspecialchars('Being an artist management platform, Yahavi offers singers, comedians and other performing artists, catering to your event and budget. Book an artist now.');
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


View::make('/include/v1_header',array('headerKey'=>'artist','head'=>$head,'title'=>$title));
?>
<style type="text/css">
  .btm0{
    bottom:0;
    top:auto !important;
  }
  footer{
    display:none;
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
.tribute_scroll{
  overflow: auto;
  height: 500px;
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
  .featherlight-inner{
    width:600px;
    height: 300px;
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


            <form class="filter_tag" action="/artist"></form>
          </div>
        </div>
      </div>
      <div class="row zero-bottom-margin" style="min-height:1000px">
      <form class="filter_form">
        <div class="col s3 card" id="filter" style="position:fixed;top:62px">
            <div class="allresult clearfix">
              <h1 style="font-size:22px;margin:0;padding:0" class="left">Artists (<?=$data['artists']->count?:'0'?> Results)</h1>
            </div>
            <div class="allresult clearfix">
               <h5 class="left">Filter by</h5>
              <a href="/artist"><span class="right btnclear">Clear all <i class="fa fa-times"></i></span></a>
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
                      <div class="tribute_scroll">
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
            </div>

            <div class="filtersection-inner">
              <div class="filter-type">
                  <span class="checkebox">
                    <input type="checkbox" class="filtecheckbox" id="filter-with_m" checked="">
                    <label for="filter-with_m">Profiles with</label>
                  </span>
              </div>
              <div class="filter-content" style="display:block;">
                  
                  <div class="filter-inner clearfix">
                    <div class="left">
                    <input class="with-gap filter-input" <?=$query['with_m']==1?'checked="checked"':''?> name="with_m" value="1" type="radio" id="with_m">
                      <label for="with_m">Audio/Video</label>
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
                  <input type="text" placeholder="Search by artist category" id="a1">
                  <label for="a1" class="label">Artist Category</label>
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
                      <div class="tribute_scroll">
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
                  <label for="a2" class="label">Genre</label>
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
            <div class="filtersection-inner" >
              <div class="filter-type">
                <span class="checkebox">
                  <input type="checkbox" class="filtecheckbox" id="filter-tribute" <?=isset($query["tribute_id"][0])?'checked="checked"':''?>>
                  <label for="filter-tribute">tributes</label>
                </span>
              </div>
              <div class="filter-content" <?=isset($query["tribute_id"][0])?'style="display:block"':''?>>
                <div class="filter-search">
                  <input type="text" placeholder="Search by tribute">
                </div>
                
                <?php 
                foreach ($form->tributeall as $key => $value) {
                  if ($key<4) { ?>
                  <div class="filter-inner clearfix">
                    <div class="left">
                    <input type="checkbox" <?=in_array($value->id, $query['tribute_id'])?'checked="checked"':''?> name="tribute_id[]" value="<?=$value->id?>" class="filled-in filter-input" id="tribute_<?=$value->id?>" data-tribute-id="<?=$value->id?>">
                    <label for="tribute_<?=$value->id?>"><?=$value->text?></label>
                    </div>
                    <!-- <div class="right">(10)</div> -->
                  </div>
                  <?php }else{ ?>
                  <div class="filter-inner clearfix" style="display:none">
                    <div class="left">
                    <input type="checkbox" <?=in_array($value->id, $query['tribute_id'])?'checked="checked"':''?> name="tribute_id[]" value="<?=$value->id?>" class="filled-in filter-input" id="tribute_<?=$value->id?>" data-tribute-id="<?=$value->id?>">
                    <label for="tribute_<?=$value->id?>"><?=$value->text?></label>
                    </div>
                    <!-- <div class="right">(10)</div> -->
                  </div>
                  <?php }
                }
                ?>
                <div class="clearfix">
                  <div class="filterbtn-row right">
                    <span class="filterbtn-allview">view all <i class="fa fa-angle-right"></i></span>
                    <div class="filterview-menu " style="height:auto;">
                     <div class="tribute_scroll">
                        <ul>
                          <?php 
                          foreach ($form->tributeall as $key => $value) {?>
                    
                            <li style="width:360px">
                            <div class="left">
                              <input type="checkbox" <?=in_array($value->id, $query['tribute_id'])?'checked="checked"':''?> class="filled-in" id="tribute2_<?=$value->id?>" data-tribute-id="<?=$value->id?>">
                              <label style="width:300px !important" for="tribute2_<?=$value->id?>"><?=$value->text?></label>
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

            <div class="filtersection-inner">
              <div class="filter-type">
                <span class="checkebox">
                  <input type="checkbox" class="filtecheckbox" id="filter-language" <?=isset($query["language_id"][0])?'checked="checked"':''?>>
                  <label for="filter-language">Performance Language</label>
                </span>
              </div>
              <div class="filter-content" <?=isset($query["language_id"][0])?'style="display:block"':''?>>
                <div class="filter-search">
                  <input type="text" placeholder="Search by language" id="a3">
                  <label for="a3" class="label">Language</label>
                </div>
                
                <?php 
                foreach ($form->language as $key => $value) {
                  if ($key<4) { ?>
                  <div class="filter-inner clearfix">
                    <div class="left">
                    <input type="checkbox" <?=in_array($value->id, $query['language_id'])?'checked="checked"':''?> name="language_id[]" value="<?=$value->id?>" class="filled-in filter-input" id="language_<?=$value->id?>" data-language-id="<?=$value->id?>">
                    <label for="language_<?=$value->id?>"><?=$value->text?></label>
                    </div>
                  </div>
                  <?php }else{ ?>
                  <div class="filter-inner clearfix" style="display:none">
                    <div class="left">
                    <input type="checkbox" <?=in_array($value->id, $query['language_id'])?'checked="checked"':''?> name="language_id[]" value="<?=$value->id?>" class="filled-in filter-input" id="language_<?=$value->id?>" data-language-id="<?=$value->id?>">
                    <label for="language_<?=$value->id?>"><?=$value->text?></label>
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
                        foreach ($form->language as $key => $value) {?>
                  
                          <li>
                          <div class="left">
                            <input type="checkbox" <?=in_array($value->id, $query['language_id'])?'checked="checked"':''?> class="filled-in" id="language2_<?=$value->id?>" data-language-id="<?=$value->id?>">
                            <label for="language2_<?=$value->id?>"><?=$value->text?></label>
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
                  <input type="checkbox" class="filtecheckbox" id="filter-rating" <?=$query["rating_min"]>0?'checked="checked"':''?>>
                  <label for="filter-rating">Rating</label>
                </span>
              </div>

              <div class="filter-content" <?=$query["rating_min"]>0?'style="display:block"':''?>>
                <div class="filter-inner clearfix">
                  <div class="left">
                    <input type="radio" name="rating_min" <?=$query['rating_min']==1?'checked="checked"':''?> value="1" class="with-gap filter-input" id="rating_1">
                    <label for="rating_1">
                      <span class="filterreating-row">
                        <i class="fa fa-star"></i>
                      </span>
                      <span>&amp; above</span>
                    </label>
                  </div>
                </div>
                <div class="filter-inner clearfix">
                  <div class="left">
                    <input type="radio" name="rating_min" <?=$query['rating_min']==2?'checked="checked"':''?> value="2" class="with-gap filter-input" id="rating_2">
                    <label for="rating_2">
                      <span class="filterreating-row">
                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                      </span>
                      <span>&amp; above</span>
                    </label>
                  </div>
                </div>
                <div class="filter-inner clearfix">
                  <div class="left">
                    <input type="radio" name="rating_min" <?=$query['rating_min']==3?'checked="checked"':''?> value="3" class="with-gap filter-input" id="rating_3">
                    <label for="rating_3">
                      <span class="filterreating-row">
                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </span>
                      <span>&amp; above</span>
                    </label>
                  </div>
                </div>
                <div class="filter-inner clearfix">
                  <div class="left">
                    <input type="radio" name="rating_min" <?=$query['rating_min']==4?'checked="checked"':''?> value="4" class="with-gap filter-input" id="rating_4">
                    <label for="rating_4">
                      <span class="filterreating-row">
                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                      </span>
                      <span>&amp; above</span>
                    </label>
                  </div>
                </div>
                <div class="filter-inner clearfix">
                  <div class="left">
                    <input type="radio" name="rating_min" <?=$query['rating_min']==5?'checked="checked"':''?> value="5" class="with-gap filter-input" id="rating_5">
                    <label for="rating_5">
                      <span class="filterreating-row">
                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </span>
                      
                    </label>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </form>
      <div class="col s3"></div>
        <div class="col s9">
          <div class="mason-grid mason-artist-tile" >
           <?php foreach ($artists as $key => $value) {   
            $h=rand(200,300);
            $sh=$h+50;
            ?>
             <div class="grid-item" style="width:205px;height:<?=$sh?>px">
              <div class="image grid-image center-align">
               <a href="/artist/<?=$value->slug?>" target="_blank">
                <img style="min-height:<?=$h?>px" src="<?=$value->profile_pic?>?d=205x<?=$h?>" class="img-responsive" alt="<?=$value->name?>">
                <?php 
                if ($value->is_lfeatured) {?>
                <span class="featurediv tooltipped" data-tooltip="Featured artist" data-position="top">
                 <img src="/assets/v1/img/ribbon3.png">  
                </span>
                <?php }
                ?>
              </a>                
              </div>
              <div class="artist-grid-rate-cta">
              </div>
              <div class="grid-cta">
                <a class="artist-rating srtist-following1 <?=$value->is_fan>0?'faved':''?>" data-id="<?=$value->id?>">
                  <span class="icon smooth-transition-2"><i class="fa fa-heart"></i></span>
                  <span class="count smooth-transition-2">
                  <?=$value->fan_count?>
                  </span>
                  </a>
              </div>
              <div class="grid-data" >
                <a href="/artist/<?=$value->slug?>" title="<?=$value->name?>" target="_blank">
                
                <h3 class="ellipsis"><?=$value->name?></h3>

                </a>
                <div class="footer">
                  <div class="grid-item-location grid-artist-category ellipsis"><?=$value->artist_category?></div>
                </div>
              </div>
            </div>
          <?php  $i=$i+5;   }  ?>  
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
<div class="overlay">
  <img class="overlay-loader" src="/assets/images/ajax-circular.gif" alt="ajax loader">
</div>
<?php 
view::make('/include/v1_footer');
?>
<script type="text/javascript">
var query_token='<?=Helper::queryToken()?>';
$('.mason-grid').masonry({
    itemSelector: '.grid-item',
    transitionDuration:1000,
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

var $masonry='';


/*Jquery for the artist listing */
 // Run Ajax to add current user as follower and show rating box.
/*$('.grid-cta').on('click',function(event){
 event.preventDefault();
   Write ajax code. 
 $(this).children('a').toggleClass('artist-rating faved');
});*/
</script>
<?php if($user->is_approved>0 || $user->user_type==3){?>
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.srtist-following1',function(){
      $this=$(this);
      if (!access_token) {
        $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
        $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
        $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
        $('.jq-login').trigger('click');

        return false;
      };
      var artist_id=$(this).attr('data-id');
      var fan_count=$(this).find('span:nth-child(2)').text();
      if (($this).hasClass('ajax-waiting')) {
        return false;
      };
      $this.addClass('ajax-waiting');
      if($(this).hasClass('faved')){
        $.ajax({
              url:'<?=API_URL?>/artist/'+artist_id+'/fan/remove',
              data:query_token,
              method:'POST',
               }).done(function(data){
                $this.removeClass('ajax-waiting');
              result=$.parseJSON(data);
              if(result.success=='1'){
                  $this.removeClass('faved').find('span:nth-child(2)').text(parseInt(fan_count)-1);
                 return false;
              }
              else{
                  alert('some problem occured');
              }
              return false;
          });
      }else{
         $.ajax({
                  url:'<?=API_URL?>/artist/'+artist_id+'/fan',
                  data:query_token,
                  method:'POST',
                   }).done(function(data){
                    $this.removeClass('ajax-waiting');
                  result=$.parseJSON(data);
                  if(result.success=='1'){
                      $this.addClass('faved').find('span:nth-child(2)').text(parseInt(fan_count)+1);;
                     return false;
                  }
                  else{
                      alert('some problem occured');
                  }
                  return false;
              });
      }
    });
  });
</script>
<?php }else{?>
<script type="text/javascript">
  $(document).ready(function(){
    $('.tribute_scroll').niceScroll({
      cursorcolor:"#000",
    });

    $(document).on('click','.srtist-following1',function(){
      $this=$(this);
      if (!access_token) {
        $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
        $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
        $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
        $('.jq-login').trigger('click');
        return false;
      };
      alert("To enhance user experience we are approving profiles. Either your profile is not complete or it is awaiting approval. Please wait for a bit.");
      return false;
      // var artist_id=$(this).attr('data-id');
      // var fan_count=$(this).find('span:nth-child(2)').text();
      // if (($this).hasClass('ajax-waiting')) {
      //   return false;
      // };
      // $this.addClass('ajax-waiting');
      // if($(this).hasClass('faved')){
      //   $.ajax({
      //         url:'<?=API_URL?>/artist/'+artist_id+'/fan/remove',
      //         data:query_token,
      //         method:'POST',
      //          }).done(function(data){
      //           $this.removeClass('ajax-waiting');
      //         result=$.parseJSON(data);
      //         if(result.success=='1'){
      //             $this.removeClass('faved');
      //            return false;
      //         }
      //         else{
      //             alert('some probelem occured');
      //         }
      //         return false;
      //     });
      // }else{
      //    $.ajax({
      //             url:'<?=API_URL?>/artist/'+artist_id+'/fan',
      //             data:query_token,
      //             method:'POST',
      //              }).done(function(data){
      //               $this.removeClass('ajax-waiting');
      //             result=$.parseJSON(data);
      //             if(result.success=='1'){
      //                 $this.addClass('faved');
      //                return false;
      //             }
      //             else{
      //                 alert('some probelem occured');
      //             }
      //             return false;
      //         });
      // }
    });
  });
</script>
<?php }?>
<script type="text/javascript">
access_token="<?=$_COOKIE['access_token']?>";
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
              var mhtml=$(html);
              $(".mason-grid").append(mhtml).masonry('appended',mhtml);
              $(".tooltipped").tooltip();
            
            $('#load_more').text('Load More').removeAttr('disabled');
            /*$(".input-id").rating('refresh',{
              showClear:false,
              showCaption:false,
              size:'xs',
              step:1
            });*/

            page=page+1;
            if (result.data.result.length<9) {
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
    var sh=h+50
    // if(v.is_approved>0 || v.user_type==3){
    //   a_fan_count = v.fan_count;
    // }else{
    //   a_fan_count = v.fan_count-1;
    // }
    var lfeatured='';
    if (v.is_lfeatured==1) {
     lfeatured='<span class="featurediv tooltipped" data-tooltip="Featured artist" data-position="top"><img src="/assets/v1/img/ribbon3.png"></span>';
    }
    return '<div class="grid-item ajax" style="width:205px;height:'+sh+'px">'+
              '<div class="image grid-image center-align">'+
                '<a href="/artist/'+v.slug+'" target="_blank">'+
                  '<img style="width:100%;min-height:'+h+'px" src="'+v.profile_pic+'?d=205x'+h+'" class="img-responsive" alt="'+v.name+'">'+
              lfeatured+'</a>'+                    
              '</div>'+
              '<div class="artist-grid-rate-cta">'+
              '</div>'+
              '<div class="grid-cta">'+
                '<a class="artist-rating srtist-following1 '+str+'" data-id="'+v.id+'">'+
                  '<span class="icon smooth-transition-2"><i class="fa fa-heart"></i></span>'+
                  '<span class="count smooth-transition-2">'+v.fan_count+'</span>'+
                  '</a>'+
              '</div>'+
              '<div class="grid-data" >'+
                '<a href="/artist/'+v.slug+'" target="_blank"><h3 class="ellipsis">'+v.name+'</h3>'+
                '<div class="footer">'+
                  '<div class="grid-item-location grid-artist-category ellipsis">'+v.artist_category+'</div>'+
                '</div>'+
              '</div>'+
            '</div>';
}
</script>

<script type="text/javascript">
  $('.filtecheckbox').on('change', function(){
    
    var $this = $(this),
        $wrapper = $this.parents('.filtersection-inner').find('.filter-content');

    if($this.is(':checked')){
      $wrapper.slideDown('slow',function(){
        scrollFix();
      });
    }else{
      $wrapper.slideUp('slow',function(){
        scrollFix();
      });
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
    $(this).parents('.filter-content').find('label').filter( function ()
    {
      return $( this ).text().toLowerCase().indexOf( val.toLowerCase() ) == 0;
    }).parents('.filter-inner').slice(0,4).removeClass('hidden').addClass('shown');
  });

  $(".filter_form").find("input.filter-input").change(function(){
    $('.overlay').fadeIn('fast');
    $(".filter_form").submit();
  });

  $(".filter_form").submit(function(e){
    e.preventDefault();
    var query=$(this).find('input.filter-input').serialize();
    if ('<?=$query["search"]?>'!='') {
      query+='&search='+'<?=$query["search"]?>';
    };
    console.log(query);
    window.location.href='/artist?'+query;
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
  $('[data-tribute-id]').change(function(){
    var checked=$(this).is(':checked')?true:false;
    $('[data-tribute-id="'+$(this).attr('data-tribute-id')+'"]').prop('checked',checked);
    $(".filter_form").submit();
  });

  $('[data-language-id]').change(function(){
    var checked=$(this).is(':checked')?true:false;
    $('[data-language-id="'+$(this).attr('data-language-id')+'"]').prop('checked',checked);
    $(".filter_form").submit();
  });

  $(".filter-input:checked").each(function(){
    if ($(this).attr('name')=='rating_min') {
      var text=$(this).attr('value')+' star & above';
    }else{
    var text=$(this).parent().find('label').text();  
    };
    
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