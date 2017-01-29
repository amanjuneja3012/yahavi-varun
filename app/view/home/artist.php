<?php 
$curl=new curl;
@$json=json_decode($curl->get(API_URL.'/account?'.Helper::queryToken()));
$user=$json->data;
$artist=$data['artist'];



$genres='';
$specializations='';
$tributes='';
$linguage='';
$travel_city='';
$past_event_type='';
$event_type='';
foreach ($artist->genres as $key => $value) {
  $genres.=$value->name.', ';
}
foreach ($artist->specializations as $key => $value) {
  $specializations.=$value->genre.'-'.$value->name.', ';
}

foreach ($artist->tributes as $key => $value) {
    $tributes.=$value->name.' ,';
}

foreach ($artist->linguage as $key => $value) {
  @$linguage.=$value->linguage.', ';
}
foreach ($artist->travel_city as $key => $value) {
  $travel_city.=$value->city.', ';
}

foreach ($artist->past_event_type as $key => $value) {
  $past_event_type.=$value->event.', ';
} 

foreach ($artist->event_type as $key => $value) {
  $event_type.=$value->event.', ';
}
$genres=rtrim($genres,', ');
$specializations=rtrim($specializations,', ');
$tributes=rtrim($tributes,' ,');
$linguage=rtrim($linguage,', ');
$travel_city=rtrim($travel_city,', ');
$past_event_type=rtrim($past_event_type,', ');
$event_type=rtrim($event_type,', ');



//header data
$curl=new curl;
$headerKey = isset($data['headerKey'])?$data['headerKey']:'';



