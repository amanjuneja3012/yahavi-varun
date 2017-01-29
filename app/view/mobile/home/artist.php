<?php 
    $curl=new curl;
    @$json=json_decode($curl->get(API_URL.'/account?'.Helper::queryToken()));
    $user=$json->data;
    $headerKey = isset($data['headerKey'])?$data['headerKey']:'';

    $follower=$data['follower']->data;
    $following=$data['following']->data;
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
      $tributes.=$value->name.', ';
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
    $tributes=rtrim($tributes,', ');
    $linguage=rtrim($linguage,', ');
    $travel_city=rtrim($travel_city,', ');
    $past_event_type=rtrim($past_event_type,', ');
    $event_type=rtrim($event_type,', ');

    $curl=new curl;
    $json=$curl->get(API_URL.'/artist/'.$artist->id.'/gallery/image/all?'.Helper::queryToken());
    $gallery=json_decode($json)->data->images;



    $gallery=array_slice($gallery, 0,3);
    $json=$curl->get(API_URL.'/artist/'.$artist->id.'/gallery/video/all?'.Helper::queryToken());
    $video=json_decode($json)->data->images;
    $videos=array();
    $audios=array();

    foreach ($video as $key => $value) {
      if($value->type=='yt'){
        $videos[]=$value;
      }else{
        $audios[]=$value;
      }
    }
    View::make('/mobile/include/v1_header');
    $pevent=json_decode($curl->get(API_URL.'/artist/'.$artist->id.'/event/past?'.Helper::queryToken()))->data;
    $url='https://www.yahavi.com/artist/'.Helper::encodeSlug($artist->name,$artist->id);