$desc=htmlspecialchars(trim($artist->artist_category[0]->name).' | '.trim($genres).' | '.trim($artist->brief_intro));
if (strlen($desc)>150) {
  $descs=substr($desc, 0,147).'...';
}else{
  $descs=$desc;
}
$url='https://www.yahavi.com/artist/'.Helper::encodeSlug($artist->name,$artist->id);
$head=[
'<meta name="Content-Type" content="text/html; charset=utf-8">',
'<meta name="description" content="'.$descs.'">',
'<meta property="og:title" content="'.$artist->name.' - Yahavi">',
'<meta property="og:url" content="'.$url.'">',
'<meta property="og:image" content="'.$artist->profile_pic.'">',
'<meta property="og:description" content="'.$desc.'">',
'<meta property="og:type" content="article">',
'<meta property="og:site_name" content="yahavi.com">',
'<meta property="fb:app_id" content="1537332409822532">',
'<link rel="canonical" href="'.$url.'">',
'<meta name="robots" content="noydir,noodp" />',
'<link rel="alternate" hreflang="en" href="'.$url.'">',
'<link rel="publisher" href="https://plus.google.com/108957273343148298717">',
'<meta name="twitter:card" content="summary_large_image">',
'<meta name="twitter:site" content="@yahavidotcom">',
'<meta name="twitter:creator" content="@yahavidotcom">',
'<meta name="twitter:title" content="'.$artist->name.' - Yahavi">',
'<meta name="twitter:description" content="'.$desc.'">',
'<meta name="twitter:image" content="'.$artist->profile_pic.'">',
'<meta name="viewport" content="width=device-width, initial-scale=1.0">',
];
View::make('/include/v1_header',array('headerKey'=>'artist','head'=>$head,'title'=>$artist->name.' - Yahavi'));
?>
<style type="text/css">
  #ratelist{
    padding-left:0; 
  }
  .rating_show{
    display: block;
  }
  .rating_hide{
    display: none;
  }
  .invisible{
    visibility:hidden
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
    bottom: 32px;
    margin: auto;
  }
  .yplay i{
    font-size: 52px;
    color:rgba(255, 255, 255, 0.5);
  }
  .eventrate-modal{
    display:block; 
    width:100%;
  }
  .eventrate-modal .comment-input input{
   margin-left: 35px;
   width: 82%;
   margin-bottom: 0;
  }
  #other_events .image img{
    width: 100%;
    height: 150px;
  }
  .btntrash_e{
    font-size: 24px;
    position: absolute;
    right: 0;
    bottom: 0;
    color: #a7a6a6;
  }
  .btntrash_e:hover{
    color: #2a2929;
  }
  #events .itemcol{
    width:calc(25% - 20px);
    margin-left: 10px;
    margin-right: 10px;
  }
  #events .grid-image{
    height: auto;
  }
  #events .img-responsive{
    height: auto;
    width: 100%;
  }
  .network-item-main{
    margin-left: 0;
  }
  #events h3{
    font-size: 14px;
  }
  #events .footer{
    font-size: 12px;
    color:rgb(127, 127, 127)
  }
  .share_count{
    position: absolute;
    height: 15px;
    width: 100%;
    right: 0;
    top: -14px;
    color: #434343;
    text-align: right;
    font-size: 10px;
  }
  .panel-content .thumbnail-main{
    float: left;
    width: 229px;
  }
  #media .artist-panel .thumbnail .image{
    height: 115px;
    display: block;
  }
  .artist-panel .thumbnail .image img{
    max-width: 100%;
    height: 115px;
  }
  .feauter-tile-time{
    font-size:12px;
    color:#fff;
    padding:2px 3px;
    background:rgba(0,0,0,0.54);
    position: absolute;
    z-index:10;
    right:3px;
    bottom:50px;
  }
  .feauter-tile-time-left{
    font-size:12px;
    color:#fff;
    padding:2px 3px;
    background:rgba(0,0,0,0.54);
    position: absolute;
    z-index:10;
    left:3px;
    bottom:50px;
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
  .thumbnail{
    background: #fff;
    box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
  }
</style>
<section id="content">

  <div class="row zero-bottom-margin">
    <div class="col s3 " id="artist-sidebar">
      <div class="card image-card">
        <div class="card-image">
          <img class="activator" src="<?=$artist->profile_pic?>?d=0x213" alt="<?=$artist->name?>">
        </div>
        <div class="card-content">
              <h1 class="card-title details-word-wrap ellipsis"> <?=$artist->name?></h1>
              <div class="category"><?=$artist->artist_category[0]->name?></div>
              <div class="location"><?=$artist->city[0]->city?></div>
            </div>
            <div class="row card-action">
              <div class=" cta col s6">
                <div class="cta-col">
                  <a href="javascript:void(0)" class="haert-activator <?=$artist->is_fan?'active':''?> "><i class="fa fa-heart"></i></a>
                  <div class="text1">Follow</div>
                </div>
                
                  <div class="cta-col rated <?=$artist->rating_details->rating>0?'':'hide'?>">
                    <a href="javascript:void(0)" style="line-height:28px;" class="rate-activator active"><span class="count"><?=$artist->rating_details->rating?></span></a>
                    <div class="text1">Rated</div>
                  </div>
                  
                    <div class="cta-col rate <?=$artist->rating_details->rating>0?'hide':''?>">
                      <a href="javascript:void(0)" class="rate-activator"><i class="fa fa-star"></i></a>
                      <div class="text1">Rate</div>
                    </div>
                    
                      <div class="cta-col">
                      <a href="javascript:void(0)" data-url="<?=$url?>" class="btn-social"><i class="fa fa-share-alt"></i></a>
                      <div class="text1">Share</div>
                      <div class="social-popup">
                        <div class="socialinner">
                          <div class="share_count"></div>
                          <a class="linkdin-bg fb-share fix-social-margin" href="https://www.linkedin.com/shareArticle?mini=true&url=https://www.yahavi.com/artist/<?=$artist->slug?>"><i class="fa fa-linkedin"></i></a>
                          <a class="facebook-bg fb-share fix-social-margin" href="https://www.facebook.com/sharer/sharer.php?u=https://www.yahavi.com/artist/<?=$artist->slug?>"><i class="fa fa-facebook"></i></a>
                          <a class="google-bg fb-share fix-social-margin" href="https://plus.google.com/share?url=https://www.yahavi.com/artist/<?=$artist->slug?>"><i class="fa fa-google-plus"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col s6 rating-col">
                    <div class="right clearfix">
                      <div class="left reting-star1">
                        <i class="fa fa-star"></i>
                      </div>
                      <div class="left reting-number">
                        <span><?=round($artist->rating,1)?><h6 style="display:inline;color: #666;">/5</h6></span>
                        <small><?=$artist->rating_count?> users</small>
                      </div>
                    </div>
                  </div>
                </div>
                <button style="width:100%; background:#fe5b56;"  id="hire" class="btn waves-effect waves-light">Hire</button>
              </div>
              <div class="card " id="rate-card" style="display:none">
                <div class="card-content">
                  <h6>Rate</h6>
                  <div class="rating artist-rate artist1-star-row" data-artist="<?=$artist->id?>" data-rating="<?=$artist->rating_details->rating?$artist->rating_details->rating:'0'?>">

                  </div>
                  <div class=" modal-fixed-footer eventrate-modal">
                    <form action="#" method="post">
                      <div class="modal-content ratecontent-sec">
                        <div class="modal-rating-radio  <?=$artist->rating>3?'':'rating_show'?>" id="ratelist">
                          <span>What could have been better?</span>
                          <p>
                            <input class="with-gap" value="1" name="reason<?=$artist->id?>" <?php if($artist->rating_details->reason==1){echo "checked";}?>  type="radio" id="<?=$value->artist_id?>test1">
                            <label for="<?=$value->artist_id?>test1">Punctuality</label>
                          </p>
                          <p>
                            <input class="with-gap" value="2" name="reason<?=$artist->id?>" <?php if($artist->rating_details->reason==2){echo "checked";}?>  type="radio" id="<?=$value->artist_id?>test2">
                            <label for="<?=$value->artist_id?>test2">Audience Interaction</label>
                          </p>
                          <p>
                            <input class="with-gap" value="3" name="reason<?=$artist->id?>" <?php if($artist->rating_details->reason==3){echo "checked";}?>  type="radio" id="<?=$value->artist_id?>test3">
                            <label for="<?=$value->artist_id?>test3">Choice of Songs</label>
                          </p>
                          <p>
                            <input class="with-gap" value="4" name="reason<?=$artist->id?>" <?php if($artist->rating_details->reason==4){echo "checked";}?>  type="radio" id="<?=$value->artist_id?>test4">
                            <label for="<?=$value->artist_id?>test4">Attire</label>
                          </p>
                          <p>
                            <input class="with-gap" value="5" name="reason<?=$artist->id?>" <?php if($artist->rating_details->reason==5){echo "checked";}?>  type="radio" id="<?=$value->artist_id?>test5">
                            <label for="<?=$value->artist_id?>test5">Frequency or duration of Breaks</label>
                          </p>
                          <p>
                            <input class="with-gap" value="6" name="reason<?=$artist->id?>" <?php if($artist->rating_details->reason==6){echo "checked";}?>  type="radio" id="<?=$value->artist_id?>test6">
                            <label for="<?=$value->artist_id?>test6">Artist Performance</label>
                          </p>
                          <p>
                            <input class="with-gap" value="7" name="reason<?=$artist->id?>" <?php if($artist->rating_details->reason==7){echo "checked";}?>  type="radio" id="<?=$value->artist_id?>test7">
                            <label for="<?=$value->artist_id?>test7">Something else :</label>
                          </p>
                          <div class="comment-input  <?=$artist->rating_details->reason==7?'comment-input-show':''?>">
                              <input maxlength="600" type="text" name="reason_details" value="<?=$artist->rating_details->reason_details?>" placeholder="Only alphabets(600 characters).">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer center-align conformation-footer">
                        <button class=" waves-effect waves-light btn <?=$artist->rating>3?'rating_hide':''?>" id="artist-rate" type="button">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
             
              <div class="card network-card">
                <div class="card-content">
                  <div class="detail">
                    <strong>Followers</strong>
                    <span id="fan_count">
                      <?php 
                      foreach ($data['follower']->data as $key => $value) {
                        if(empty($value->id) || $value->id == ''){
                          $data['follower']->total_count-=1;
                        }
                      }
                      ?>
                      <?=$data['follower']->total_count?>

                    </span>
                  </div>
                  <div class="detail">
                    <strong>Following</strong><span>
                    <?=$data['following']->total_count?>
                  </span>
                </div>
                <div class="detail">
                  <strong>Shares</strong>
                  <?php $share=json_encode(['id'=>$artist->id,'type'=>'artists','url'=>$url]);?>
                  <span data-share='<?=$share?>'><?=($artist->fb_count+$artist->tw_count+$artist->gp_count)?></span>
                </div>
              </div>
            </div>

            <?php if(!empty(trim($travel_city))){?>
              <div class="card">
                <div class="card-content ">
                  <div>
                    <h6 class="key">Can travel to cities</h6>
                    <div  class="value" title="<?=$travel_city?>">              
                      <?php 
                      if(strlen($travel_city)<36){?>
                        <span><?=$travel_city?></span>
                        <?php 
                      }else{?>
                        <span class="truncate-travel-city"><?=$travel_city?></span>
                        <?php }?>
                      </div>
                    </div>
                  </div>
                </div>
                <?php }?>

                <?php 
                if($artist->facebook_link or $artist->youtube_link or $artist->gplus_link ){ ?>
                  <div class="card social-card">
                    <div class="card-content ">
                      <div class="social-links">
                        <?php if($artist->facebook_link){ ?>
                          <a href="<?=$artist->facebook_link?>"><i class="fa fa-facebook"></i></a>
                          <?php } ?>
                          <?php if($artist->gplus_link){ ?>
                            <a href="<?=$artist->gplus_link?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            <?php } ?>
                            <?php if($artist->youtube_link){ ?>
                              <a href="<?=$artist->youtube_link?>"><i class="fa fa-youtube-play"></i></a>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                        <?php } ?>




                      </div>

                      <div class="col s9" id="artist-content">
                        <div class="card" id="artist-tabs">
                          <ul class="tabs" style="overflow:hidden">
                            <li class="tab col s3"><a href="#about">About</a></li>
                            <li class="tab col s3"><a href="#photos">Photos</a></li>
                            <li class="tab col s3"><a href="#media">Media</a></li>
                            <li class="tab col s3"><a href="#networks">Networks</a></li>
                            <li class="tab col s3 invisible"><a href="#events">Events</a></li>

                          </ul>
                        </div>
                        <div class="card" id="about">
                          <div class="card-content">
                            <div class="row">
                              <div class="col s12">
                                <p class="truncate-brief-desc" >
                                  <?=trim($artist->brief_intro)?>
                                </p>
                              </div>
                              <div class="col s12">

                                <div class="row key-value">
                                  <small class="key col s3">Performing Since</small>
                                  <strong class="value col s9"><?=$artist->performance_start!='0000-00-00'?date('d M y',strtotime($artist->performance_start)):''?></strong>
                                </div>

                                <div class="row key-value">
                                  <small class="key col s3">Type of Events</small>
                                  <?php if(strlen(trim($event_type))<178){?>
                                    <strong class="value col s9"><?=$event_type?></strong>
                                    <?php }else{?>

                                      <strong class="value col s9">
                                        <span class="truncate-info"><?=trim($event_type)?></span>
                                      </strong>                 
                                      <?php }?>
                                    </div>

                                    <div class="row key-value">
                                      <small class="key col s3">Genre</small>
                                      <strong class="value col s9 truncate-genre"><?=trim($genres)?></strong>
                                    </div>

                                    <div class="row key-value">
                                      <small class="key col s3">Specialisation</small>
                                      <strong class="value col s9 truncate-specialisation"><?=$specializations?></strong>
                                    </div>
                                    <?php if(!empty($tributes)){ ?>
                                      <div class="row key-value">
                                        <small class="key col s3">Can give tribute to</small>
                                        <strong class="value col s9 truncate-tribute"><?=$tributes?></strong>
                                      </div>
                                    <?php  } ?>



                                    <div class="row key-value">
                                      <small class="key col s3">Performance languages</small>
                                      <strong class="value col s9"><?=$linguage?></strong>
                                    </div>

                                    <?php  if(!empty(trim($artist->band_member))) {  ?>
                                      <div class="row key-value">
                                        <small class="key col s3">group members</small>
                                        <strong class="value col s9"><?=$artist->band_member?></strong>
                                      </div>
                                      <?php } ?>
                                      <?php  if(!empty(trim($artist->gig_duration))) {  ?>
                                        <div class="row key-value">
                                          <small class="key col s3">Gig duration</small>
                                          <strong class="value col s9"><?=$artist->gig_duration?> Minutes</strong>
                                        </div>
                                        <?php } ?>

                                        <?php  if(!empty(trim($artist->training))) {  ?>
                                          <div class="row key-value">
                                            <small class="key col s3">Training and Accreditation</small>
                                            <strong class="value col s9"><?=$artist->training?></strong>
                                          </div>
                                          <?php } ?>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="card" id="photos">

                                    <div class="card-content">

                                      <div class="artist-panel">
                                        <div class="panel-content">
                                          <div class="photos-list clearfix pt_media">



                                          </div>
                                          <div class="row align-center center-align">
                                            <button class="waves-effect waves-light btn load_more_p">Load More</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="card" id="media">
                                    <div class="card-content">
                                      <div class="artist-panel">
                                        <div class="row marginbottom0">
                                          <div class="col s12 innertab1-row">
                                            <ul class="innertab1 jqinnertab1 clearfix">
                                              <li class="active" id="yti"><a href="#">Videos <i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                              <li><a href="#" id="sci">Audio <i class="fa fa-music" aria-hidden="true"></i></a></li>
                                            </ul>

                                            <div class="panel-content innertab1content" style="display:block">
                                              <div class="clearfix thumbnail-mainrow yt_media">




                                              </div>
                                              <div class="row align-center center-align">
                                                <button class="waves-effect waves-light btn load_more_yt">Load More</button>
                                              </div>
                                            </div>

                                            <div class="panel-content innertab1content">
                                              <div class="clearfix thumbnail-mainrow sc_media">




                                              </div>

                                              <div class="row align-center center-align">
                                                <button class="waves-effect waves-light btn load_more_sc">Load More</button>
                                              </div>
                                            </div>


                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>




                                  <div class="card" id="events">

          <div class="card-content">
            <div class="artist-panel">
              <div class="row marginbottom0">
                <div class="col s12">

                  <ul class="innertab1 jqinnertab3 clearfix">
                    <li data-tabc="followers1" class="active">
                      <a href="#">Yahavi <i class="material-icons">work</i></a>
                    </li>
                    <li data-tabc="following1">
                      <a href="#">Other <i class="fa fa-briefcase" aria-hidden="true"></i></a>
                    </li>
                  </ul>

                  <div data-contentB="followers1" class="panel-content" style="display:block;">
                    <div class="network-item-main clearfix" id="yahavi_events">

                      

                    </div>

                    <div class="row align-center center-align">
                      <button class="waves-effect waves-light btn load_more_ye">Load More</button>
                    </div>

                  </div>

                  <div data-contentB="following1" class="panel-content" style="display:none;">
                    <div class="network-item-main clearfix" id="other_events">

                      

                    
                    </div>
                    <div class="row align-center center-align">
                      <button class="waves-effect waves-light btn load_more_oe">Load More</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

                                    <div class="card" id="networks">
                                      <div class="card-content">
                                        <div class="artist-panel">
                                          <div class="row marginbottom0">
                                            <div class="col s12">

                                              <ul class="innertab1 jqinnertab2 clearfix">
                                                <li id="flw" class="active">
                                                  <a href="#">Followers <i class="material-icons">group</i></a>
                                                </li>
                                                <li id="flg">
                                                  <a href="#">Following <i class="material-icons">directions_run</i></a>
                                                </li>
                                              </ul>

                                              <div class="panel-content innertab1content2" style="display:block;">
                                                <div class="network-item-main clearfix" id="follower">
                                                </div>


                                                <div class="row align-center center-align">
                                                  <button class="waves-effect waves-light btn load_more_fr">Load More</button>
                                                </div>
                                              </div>

                                              <div class="panel-content innertab1content2">
                                                <div class="network-item-main clearfix" id="following">



                                                </div>

                                                <div class="row align-center center-align">
                                                  <button class="waves-effect waves-light btn load_more_fg">Load More</button>
                                                </div>
                                              </div>

                                            </div>
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                  </div>
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
var access_token="<?=$_COOKIE['access_token']?>";
                    $(document).on('ready',function(){

                      $(".truncate-brief-desc").shorten({
                        "showChars" : 267,
                        "moreText"  : "More",
                        "lessText"  : "Less",
                      });

                      $(".truncate-info").shorten({
                        "showChars" : 180,
                        "moreText"  : "More",
                        "lessText"  : "Less",
                      });
                      $(".truncate-travel-city").shorten({
                        "showChars" : 36,
                        "moreText"  : "More",
                        "lessText"  : "Less",
                      });
                      $('.truncate-genre').shorten({
                        "showChars" : 180,
                        "moreText"  : "More",
                        "lessText"  : "Less",
                      });
                      $('.truncate-specialisation').shorten({
                        "showChars" : 180,
                        "moreText"  : "More",
                        "lessText"  : "Less",
                      });
                      $('.truncate-tribute').shorten({
                        "showChars" : 180,
                        "moreText"  : "More",
                        "lessText"  : "Less",
                      });
                      $('.mason-grid').masonry({
                        itemSelector: '.grid-item'
                      });

                      $('#artist-tabs li a').on('click',function(){
                        setTimeout(function(){
                          $('.mason-grid').masonry({
                            itemSelector: '.grid-item'
                          });
                        },1)
                      });
                      $('.rating-bar').on('click',function(){
                        if($(this).hasClass('active')) return;
                        $(this).siblings('.rating-bar.active').removeClass('active');
                        $(this).addClass('active');
                        var rating=$(this).attr('data-target');
                        filter_ratings(rating)
                      });
                      var filter_ratings=function(rating){
                        $('.rating-bottom').addClass('filtered');
                        $('.review-list').fadeOut(function(){
                          $('.review-list .reviewer').hide();
                          $('.review-list .reviewer[data-rating="'+ rating +'"]').show();
                          $('.review-list').fadeIn();
                        });
                      }

                      $('.all-reviews').on('click',function(){
                        if($('.rating-bars .rating-bar.active').length<1) return;
                        $('.rating-bars .rating-bar.active').removeClass('active');
                        $('.review-list').fadeOut(function(){
                          $('.review-list .reviewer').show();
                          $('.review-list').fadeIn();
                          $('.rating-bottom').removeClass('filtered');
                        });
                      });
                      $('.rate-activator').on('click',function(){
                        if (!access_token) {
                          $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                          $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                          $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
                          $('.jq-login').trigger('click');
                          return false;
                        };
                        $(this).toggleClass('active');
                        $('#rate-card').slideToggle();
                      });
                    });

$('.abc').featherlight('iframe');
</script>
<script type="text/javascript">
type="<?=$user->user_type?>";
artist_id="<?=$artist->id?>";
$(document).ready(function(){
$(document).on('click','.artist-panel .cta_pic a' ,function(){
if (!access_token) {
  $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
  $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
  $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
$('.jq-login').trigger('click');
return false;
};
$this=$(this);
var pic_id=$(this).attr('data-id');
var like_count=$this.find('span:nth-child(2)').text();
if (($this).hasClass('ajax-waiting')) {
return false;
};
$this.addClass('ajax-waiting');
if($(this).hasClass('active')){
$.ajax({
  url:'<?=API_URL?>/artist/gallery/image/'+pic_id+'/fan/remove',
  data:query_token,
  method:'POST',
}).done(function(data){
  result=$.parseJSON(data);
  if(result.success=='1'){
    $this.removeClass('ajax-waiting').find('.handsprite-hand').removeClass('active');
    $this.removeClass('active').find('span:nth-child(2)').text(parseInt(like_count)-1);

    return false;
  }
  else{
    alert('some probelem occured');
  }
  return false;
});
}else{
$.ajax({
  url:'<?=API_URL?>/artist/gallery/image/'+pic_id+'/fan',
  data:query_token,
  method:'POST',
}).done(function(data){
  result=$.parseJSON(data);
  if(result.success=='1'){
    $this.removeClass('ajax-waiting').find('.handsprite-hand').addClass('active');
    $this.addClass('active').find('span:nth-child(2)').text(parseInt(like_count)+1);;
    return false;
  }
  else{
    alert('some probelem occured');
  }
  return false;
});
}
});

$(document).on('click','.artist-panel .cta_video a' ,function(){
if (!access_token) {
  $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
  $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
  $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
$('.jq-login').trigger('click');
return false;
};
$this=$(this);
var pic_id=$(this).attr('data-id');
var like_count=$this.find('span:nth-child(2)').text();
if (($this).hasClass('ajax-waiting')) {
return false;
};
$this.addClass('ajax-waiting');
if($(this).hasClass('active')){
$.ajax({
  url:'<?=API_URL?>/artist/gallery/video/'+pic_id+'/fan/remove',
  data:query_token,
  method:'POST',
}).done(function(data){
  result=$.parseJSON(data);
  if(result.success=='1'){
    $this.removeClass('ajax-waiting').find('.handsprite-hand').removeClass('active');
    $this.removeClass('active').find('span:nth-child(2)').text(parseInt(like_count)-1);

    return false;
  }
  else{
    alert('some probelem occured');
  }
  return false;
});
}else{
$.ajax({
  url:'<?=API_URL?>/artist/gallery/video/'+pic_id+'/fan',
  data:query_token,
  method:'POST',
}).done(function(data){
  result=$.parseJSON(data);
  if(result.success=='1'){
    $this.removeClass('ajax-waiting').find('.handsprite-hand').addClass('active');
    $this.addClass('active').find('span:nth-child(2)').text(parseInt(like_count)+1);;
    return false;
  }
  else{
    alert('some probelem occured');
  }
  return false;
});
}
});





});

$('.fb-share').click(function(e) {
e.preventDefault();
window.open(this.href, 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=1');
return false;
});


$('.more_info-arrow').click(function(){
alert("show div");
});

$(document).ready(function(){
$('.show-name-hover').hover(function(){
  var fullName = $(this).data('fullname');

});
});
</script>
<?php if($user->is_approved>0 || $user->user_type==3){?>
<script type="text/javascript">
$(document).ready(function(){
  $('.haert-activator').click(function(){
    if (!access_token) {
      $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $('.jq-login').trigger('click');
      return false;
    };
    $this=$(this);
    var artist_id="<?=$artist->id?>";
    var fan_count=$('#fan_count').text();
    if (($this).hasClass('ajax-waiting')) {
      return false;
    };
    $this.addClass('ajax-waiting');
    if($(this).hasClass('active')){
      $.ajax({
        url:'<?=API_URL?>/artist/'+artist_id+'/fan/remove',
        data:query_token,
        method:'POST',
      }).done(function(data){
        $this.removeClass('ajax-waiting');
        result=$.parseJSON(data);
        if(result.success=='1'){
          $this.removeClass('active');
          $('#fan_count').text(parseInt(fan_count)-1);
          return false;
        }
        else{
          alert('some probelem occured');
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
          $this.addClass('active');
          $('#fan_count').text(parseInt(fan_count)+1);
          return false;
        }
        else{
          alert('some probelem occured');
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
    $('.haert-activator').click(function(){
      if (!access_token) {
        $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
        $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
        $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
        $('.jq-login').trigger('click');
        return false;
      };
      alert("To enhance user experience we are approving profiles. Either your profile is not complete or it is awaiting approval. Please wait for a bit.");
      return false;
    });
  });
</script>
<?php }?>

<script type="text/javascript">
  $('.jqinnertab2 li').on('click', function(){
    $(this).addClass('active').siblings('li').removeClass('active');
    var num = $(this).index();
    $('.innertab1content2:eq('+num+')').slideDown().siblings('.innertab1content2').hide();
    return false;
  });

  $('.jqinnertab1 li').on('click', function(){
    $(this).addClass('active').siblings('li').removeClass('active');
    var num = $(this).index();
    $('.innertab1content:eq('+num+')').slideDown().siblings('.innertab1content').hide();
    return false;
  });

  $('.jqinnertab3 li').on('click', function(){
    var data = $(this).data('tabc');
    $('[data-tabc]').removeClass('active');
    $('[data-tabc="'+data+'"]').addClass('active');
    $('[data-contentB]').hide();
    $('[data-contentB="'+data+'"]').slideDown();
    return false;
  });
</script>

<script type="text/javascript">
  function makePhoto(src,ajaxi,id){
    return '<div class="thumbnail col s3" id="saving_'+ajaxi+'">'+
    '<a href="#modal3" class="btntrash modal-trigger"><i class="fa fa-trash"></i></a>'+
    '<div class="image" style="background-image:url(\''+src+'\')"></div>'+
    '<img style="width: 30px;position: absolute;height: 30px;top: 0px;left: 0px;bottom: 0px;margin: auto;right: 0px;" class="ajax-loading" src="/assets/v1/img/ajax-circular.gif"></img>'+
    '<div class="cta cta_pic">'+
    '<a class="pic_id">'+
    '<span class="icon smooth-transition"><i class="handsprite-hand"></i></span>'+
    '<span class="count smooth-transition">0</span>'+
    '</a>'+
    '</div>'+
    '</div>';


  }
  function makeGalleryPhoto(v){
    var dHeight=$(document).height()-300;
    var like='';
    if (v.is_like>0) {
      like='active';
    }
    return '<div class="card itemcol thumbnail">'+
    '<a href="#" data-type="image" data-id="'+v.id+'" class="testm" data-gallery="gallery1"><div class="image">'+
    '<img src="'+v.image+'?d=166x150">'+
    '</div></a>'+
    '<div class="cta cta_pic">'+
    '<a class="pic_id hide '+like+'" data-id='+v.id+'>'+
    '<span class="icon smooth-transition"><i class="handsprite-hand '+like+'"></i></span>'+
    '<span class="count smooth-transition">'+v.total_like+'</span>'+
    '</a>'+
    '</div>'+
    '</div>';
  }

  function makeVideo(v){
    var str='';
    var views='';
    if(v.is_like>0){
      str='active';
    }
    if (!v.total_like>0) {
      v.total_like=0;
    }
    if(v.json!==null && typeof v.json.items!=='undefined'){
      views='<span class="feauter-tile-time">'+parseDuration(v.json.items[0].contentDetails.duration)+'</span><span class="feauter-tile-time-left tooltipped" data-tooltip="Views" data-position="top">'+v.json.items[0].statistics.viewCount+'</span>';
    }
    v.thumb='https://cdn.yahavi.com/url?url='+v.thumb+'&d=205x115';

    return '<div class="thumbnail-main">'+
    '<div class="thumbnail">'+views+
    '<a class="image" data-type="'+v.type+'" data-id="'+v.id+'" href="#">'+
    '<img src="'+v.thumb+'">'+
    '<div class="yplay"><i class="material-icons">play_circle_outline</i></div>'+
    '</a>'+
    '<div class="cta cta_video">'+
    '<a class="faved hide '+str+'" data-id="'+v.id+'">'+
    '<span class="icon smooth-transition"><i class="handsprite-hand '+str+'"></i></span>'+
    '<span class="count smooth-transition">'+v.total_like+'</span>'+
    '</a>'+
    '</div>'+
    '<div class="feauter-tile-bottom">'+
    '<h5 class="ellipsis" title="'+v.json.items[0].snippet.title+'">'+v.json.items[0].snippet.title+'</h5>'+
    '</div>'+
    '</div>'+
    '</div>';
  }

  function load_photo(after){
    var btn=$(".load_more_p");
    var otext=btn.text();
    btn.prop("disabled",true).text("Loading...");
    var url;
    if ('undefined'==typeof after) {
      url='<?=API_URL?>/artist/<?=$artist->id?>/gallery/image?'+query_token;
    }else{
      url='<?=API_URL?>/artist/<?=$artist->id?>/gallery/image?'+query_token+'&after='+after;
    };
    $.ajax({
      url: url,
    }).done(function(res){
      btn.prop("disabled",false).text(otext);
      result=$.parseJSON(res);
      if (result.success=='1') {
        $.each(result.data.images,function(i,v){
          $(".pt_media").append(makeGalleryPhoto(v));
        });
        if (result.data.images.length<10) {
          btn.remove();
        }else{
          btn.attr('data-after',result.data.images[result.data.images.length-1].id);
        };
      }else{
        if ('undefined'==typeof after) {
          $(".pt_media").append('<p style="margin-left:25px">No photo uploaded by this artist</p>');
        }
        btn.remove();
      }
    });
  }


  function load_video(mType,after){
    var btn=$(".load_more_"+mType);
    var otext=btn.text();
    btn.prop("disabled",true).text("Loading...");
    var url;
    if ('undefined'==typeof after) {
      url='<?=API_URL?>/artist/<?=$artist->id?>/gallery/video?type='+mType+'&'+query_token;
    }else{
      url='<?=API_URL?>/artist/<?=$artist->id?>/gallery/video?type='+mType+'&'+query_token+'&after='+after;
    };
    $.ajax({
      url: url,
    }).done(function(res){
      btn.prop("disabled",false).text(otext);
      var result=$.parseJSON(res);
      if (result.success=='1') {
        $.each(result.data.images,function(i,v){
          $('.'+mType+'_media').append(makeVideo(v));
        });
        if (result.data.images.length>9) {
          btn.attr('data-after',result.data.images[result.data.images.length-1].id);
        }else{
          btn.remove();
        };
      }
      if (!(typeof result.data.images!='undefined' && result.data.images.length>0)) {
        btn.remove();
        if (after==0) {
          var media=mType=='yt'?'video':'audio';
          $('.'+mType+'_media').append('<p style="margin-left:25px">No '+media+' uploaded by this artist');
        }
      }
    });
  }


  function submitForm(i){
    var form=$("#gallery_upload");
    formData= new FormData(form[0]);
    $.ajax({
      url: "<?=API_URL?>/artist/gallery/image",
      data: formData,
      processData: false, 
      contentType: false,
      type: 'POST'
    }).done(function(res){
      result=$.parseJSON(res);
      if (result.success=='1') {
        if($(".pt_media .center-align").length > 0){
          $(".pt_media > div.center-align").fadeOut(1000);
        }

        $(i).find(".ajax-loading").remove();
        $(i).find('.pic_id').attr('data-id',result.data.id);
        $(i).find('.btntrash').attr('data-id',result.data.id);
        $(i).find(".btntrash").show();

      }else{
        $(i).remove();
      }
    });
  }

  function deleteGalleryItem(item,type){
    $this=item;
    pic_id=$this.attr('data-id');
    $element = $this.parents('.thumbnail');
    if (type=='image') {
      var url='<?=API_URL?>/artist/gallery/image/'+pic_id+'/delete';
    }else{
      var url='<?=API_URL?>/artist/gallery/video/'+pic_id+'/delete';
    }
    $.ajax({
      url:url,
      data:query_token,
      method:'POST'
    }).done(function(data){
      result=$.parseJSON(data);
      if (result.success=='1') {
        $element.remove();
      }else{
        alert('Can\'t delete '+type);
      };
    });
  }
</script>

<script type="text/javascript">
  var artist_id="<?=$artist->id?>";
  $(document).ready(function(){
    load_photo();

    load_video('yt',0);

    load_video('sc',0);

    $("#yes").click(function(){
      deleteGalleryItem(deleteElem,type);
      $("#modal3").closeModal();
    });

    $(".load_more_p").click(function(){
      if($(this).is(':disabled')){
        return false;
      }
      var after=$(this).attr('data-after');
      load_photo(after);
    });

    $(".load_more_yt").click(function(){
      if($(this).is(':disabled')){
        return false;
      }
      var after=$(this).attr('data-after');
      load_video('yt',after);
    });

    $(".load_more_sc").click(function(){
      if($(this).is(':disabled')){
        return false;
      }
      var after=$(this).attr('data-after');
      load_video('sc',after);
    });


    $(".load_more_fr").click(function(){
      if($(this).is(':disabled')){
        return false;
      }
      var after=$(this).attr('data-after');
      loadFollower(after);
    });

    $(".load_more_fg").click(function(){
      if($(this).is(':disabled')){
        return false;
      }
      var after=$(this).attr('data-after');
      loadFollowing(after);
    });

    $(".load_more_ye").click(function(){
      if($(this).is(':disabled')){
        return false;
      }
      var after=$(this).attr('data-after');
      loadEvents(after,1);
    });

    $(".load_more_oe").click(function(){
      if($(this).is(':disabled')){
        return false;
      }
      var after=$(this).attr('data-after');
      loadEvents(after,2);
    });
  });
  $(document).on('ready',function(){
    $(window).scroll(function() {
      var height=$(document).height() - $(window).height()-80;
      if($(window).scrollTop() >  height) {
        if($('#photos').is(':visible')){
          $('.loader').fadeIn(1000);
          $('.load_more_p').trigger('click');
        }else if($('#media').is(':visible') && $('#yti').hasClass('active')){
          $('.loader').fadeIn(1000);
          $('.load_more_yt').trigger('click');
        }
        else if($('#media').is(':visible') && $('#sci').hasClass('active')){
          $('.loader').fadeIn(1000);
          $('.load_more_sc').trigger('click');
        }
        else if($('#networks').is(':visible') && $('#flw').hasClass('active')){
          $('.loader').fadeIn(1000);
          $('.load_more_fr').trigger('click');
        }
        else if($('#networks').is(':visible') && $('#flg').hasClass('active')){
          $('.loader').fadeIn(1000);
          $('.load_more_fg').trigger('click');
        }
        else if($('#events').is(':visible') && $('[data-tabc="followers1"]').hasClass('active')){
          $('.loader').fadeIn(1000);
          $('.load_more_ye').trigger('click');
        }
        else if($('#events').is(':visible') && $('[data-tabc="following1"]').hasClass('active')){
          $('.loader').fadeIn(1000);
          $('.load_more_oe').trigger('click');
        }
      }
    });
  });
</script>

<script type="text/javascript">
  function loadEvents(page,type){
    if (type=='1') {
      var a=$("#yahavi_events");
      var btn=$(".load_more_ye");
    } else {
      var a=$("#other_events");
      var btn=$(".load_more_oe");
    }
    var otext=btn.text();
    btn.prop("disabled",true).text("Loading...");
    var url;
    var nPage='undefined' == typeof page?0:page;
    $.ajax({
    url: '<?=API_URL?>/artist/<?=$artist->id?>/event/past?'+query_token+'&page='+nPage+'&type='+type,
    }).done(function(res){
    btn.prop("disabled",false).text(otext);
    result=$.parseJSON(res);
    if (result.success=='1') {
      if(result.data.length){
        $('#events').parent().find('li').removeClass('invisible');
      }
      $.each(result.data,function(i,v){
        a.append(makeEvents(v,type));
      });
      if (result.data.length<10) {
        btn.remove();
      }else{
        btn.attr('data-after',parseInt(nPage)+1);
      };
    }
    });
  }
  function makeEvents(v,type){
    if (type==1) {
      return '<div class="card grid-item itemcol">'+
      '<a href="/event/'+v.id+'">'+
      '<div class="image grid-image">'+
      '<img src="'+v.event_image+'?d=300x190" class="img-responsive">'+
      '</div>'+
      '</a>'+
      '<div class="grid-data">'+
      '<a href="/event/'+v.id+'"><h3 class="ellipsis" style="margin-bottom:4px">'+v.name+'</h3></a>'+
      '<div class="footer">'+
      '<div class="ellipsis">'+v.venue_name+'</div>'+
      '<div class="grid-item-time" style="margin-bottom:4px;"><i class="fa fa-calendar"></i><span>&nbsp;</span>'+v.dateStr+'</div>'+
      '</div>'+
      '</div>'+
      '</div>';
    }
    return '<div class="card grid-item itemcol">'+
      '<a target="blank" href="'+v.url+'">'+
      '<div class="image grid-image">'+
      '<img src="'+v.image+'" class="img-responsive">'+
      '</div>'+
      '</a>'+
      '<div class="grid-data">'+
      '<a target="blank" href="'+v.url+'"><h3 class="ellipsis" style="margin-bottom:4px">'+v.name+'</h3></a>'+
      '<div class="footer">'+
      '<div class="ellipsis">'+v.venue_name+'</div>'+
      '<div class="grid-item-time" style="margin-bottom:4px;"><i class="fa fa-calendar"></i><span>&nbsp;</span>'+v.dateStr+'</div>'+
      '</div>'+
      '</div>'+
      '</div>';
  }
  function mekeFollower(v){
    if (v.name==null) {
      return '';
    }
    var followIcon;
    var aStart,aEnd,is_like;
    if (v.is_like==1) {
      is_like='faved';
    }else{
      is_like='';
    }
    if (v.user_type==1) {
      followIcon='<a class="artist-rating srtist-following1 '+is_like+'" data-id="'+v.id+'">'+
      '<span class="icon smooth-transition-2"><i class="fa fa-heart"></i></span>'+
      '<span class="count smooth-transition-2">'+v.a_count+'</span>'+
      '</a>';
      aStart='<a href="/artist/'+v.id+'">';
      aEnd='</a>';
    }else{
      followIcon='';
      aStart=aEnd='';
    };

    var divMain='<div class="card grid-item itemcol">'+
    '<div class="image grid-image">'+
    aStart+'<img src="'+v.profile_pic+'?d=166x150" class="img-responsive">'+aEnd+
    '</div>'+
    '<div class="grid-data">'+
    aStart+'<h3>'+v.name+'</h3>'+aEnd+
    '</div>'+
    '<div class="grid-cta">'+followIcon+
    '</div>'+
    '</div>';
    return divMain;
  }

  function loadFollower(page){
    var btn=$(".load_more_fr");
    var otext=btn.text();
    btn.prop("disabled",true).text("Loading...");
    var url;
    var nPage='undefined' == typeof page?0:page;
    $.ajax({
      url: '<?=API_URL?>/artist/follower/<?=$artist->id?>?'+query_token+'&page='+nPage,
    }).done(function(res){
      btn.prop("disabled",false).text(otext);
      result=$.parseJSON(res);
      if (result.success=='1') {
        $.each(result.data.data,function(i,v){
          $("#follower").append(mekeFollower(v));
        });
        if (result.data.data.length<10) {
          btn.remove();
        }else{
          btn.attr('data-after',parseInt(nPage)+1);
        };
      }
    });
  }

  function loadFollowing(page){
    var btn=$(".load_more_fg");
    var otext=btn.text();
    btn.prop("disabled",true).text("Loading...");
    var url;
    var nPage='undefined' == typeof page?0:page;
    $.ajax({
      url: '<?=API_URL?>/artist/following/<?=$artist->id?>?'+query_token+'&page='+nPage,
    }).done(function(res){
      btn.prop("disabled",false).text(otext);
      result=$.parseJSON(res);
      if (result.success=='1') {
        $.each(result.data.data,function(i,v){
          $("#following").append(mekeFollower(v));
        });
        if (result.data.data.length<10) {
          btn.remove();
        }else{
          btn.attr('data-after',parseInt(nPage)+1);
        };
      }
    });
  }
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
  loadFollower(1);
  loadFollowing(1);
  loadEvents(1,1);
  loadEvents(1,2);
</script>
  <style type="text/css">
    .grid-data h3{
      white-space: nowrap;
      text-overflow: ellipsis;
      overflow-x: hidden;
    }
    .srtist-following1{
      cursor: pointer !important;
    }
  </style>
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
  var url='<?=API_URL?>/artist/<?=$artist->id?>/gallery/'+id+'/next?dir='+dir+'&type='+type+'&'+query_token;
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
      $('.customemodoal-inner').append('<iframe style="display:none" src="'+src+'"></iframe>');
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
<script type="text/javascript">
  $('#ratelist input[type=radio]').on('click',function(){
      if($(this).val()=='7'){
        $('.comment-input').slideDown();
      }else{
        $('.comment-input').slideUp();
      }
  });
  $(document).on('click','#artist-rate',function(){
    $this=$(this);
    if($this.hasClass('ajax-waiting')){
      return false;
    }
    $this.addClass('ajax-waiting');
      var access_token='<?=$_COOKIE["access_token"]?>';
      var arr=[];
      var a=$('.artist-rate');
      if(a.attr('data-rating')=='0'){
        alert("Please rate the artist between 1 and 5.");
        $this.removeClass('ajax-waiting');
        return false;
      }
      var c='';
      var b=$('.modal-rating-radio').find('input[type="radio"]:checked').val();
      if(b==undefined || a.attr('data-rating')>3){
        b='0';
      }
      if(b=='7'){
        c=$('.modal-rating-radio').find('input[type="text"]').val();
      }
      arr.push({artist_id:a.attr('data-artist'),rating:a.attr('data-rating'),reason:b,reason_details:c});    
    arr=JSON.stringify(arr);
    $.ajax({
      url:'<?=API_URL?>/event/rateMultipleArtist',
      data:query_token+"&artist_id_list="+arr,
      method:'POST',
    }).done(function(data){
      result=$.parseJSON(data);
      if(result.success=='1'){
        $this.removeClass('ajax-waiting');
        $('#rate-card').slideUp(function(){
          alert('Thanks for your feedback.\nThis would help us improve your future experience.');
        });
        $('.rate-activator').addClass('active').find('span').text(a.attr('data-rating'));
        if($('.rated').hasClass('hide')){
          $('.rate').addClass('hide');
          $('.rated').removeClass('hide');
        }
        
      }
      else{
        alert(result.message);
      }
    });
  });
  $('.artist-rate').each(function(i,v){
    var el=$(this);
    el.rating({
      disabled:el.attr('data-disabled'),
      rating:el.attr('data-rating'),
      change:function(val){
        el.attr('data-rating',val);      
        var rating=el.attr('data-rating');
        var elem=$('.modal-rating-radio');
        if(rating>3){
          elem.slideUp(function(){
            $('#artist-rate').hide().prop('disabled',false).trigger('click');
          });
        }else{
          elem.slideDown();
          $('#artist-rate').show();
          var checked_flag=elem.find('input[type="radio"]:checked').val();
          if(checked_flag){
            $('#artist-rate').prop('disabled',false);
          }else{
            $('#artist-rate').prop('disabled',true);
          }
          $('.modal-rating-radio input[type="radio"]').change(function(){
            $('#artist-rate').prop('disabled',false);
          });
        }
      }
    })
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

$(document).ready(function(){
  $('#hire').click(function(e){
    $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    e.stopPropagation();
    message(" To Hire Artist Please Register Or Login As Business");
    $('.jq-signup').trigger('click');
    $('#login-section, #forgot, #resetpassword').hide();
    $('#signup-section').show();
  });

})
</script>
</body>
</html>