?>
<style type="text/css">
  footer{
    display: none;
  }
  .ratingbox{
    display: none;
  }
  .invisible{
   visibility:hidden;
  }
  .haert-activator.active,.rating-click.active{
    background-color:#ff5850;
  }
  .haert-activator.active i,.rating-click.active i{
    color: #fff !important;
  }

  .overlay-fixed{
  position: fixed;
  top: 0;
  left: 0;
  opacity: .9;
  height: 100%;
  width: 100%;
  display: none;
  z-index: 9999;
  background: #000;
}
  .customemodoal{
    position: fixed;
    display: none;
    width: 100%;
    height: 100%;
    z-index: 9999;
    cursor: pointer;
  }
  .customemodoal-inner{
    position: absolute;
    left:0;
    top:0;
    right:0;
    bottom:0;
    margin: auto 20px;
  }
  .customemodoal-inner img,.customemodoal-inner iframe{
    max-width: 95%;
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
    width: 95%;
    height:280px;
  }
  .controls{
    color:#999;
    transform: translateY(-50%);
    top: 46.5%;
    position: relative;
    z-index: 99;
  }
  .controls .left,.controls .right{
    width: 50px;
    height: 50px;
    cursor: pointer;
  }
  .controls .left{
    margin-left:-15px;
  }
  .controls .right{
    margin-right:-15px;
  }
  .controls .left.active,.controls .right.active{
    color:#fff;
  }
  .controls i{
    font-size: 50px;
  }
  .close{
    z-index: 99999;
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

  .grid-data h3{
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow-x: hidden;
  }
  .srtist-following1{
    cursor: pointer !important;
  }
  .rate-change{
    font-size: 14px;
    color:rgba(67, 67, 67, 0.54);
    margin: 0;
  }
  .modal .modal-content.ratecontent-sec{
    padding-bottom:0;
  }
  .ratecontent-sec .rate-artist1-img{
    margin:0 auto;
  }
  .ratecontent-sec .rate-artist1{
    border-bottom:none;
  }
  .ratecontent-sec .rate-artist1-name{
    margin-left:0;
  }
  .comment-input input{
    margin-bottom:0;
    padding: 0 10px;
  }
  .eventrate-modal .modal-footer .btn{
    float:none;

  }
  .modal-rating-radio span  {
    font-weight: 600;
  }
  .ratecontent-sec .rate-artist1-img{
    margin: 0 auto 5px;

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
  .feauter-tile-time{
    font-size:10px;
    color:#fff;
    padding:2px 3px;
    background:rgba(0,0,0,0.54);
    position: absolute;
    z-index:10;
    right:3px;
    bottom:3px;
  }
  .feauter-tile-time-left{
    font-size:10px;
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
    text-align: left;
  }

  .feauter-tile-bottom h5{
    margin:2px 0 1px;
    font-size: 10px;
    text-transform: capitalize;
    font-weight:600;
  }
  .photo-list .photolist-inner{
    margin-bottom: 20px;
  }

  
</style>
<section id="content">
            <div class="artistprofile-box">
                  <div class="artprofile-info">
                        <h1><?=$artist->name?></h1>
                        <span><?=$artist->artist_category[0]->name?></span>
                        <span><?=$artist->city[0]->city?></span> 
                        
                  </div>
            </div>

            


            <div class="row artistprofile-share">
                  <div class="col s12">
                        <div class="left artprofile-img">
                          <img src="<?=$artist->profile_pic?>?d=0x213" onError="this.src='/assets/images/gallery1.jpg';" alt="Image" title="">
                        </div>
                        <div class="sharebox" style="position: relative;margin-bottom: 10px;">
                              <button id="hire" class="waves-effect waves-light btn" style="background:#fe5b56; position:absolute; z-index:0; left:-105px; bottom:12px; width:93px; height:26px; line-height:26px; font-size:11px;">hire</button>
                              <div class="left">
                                    <?=round($artist->rating,1)?>/5 <span><?=$artist->rating_count?> Votes</span>
                              </div>
                              <ul class="right-align follow">
                                    <li>
                                    <div class="circul">

                                      <a href="javascript:void(0)" data-url="<?=$url?>" class="btnshare2"><i aria-hidden="true" class="fa fa-share-alt"></i></a>
                                      <?php $share=json_encode(['id'=>$artist->id,'type'=>'artists','url'=>'https://yahavi.com/artist/'.$artist->slug]);?>
                                      <small data-share='<?=$share?>'><?=($artist->fb_count+$artist->tw_count+$artist->gp_count)?></small>
                                    </div>
                                      <div class="social-col" style="right:30px;top:8px">
                                          <div class="share_count"></div>
                                          <a class="linkdin fb-share" href="https://www.linkedin.com/shareArticle?mini=true&url=<?=WEB_URL?>/artist/<?=$artist->slug?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                          <a class="fb fb-share" href="https://www.facebook.com/sharer/sharer.php?u=<?=WEB_URL?>/artist/<?=$artist->slug?>"><i aria-hidden="true" class="fa fa-facebook"></i></a>
                                          <a class="gp fb-share" href="https://plus.google.com/share?url=<?=WEB_URL?>/artist/<?=$artist->slug?>"><i aria-hidden="true" class="fa fa-google-plus"></i></a>
                                       </div>
                                    </li>
                                    <li>
                                    <div class="circul">
                                          <a href="javascript:void(0)" class="rating-click <?=$artist->rating_details->rating>0?'active':''?>"><i class="fa fa-star" aria-hidden="true"></i></a>
                                          <small id='rating_val'><?=$artist->rating_details->rating>0?$artist->rating_details->rating.'/'.'5':'rate'?></small>
                                    </div>
                                    </li>
                                    <li>
                                    <div class="circul">
                                          <a href="javascript:void(0)" class="haert-activator <?=$artist->is_fan?'active':''?>"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                          <small id="fan_count">
                                            <?php 
                                            foreach ($data['follower']->data as $key => $value) {
                                              if(empty($value->id) || $value->id == ''){
                                                $data['follower']->total_count-=1;
                                              }
                                            }
                                            ?>
                                            <?=$data['follower']->total_count?>
                                          </small>
                                    </div>
                                    </li>
                              </ul>
                        </div>
                  </div>
            </div>  
              
        
    <div class="selftab artist-tab" style="border-bottom: 1px solid #dfdfdf !important;">
      <ul class="tabs">
            <li class="tab show_item"><a href="#about" class="active">About</a></li>
                    <li class="tab show_item"><a href="#photos">photos</a></li>
                    <li class="tab show_item"><a href="#media">media</a></li>
                    <li class="tab hide_item"><a href="#network">network</a></li>
                    <li class="tab hide_item invisible"><a href="#events">Events</a></li>
            <li class="tab hide_item" style="visibility:hidden"><a href="#review">Review</a></li>
          </ul>
          <span class="culter-doite">
            <i class="fa fa-angle-right"></i>
          </span>
        </div>

          <div id="about" class="row marginbottom0">
            <div class="col s12">
              <div class="card venue-detail-row">
                                <div class="venue-detail">
                                      <p class="shortena"><?=$artist->brief_intro?></p>
                                </div>
                <div class="venue-detail">
                  <span>Performing Since</span>
                  <p><?=$artist->performance_start!='0000-00-00'?date('d M y',strtotime($artist->performance_start)):''?></p>
                </div>
                <div class="venue-detail">
                  <span>Type of Events</span>
                  <p class="shorten"><?=trim($event_type)?></p>
                </div>
                <div class="venue-detail">
                  <span>Genre</span>
                  <p class="shorten"><?=trim($genres)?></p>
                </div>
                <div class="venue-detail">
                  <span>Specialisation</span>
                  <p class="shorten"><?=$specializations?></p>
                </div>
                <?php if(!empty($tributes)){ ?>
                <div class="venue-detail">
                  <span>Can give tribute to</span>
                  <p class="shorten"><?=$tributes?></p>
                </div>
                <?php  } ?>
                                <div class="loadcontent">
                                      <div class="venue-detail">
                                            <span>Performance  Languages</span>
                                            <p class="shorten"><?=$linguage?></p>
                                      </div>
                                      <?php  if(!empty($artist->band_member)) {  ?>
                                      <div class="venue-detail">
                                            <span>Group Members</span>
                                            <p class="shorten"><?=$artist->band_member?></p>
                                      </div>
                                      <?php } ?>
                                      <?php  if(!empty($artist->gig_duration)) {  ?>
                                      <div class="venue-detail">
                                            <span>Gig Duration</span>
                                            <p ><?=$artist->gig_duration?> Minutes</p>
                                      </div>
                                      <?php } ?>
                                      <?php  if(!empty($artist->training)) {  ?>
                                      <div class="venue-detail">
                                            <span>Training &amp; Accredation</span>
                                            <p class="shorten"><?=$artist->training?></p>
                                      </div>
                                      <?php } ?>
                                      <div class="venue-detail">
                                            <span>Can Travel to Cities</span>
                                            <p class="shorten"><?=$travel_city?></p>
                                      </div>
                                      
                                      

                                      <div class="zomato-row">
                                        <?php if($artist->gplus_link){ ?>
                                            <a href="<?=$artist->gplus_link?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                          <?php } ?>
                                          <?php if($artist->gplus_link){ ?>
                                            <a href="<?=$artist->youtube_link?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                          <?php } ?>
                                          <?php if($artist->facebook_link){ ?>
                                            <a href="<?=$artist->facebook_link?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                          <?php } ?>
                                      </div>
                                </div>

                                <button id="aboutdetail" class="btn follbtn" type="button">View All</button>
                                
                
              </div>
            </div>
          </div>

            <div id="photos" class="row marginbottom0">
                  <div class="col s12">
                        <div class="card">
                              <div class="photo-list pt_media">
                              
                              </div>
                              <button id="photodetail" class="btn follbtn load_more_p" type="button">Load More</button>
                              <!-- <div class="btn-scrolltop"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></div> -->
                        </div>
                  </div>
            </div>

            <div id="media" class="row marginbottom0">
                  <div class="col s12">
                        <div class="card">
                              <ul class="mediatab jqmediatab right-align">
                                    <li class="active youtube_tab"><a href="#">
                                          <i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="music_tab">
                                          <a href="#"><i class="fa fa-music" aria-hidden="true"></i></a>
                                    </li>
                              </ul>

                              <div class="photo-list medialist yt_media active">
                                    
                              </div>
                              <div class="yt_btn">
                                <button id="mediavideo" class="btn follbtn load_more_yt" type="button">Load More</button>
                                
                              </div>
                              

                             <div class="photo-list medialist sc_media">
                              </div>
                              <div class="sc_btn hide">
                                <button id="audiomedia" class="btn follbtn load_more_sc" type="button">Load More</button>
                                
                              </div>
                               
                             
                        </div>
                  </div>
            </div>

          <div id="network" class="row marginbottom0">
            <div class="col s12">
              <div class="card">
                <ul class="mediatab jqnetworktab right-align">
                  <li class=" follower_tab active"><a href="#">
                    Followers <i class="material-icons">group</i></a>
                  </li>
                  <li class="following_tab">
                    <a href="#">
                    Following <i class="material-icons">directions_run</i></a>
                  </li>
                </ul>

                <div class="photo-list networktab-content active" id="follower"> 
                </div>
                <div class="follower_btn">
                   <button id="followdetail" type="button" class="btn follbtn load_more_fr">Load More</button>
                   
                </div>

                <div class="photo-list networktab-content" id="following">
                     
                </div>
                <div class="following_btn hide">
                    <button id="followingdetail" type="button" class="btn follbtn load_more_fg">Load More</button>
                    
                </div>
              
              </div>
            </div>
          </div>
          <div id="events" class="row marginbottom0">
                  <div class="col s12">
                        <div class="card">
                              <ul class="mediatab jqevent-tab right-align">
                                 <li id="ye" class="active">
                                    <a href="javascript:void(0)">Yahavi <i class="material-icons">work</i></a>
                                 </li>
                                 <li id="oe">
                                    <a href="javascript:void(0)">Other <i class="fa fa-briefcase" aria-hidden="true"></i></a>
                                 </li>
                              </ul>
                              <div class="eventyahaviTab current">
                                    <div class="tilerow" id="yahavi_events">
                                          
                                    </div>
                                    <button class="btn follbtn load_more_ye" type="button">Load More</button>
                              </div>
                              <div class="eventyahaviTab" style="display:none">
                                    <div class="tilerow" id="other_events">
                                          
                                    </div>
                                    <button class="btn follbtn load_more_oe" type="button">Load More</button>
                              </div>
                        </div>
                  </div>
                  
            </div>
  </section>
</div>

 <!-- Modal Structure -->
<div id="modal1" class="modal mediamodal">
    <div class="modal-content">
      <p>Are you soure want to delete?</p>
    </div>
    <div class="modal-footer modalfooter-btn">
     <a class="btn modal-close">no</a>
      <a class="btn modal-close btnbg-white modalremove1">yes</a>
    </div>
</div>
<div id="modal3" class="modal mediamodal">
    <div class="modal-content">
      <p>Are you soure want to delete?</p>
    </div>
    <div class="modal-footer modalfooter-btn">
     <a class="btn modal-close">no</a>
      <a class="btn modal-close btnbg-white modalremove3">yes</a>
    </div>
</div>

<!--Media audio video uplod-->
<div id="modal2" class="modal">
    <div class="modal-content media-uplod">
    <h5>Add link</h5>
      <div class="center-align">
            <input type="text" id="add_m" name="youtube" placeholder="Add Youtube/Soundcloud link">
            <button class="waves-effect waves-light btn add_media" type="submit">upload</button>
      </div>
    </div>
</div>

<div id="modal11" class="modal  eventrate-modal">
  <form action="#" method="post">
      <div class="modal-content ratecontent-sec">
        
        <div class="rate-artist1-img center">
          <img src="<?=$artist->profile_pic?>?d=50x50" alt="img">
        </div>
      
        <div class="rate-artist1 clearfix">
          <div class="rate-artist1-name center">
          <h6><?=$artist->name?></h6>
            <div class="artist1-star-row artist-rate" data-artist="<?=$artist->id?>" data-rating="<?=$artist->rating_details->rating?$artist->rating_details->rating:'0'?>">

            </div>
            <p class="center-align rate-change" style="padding-top:10px;">Had a change of heart?</p>
            <p class="center-align rate-change">Just re-rate this artist.</p>
          </div>
        </div>
        <div style="border-bottom:none;" class="modal-rating-radio  <?=$artist->rating_details->rating>3?'':'rating_show'?>" id="ratelist">
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
          <div class="comment-input <?=$artist->rating_details->reason==7?'comment-input-show':''?>">
            <input maxlength="600" type="text" name="reason_details" value="<?=$artist->rating_details->reason_details?>" placeholder="   Only alphabets(600 characters).">
          </div>
        </div>
      </div>
      <div class="modal-footer center-align conformation-footer">
        <button  class=" waves-effect waves-light btn <?=$artist->rating>3?'comment-input-hide':''?> " id="artist-rate" type="button">Submit</button>
      </div>
  </form>
</div>
<style type="text/css">
  #modal4{
    z-index: 1125 !important;
  }
</style>
<?php 
  View::make('/mobile/include/v1_footer');

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
  $(document).ready(function(){

  // Tabing section
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


  // Media inside tab
    $('.jqmediatab li').on('click', function(e){

      var $this=$(this).parents('.card');
      var ind=$(this).index();
      $(this).addClass('active').siblings('li').removeClass('active');
      $this.find('.medialist:eq('+ind+')').slideDown().siblings('.medialist').slideUp();
      if($('.youtube_tab').hasClass('active')){
        
        $('.sc_btn').addClass('hide');
        $('.yt_btn').removeClass('hide');
        
      }else{ 
        $('.sc_btn').removeClass('hide');
        $('.yt_btn').addClass('hide');
      }
      e.preventDefault();
    });

  // Network inside tab
    $('.jqnetworktab li').on('click', function(e){
      var $this=$(this).parents('.card');
      var ind=$(this).index();
      $(this).addClass('active').siblings('li').removeClass('active');
      $this.find('.photo-list:eq('+ind+')').slideDown().siblings('.photo-list').slideUp(300);
      if($('.follower_tab').hasClass('active')){
        
        $('.following_btn').addClass('hide');
        $('.follower_btn').removeClass('hide');
        
      }else{ 
        $('.following_btn').removeClass('hide');
        $('.follower_btn').addClass('hide');
      }
      e.preventDefault();
    });

    $('.jqevent-tab li').on('click', function(){
            var ind=$(this).index();
            $(this).addClass('active').siblings('li').removeClass('active');
            $('.eventyahaviTab:eq('+ind+')').slideDown().siblings('.eventyahaviTab').slideUp();
      });
/*    $('.following-rating').on('click', function(){
      $(this).toggleClass('active');
    });*/


  //Click event to scroll to top
        $('.btn-scrolltop').click(function(){
              $('html, body').animate({scrollTop:0});
        });

        

        $('#photodetail').on('click', function(){
            /*$(this).hide();*/
            var $this=$(this).parents('.photo-list').find('.loadcontent'); 
            $this.show(); 
            $('.btn-scrolltop').fadeIn();
        });

        $('#mediavideo').on('click', function(){
            /*$(this).hide();*/
            var $this=$(this).parents('.photo-list').find('.loadcontent'); 
            $this.show(); 
            $('.btn-scrolltop').fadeIn();
        });

        $('#audiomedia').on('click', function(){
            /*$(this).hide();*/
            var $this=$(this).parents('.photo-list').find('.loadcontent'); 
            $this.show(); 
            $('.btn-scrolltop').fadeIn();
        });

        $('#followdetail').on('click', function(){
            /*$(this).hide();*/
            var $this=$(this).parents('.photo-list').find('.loadcontent'); 
            $this.show(); 
            $('.btn-scrolltop').fadeIn();
        });

        $('#followingdetail').on('click', function(){
            /*$(this).hide();*/
            var $this=$(this).parents('.photo-list').find('.loadcontent'); 
            $this.show(); 
            $('.btn-scrolltop').fadeIn();
        });

        $('.tabs li, .culter-doite, .mediatab ').on('click', function(){
          $('.btn-scrolltop').fadeOut();
        });

        

  // Share click to linkdin open
        $('.btnshare2').on('click', function(){
              var elm=$(this).parents('li').find('.social-col');
              var url=$(this).attr('data-url');
             if(elm.is(':hidden')){
              elm.show();
              $.ajax({
                url:'https://graph.facebook.com/v2.8/?id='+url+'&access_token=1537332409822532|38f19bd21aff0c7f8b12b07aff899277',
                method:'GET',
              }).done(function(data){
                if(typeof data.share === "undefined"){
                  $('.share_count').text('0 shares'); 
                }else{
                  $('.share_count').text(data.share.share_count+' shares');
                }
              });

             }else{
              elm.hide();
             }
        });
        $(document).on('click', function(event){
          if(!$(event.target).closest('.social-col, .btnshare2').length){
              $('.social-col').hide();
          }
        });

  // More or less
        $('.btn-read').on('click', function(){
              var text=$(this).parents('.venue-detail').find('.readtext');
              if(text.is(':hidden')){
                    text.show();
                    $(this).hide();
              }
        });
        $('.btn-less').on('click', function(){
            var text=$(this).parents('.venue-detail');
                text.find('.readtext').hide();
                text.find('.btn-read').show();
        });

  //Window on scroll fixed the tab

  // Hand follow click toggle
       /* $('.handsprite-hand').on('click', function() {
              $(this).toggleClass('active');
        });*/

  /*// Remove image tile
        var $currentelm;
        $('.delet-btn').on('click', function () {
              $currentelm = $(this).parents('.photolist-inner')
        });
        $('.modalremove1').click(function(){
              $currentelm.remove();
        });*/

  //REVIEW SECTION RATING
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
            $(this).toggleClass('active');
           $('#rate-card').slideToggle();
        });


  });
</script>

<script type="text/javascript">
  $('.fb-share').click(function(e) {
    e.preventDefault();
    window.open(this.href, 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=1');
    return false;
  });

  $(document).ready(function(){
    $(document).on('click','.follower',function(){
      $this=$(this);
      if (!access_token) {
        $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
        $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
        $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
        $('.header-signup').trigger('click');
        $('.jqblogin-btn').trigger('click');
        return false;
      };
      var artist_id=$(this).attr('data-id');
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
            return false;
          }
          else{
            message('error');
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
            return false;
          }
          else{
            message('error');
          }
          return false;
        });
      }
    });

    $(document).on('click','.following',function(){
        $this=$(this);
        if (!access_token) {
          $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          $('.header-signup').trigger('click');
          $('.jqblogin-btn').trigger('click');
          return false;
        };
        var artist_id=$(this).attr('data-id');
        if (($this).hasClass('ajax-waiting')) {
          return false;
        };
        $this.addClass('ajax-waiting');
          $.ajax({
            url:'<?=API_URL?>/artist/'+artist_id+'/fan/remove',
            data:query_token,
            method:'POST',
          }).done(function(data){
            $this.removeClass('ajax-waiting');
            result=$.parseJSON(data);
            if(result.success=='1'){
              $this.parents('.photolist-inner').remove();
              return false;
            }
            else{
              message('error');
            }
            return false;
          });   
    });
    $(document).on('click','.handsprite-hand_pic', function(){
        if (!access_token) {
          $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          $('.header-signup').trigger('click');
          $('.jqblogin-btn').trigger('click');
          return false;
      };
      $this=$(this);
      var pic_id=$(this).attr('data-id');
      var like_count=$this.parent().find('span').text();
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
            $this.removeClass('ajax-waiting').removeClass('active');
            $this.parent().find('span').text(parseInt(like_count)-1);

            return false;
          }
          else{
            message('some probelem occured');
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
            $this.removeClass('ajax-waiting').addClass('active');
            $this.parent().find('span').text(parseInt(like_count)+1);;
            return false;
          }
          else{
            message('some probelem occured');
          }
          return false;
        });
      }
    });
      $(document).on('click','.handsprite-hand_vid', function(){
        if (!access_token) {
          $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          $('.header-signup').trigger('click');
          $('.jqblogin-btn').trigger('click');
          return false;
      };
      $this=$(this);
      var pic_id=$(this).attr('data-id');
      var like_count=$this.parent().find('span').text();
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
            $this.removeClass('ajax-waiting').removeClass('active');
            $this.parent().find('span').text(parseInt(like_count)-1);

            return false;
          }
          else{
            message('some probelem occured');
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
            $this.removeClass('ajax-waiting').addClass('active');
            $this.parent().find('span').text(parseInt(like_count)+1);;
            return false;
          }
          else{
            message('some probelem occured');
          }
          return false;
        });
      }
    });



    var pic_id='';var currentelm;
    $(document).on('click','.btntrash_i',function(){
      pic_id=$(this).attr('data-id');
      currentelm = $(this).parents('.photolist-inner');
      $('#modal1').openModal();
    });
    $('.modalremove1').click(function(){
              deleteGalleryItem(currentelm,'image');
    });

    $(document).on('click','.btntrash_v',function(){
      pic_id=$(this).attr('data-id');
      currentelm = $(this).parents('.photolist-inner');
      $('#modal3').openModal();
    });
    $('.modalremove3').click(function(){
              deleteGalleryItem(currentelm,'video');
    });

    function deleteGalleryItem(item,type){
      $this=item;
      pic_id=item.find('.btntrash_i').attr('data-id');
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
          $this.remove();
        }else{
          message('Can\'t delete '+type);
        };
      });
    }
});

</script>

<script type="text/javascript">
  $(document).ready(function(){

    var ajaxi=1;
    $(".pulod_file").on('change',function(){
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("input_image").files[0]);
      oFReader.onload = function (oFREvent) {

       $(makePhoto(oFREvent.target.result,ajaxi)).insertAfter($(".pt_media").find(".photolist-inner:first"));
       ajaxi++;
     };
     submitForm('#saving_'+ajaxi);
   });

    $(".upload-trigger").click(function(){
      $(".pulod_file").trigger("click");
    })
    
    load_photo();

    load_video('yt',0);

    load_video('sc',0);

    loadFollower(1);

    loadFollowing(1);
  
    loadEvents(1,1);
    
    loadEvents(1,2);

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
  
  $(window).scroll(function() {
    var height=$(document).height() - $(window).height()-10;
    if($(window).scrollTop()>height) {
        if($('#photos').is(':visible')){
          $('.loader').fadeIn(1000);
          $('.load_more_p').trigger('click');
        }else if($('#media').is(':visible') && $('.youtube_tab').hasClass('active')){
          $('.loader').fadeIn(1000);
          $('.load_more_yt').trigger('click');
        }
        else if($('#media').is(':visible') && $('.music_tab').hasClass('active')){
          $('.loader').fadeIn(1000);
          $('.load_more_sc').trigger('click');
        }
        else if($('#networks').is(':visible') && $('.follower_tab').hasClass('active')){
          $('.loader').fadeIn(1000);
          $('.load_more_fr').trigger('click');
        }
        else if($('#networks').is(':visible') && $('.following_tab').hasClass('active')){
          $('.loader').fadeIn(1000);
          $('.load_more_fg').trigger('click');
        }
        else if($('#events').is(':visible') && $('#ye').hasClass('active')){
          $('.loader').fadeIn(1000);
          $('.load_more_ye').trigger('click');
        }
        else if($('#events').is(':visible') && $('#oe').hasClass('active')){
          $('.loader').fadeIn(1000);
          $('.load_more_oe').trigger('click');
        }
    }
  });

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
      return '<div class="photolist-inner card" style="margin-left:2px;margin-right:2px">'+
        '<a href="/event/'+v.id+'">'+
        '<div class="eventImageRow">'+
        '<img src="'+v.event_image+'?d=144x80" alt="image">'+
        '</div>'+
        '</a>'+
        '<div class="event-info">'+
        '<a href="/event/'+v.id+'"><span class="ellipsis" style="margin-bottom:4px">'+v.name+'</span></a>'+
        '<p class="ellipsis">'+v.venue_name+'</p>'+
        '<p><i class="fa fa-calendar" aria-hidden="true"></i>'+v.dateStr+'</p>'+
        '</div>'+
        '</div>';
    }
    return '<div class="photolist-inner card" style="margin-left:2px;margin-right:2px">'+
      '<div class="eventImageRow">'+
      '<a target="blank" href="'+v.url+'">'+
      '<img src="'+v.image+'" alt="image" style="width:144px;height:80px">'+
      '</a>'+
      '</div>'+
      '<div class="event-info">'+
      '<a target="blank" href="'+v.url+'"><span class="ellipsis" style="margin-bottom:4px">'+v.name+'</span></a>'+
      '<p class="ellipsis">'+v.venue_name+'</p>'+
      '<p><i class="fa fa-calendar" aria-hidden="true"></i>'+v.dateStr+'</p>'+
      '</div>'+
      '</div>';
  }
  function makePhoto(src,ajaxi,id){
     return '<div class="photolist-inner" id="saving_'+ajaxi+'">'+
    '<div class="photoimage">'+
    '<a href="'+v.image+'?d=0x'+dHeight+'" data-featherlight-loading="Loading..." data-featherlight="image"><div class="image">'+
    '<img src="'+src+'" alt="image">'+
    '<div class="ratingbox">'+
    '<i class="handsprite-hand handsprite-hand_pic"></i>'+
    '<span>0</span>'+
    '</div>'+
    '</div>'+
    '</div>';


  }

  function makeGalleryPhoto(v){
    var dHeight=$(document).height();
    var like='';
    if (v.is_like>0) {
      like='active';
    }
    return '<div class="photolist-inner" data-id="'+v.id+'">'+
    '<div class="photoimage">'+
    '<a class="image abc" href="#" data-id="'+v.id+'" data-type="image">'+
    '<img src="'+v.image+'" alt="image"></a>'+
    '<a href="javascript:void(0)"data-id="'+v.id+'"></a>'+
    '<div class="ratingbox">'+
    '<i class="handsprite-hand handsprite-hand_pic '+like+'" data-id="'+v.id+'"></i>'+
    '<span>'+v.total_like+'</span>'+
    '</div>'+
    '</div>'+
    '</div>';
  }
  var dW=$(window).width()-20;
  var dH=Math.round(dW/1.77);
  
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

      return '<div class="photolist-inner" data-id="'+v.id+'">'+
      '<div class="photoimage">'+views+
      '<a class="image abc" data-id="'+v.id+'" data-type="'+v.type+'">'+
      '<img src="'+v.thumb+'" alt="image">'+
      '<div class="yplay"><i class="material-icons">play_circle_outline</i></div></a>'+
      '<a  href="javascript:void(0)"></a>'+
      '<div class="ratingbox">'+
      '<i class="handsprite-hand handsprite-hand_vid '+str+'" data-id="'+v.id+'"></i>'+
      '<span>'+v.total_like+'</span>'+
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
        $(".pt_media").append('<p style="margin-left:25px;font-size:15px">No photos uploaded by this artist.</p>');
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
            $('.'+mType+'_media').append('<p style="font-size:15px">No '+media+' uploaded by this artist.');
          }
        }
    });
}
function submitForm(i){
  var form=$("#gallery_upload");
  formData= new FormData(form[0]);
  $.ajax({
    url: "<?=API_URL?>/artist/gallery/image?"+query_token,
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
         // if ($('.pt_media > div.center-align').text()==='No Photo Uploaded'){
         //          $('.pt_media > div.center-align').hide();
         //      }
         $(i).find(".ajax-loading").remove();
         $(i).find('.handsprite-hand_pic').attr('data-id',result.data.id);
         $(i).find('.btntrash_i').attr('data-id',result.data.id);
         $(i).find(".btntrash_i").show();

       }else{
        $(i).remove();
      }
    });
}


   var access_token='<?=$_COOKIE["access_token"]?>';
  function mekeFollower(v,a){
    var str=''; var is_following=' follower'; var hide=''; var link='';
    if (v.name==null) {
      return '';
    }
    if(v.is_like>0){
       str='active ';
    }
    if(v.user_type!=1){
      hide='hide';
      link='<span class="wrap" title="'+v.name+'">'+v.name+'</span>';
    }else{
      link='<a href="/artist/'+v.id+'"><span class="wrap" title="'+v.name+'">'+v.name+'</span></a>';
    }
   /* if(a>0){
      is_following='active following';
    }else{
      is_following=' follower';
    }*/
    return '<div class="photolist-inner z-depth-1">'+
    '<div class="photoimage">'+
    '<img src="'+v.profile_pic+'" alt="image">'+
    '<div class="following-rating '+hide+str+is_following+'" data-id="'+v.id+'">'+
    '<i class="fa fa-heart" aria-hidden="true"></i>'+
    '</div>'+
    '</div>'+
    '<div class="followname">'+link+
    '</div>'+
    '</div>';
    
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
        $("#follower").append(mekeFollower(v,0));
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
        $("#following").append(mekeFollower(v,1));
      });
      if (result.data.data.length<10) {
        btn.remove();
      }else{
        btn.attr('data-after',parseInt(nPage)+1);
      };
    }
    });
  }
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $(".add_media").on('click',function(e){
      var url=$("#add_m").val().trim();
      if (url=='') {
        $("#add_m").focus();
        return false;
      };
      $('.addnew-video').hide();
      $("#add_m").val('');
      $('#modal2').closeModal();
      
      $.ajax({
        url:'<?=API_URL?>/artist/gallery/video',
        method:'POST',
        data:'url='+url+'&'+query_token,
      }).done(function(data){
        result=$.parseJSON(data);
        if (result.success=='1') {
          $(makeVideo(result.data)).insertAfter($('.'+result.data.type+'_media').find('.photolist-inner:first'));
            //$('.abc').featherlight('iframe');
            $('#'+result.data.type+'i').trigger("click");
          }else{
            message('Not a valid url or Server Problem,Try Again');
          };
        });
    });
  });






/*$('.abc').featherlight({
  afterOpen:function(){
   $("iframe.featherlight-inner").attr('allowFullScreen','allowFullScreen').attr('frameborder','4px').attr('src',$("iframe.featherlight-inner").attr('src'));
  }
});*/
$(".rating-click").click(function() {
  if (!access_token) {
    $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          $('.header-signup').trigger('click');
        $('.jqblogin-btn').trigger('click');
          return false;
  };
  $("#modal11").openModal();
});
</script>

<script type="text/javascript">
      $(document).ready(function(){
         $('.haert-activator').click(function(){
        if (!access_token) {
          $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
          $('.header-signup').trigger('click');
        $('.jqblogin-btn').trigger('click');
          return false;
        };
        <?php if(!($user->is_approved>0 || $user->user_type==3)){ ?>
        message("To enhance user experience we are approving profiles. Either your profile is not complete or it is awaiting approval. Please wait for a bit.");
        return false;
        <?php } ?>
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
              message('some probelem occured');
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
            message('some probelem occured');
          }
          return false;
        });
      }
    });
      });

  $('.selftab').scrollToFixed({
    marginTop:$('#main-header').height()
  });
  $(".shorten").shorten({
    "showChars" : 83,
    "moreText"  : "",
    "lessText"  : "",
    });

  $(".shortena").shorten({
    "showChars" : 83,
    "moreText"  : "More",
    "lessText"  : "Less",
    });

  $('#aboutdetail').on('click', function(){
      if ($(this).hasClass('more')) {
        //show less
        $(".moreellipses").show();
        $(".morecontent").find('span').hide();
        $(this).text('View All');
        $(".shortena").find('.morelink').text("More");
        $(this).parents('.venue-detail-row').find('.loadcontent').hide();
      }else{
        //show more
        $(".moreellipses").hide();
        $(".morecontent").find('span').css('text-transform','none').css('display','inline');
        $(this).text('View Less');
        $(".shortena").find('.morelink').text("Less");
        $(this).parents('.venue-detail-row').find('.loadcontent').show();
      }
      $(this).toggleClass('more');
  });
  $(".morelink").click(function(e) {
    e.preventDefault();
    if ($(this).text()=='More') {
        $(".shortena").find(".moreellipses").hide();
        $(".shortena").find(".morecontent").find('span').css('text-transform','none').css('display','inline');
        $(this).text('Less');
    }else{
        $(".shortena").find(".moreellipses").show();
        $(".shortena").find(".morecontent").find('span').css('text-transform','none').hide();
        $(this).text('More');
    }
    return false;
  });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });
    $('body').append('<style>.scrollup {position: fixed;bottom: 40px;right: 40px;display: none;border-radius: 50%;border: 1px solid #01b7ba;width: 50px;height: 50px;text-align: center;line-height: 50px;color: white;background-color: #01b7ba;cursor: pointer;z-index: 999;}</style>');
    $('body').append('<span class="scrollup"><i class="fa fa-arrow-up"></i></span>');
    $(document).on('click','.scrollup',function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
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
  var url='<?=API_URL?>/artist/<?=$artist->id?>/gallery/'+id+'/next?dir='+dir+'&type='+type+'&'+query_token;
  $.ajax({
    url: url,
  }).done(function(data) {
    var result=$.parseJSON(data);
    if (!result.success==1) {
      closeGallery();
      message('error');
      return false;
    };
    if (!result.data.id) {
      closeGallery();
      message('No Item found');
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
      $('.customemodoal-inner').append('<iframe style="display:none" src="'+src+'" allowFullScreen></iframe>');
      $('.customemodoal-inner').find('iframe').load(function(){
        $('.customemodoal-inner').find('img').remove();
        $(this).show();
      });
    }
  }); 
}
function closeGallery(){
  $('html').removeAttr('style');
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
  $('html').css('overflow', 'hidden');
}

$('.close').click(function(e) {
    closeGallery();
});

$('.controls .right').click(function() {
  slideGallery(currId,currType,1);
});

$('.controls .left').click(function() {
  slideGallery(currId,currType,0);
});

$(document).keyup(function(e) {
  if (!$('.customemodoal').is(':visible')) {
      return false;
    }
    if (e.which=='39') {
      var dir=1;
    } else if(e.which=='37'){
      var dir=0;
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
     $('#modal11').closeModal();
      var access_token='<?=$_COOKIE["access_token"]?>';
      var arr=[];
      var a=$('.artist-rate');
      if(a.attr('data-rating')=='0'){
        message("Please rate the artist between 1 and 5.");
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
        $('#rate-card').slideUp();
        $('#rating_val').text(a.attr('data-rating')+'/5');
        $('.rating-click').addClass('active');
        $this.removeClass('ajax-waiting');
        setTimeout(function() { message('Thanks for your feedback.\nThis would help us improve your future experience.'); }, 200);
        $('.rate-activator').addClass('active').find('span').text(a.attr('data-rating'));
      }
      else{
        message(result.message);
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
    message(" To Hire Artist Please Register Or Login As Business");
    $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    e.stopPropagation();
    $('.header-signup').trigger('click');
    $('.jqblogin-btn').trigger('click');
    return false;
  });

})
</script>
</body>
</html>

