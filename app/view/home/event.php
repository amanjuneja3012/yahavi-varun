<?php

$event=$data['event'];
$curl=new curl;
$json=$curl->get(API_URL.'/venue/zomato/'.$event->zomato_url.'?'.Helper::queryToken());
$zomato=json_decode($json);

$json=$curl->get(API_URL.'/event/rateArtistlist/'.$event->id.'?'.Helper::queryToken());
$rateArtistlist=json_decode($json)->data;

$json=$curl->get(API_URL.'/event/rateEventlist/'.$event->id.'?'.Helper::queryToken());
$rateEventlist=json_decode($json)->data[0];

if ($event->artist_id>0) {
  $ev_name.=' with '.$event->artist_name;
}
$ev_desc=$event->venue_name.', '.$event->city.', '.$event->locality;
if (strlen(trim($event->brief_desc))) {
  $ev_desc=trim($event->brief_desc);
}
$artist_name='';
if (sizeof($event->artists)) {
  foreach ($event->artists as $key => $value) {
    $artist_name.='<a style="color:#2f4b93" href="/artist/'.Helper::encodeSlug($value->name,$value->id).'">'.$value->name.'</a>, ';
  }

}

if (strlen($event->other_artists)>1) {
  $artist_name.=$event->other_artists;
}else{
  $artist_name=rtrim($artist_name,', ');
}
$ev_descs=strlen($ev_desc)>150?substr($ev_desc, 0,147).'...':$ev_desc;

$headerKey = isset($data['headerKey'])?$data['headerKey']:'';
$url='https://www.yahavi.com/event/'.Helper::encodeSlug($event->name,$event->id);

$head=[
  '<meta name="Content-Type" content="text/html; charset=utf-8">',
  '<meta name="description" content="'.$ev_descs.'">',
  '<meta property="og:title" content="'.$event->name.' - Yahavi">',
  '<meta property="og:url" content="'.$url.'">',
  '<meta property="og:image" content="'.$event->event_image.'">',
  '<meta property="og:description" content="'.$ev_desc.'">',
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
  '<meta name="twitter:title" content="'.$event->name.' - Yahavi">',
  '<meta name="twitter:description" content="'.$ev_desc.'">',
  '<meta name="twitter:image" content="'.$event->event_image.'">',
  '<meta name="viewport" content="width=device-width, initial-scale=1.0">',
];
View::make('include/v1_header',array('title'=>$event->name.' with '.strip_tags($artist_name).' - Yahavi','headerKey'=>'event','head'=>$head));
$genre='';
foreach ($event->genres as $key => $value) {
  $genre.=$value->name.', ';
}
$genre=rtrim($genre,', ');
?>

<style>
  .modaladjust11 h4{
   display:inline-block;
   margin-bottom: 0;
   height: 30px;
   line-height: 30px;
  }
  .modaladjust11 .eventrate-row{
    margin-bottom: 0;
    display:inline-block;
    width: auto;
    vertical-align: top;
  }
  .modaladjust11 .eventrate-col{
    padding: 0;
  }
  .rate-review5{
    border-color: rgb(254, 91, 86)!important;
  }
  .modal .modal-content.ratecontent-sec{
    padding-bottom: 0;
  }
  .modal-rateadjust .modal-rating-radio{
    border-bottom: 1px solid #d8d8d8;
    padding-bottom: 15px;
  }
  .eventrate-modal .rate-artist1 {
    border: none;
  }
  .rate-artist1-name{
    margin-left: 0px;
    text-align: center;
  }
  .ratecontent-sec .rate-artist1-img{
    margin: 0 auto 5px;
  }
  .rated1{
    position: static;
  }
  .eventrate-modal .modal-content h4{
    text-align: center;
    font-weight: 600;
    border-bottom: 1px solid #d8d8d8;
    padding-bottom: 10px; 
    display: block;
   }
   .modal-rating-radio span{
    font-weight: 600;
   }
   .faved{
    background: #fe5b56;
    border-color: #fe5b56 !important;
    color: #fff !important;
  }
  .share_count{
    position: absolute;
    height: 15px;
    width: 100%;
    right: 0;
    top: -14px;
    color: #fff;
    text-align: right;
    font-size: 10px;
    background: rgba(0,0,0,0.54);
  }
</style>


                  <div style="display:none">
                    <a href="https://www.yahavi.com">Yahavi</a>
                    <a href="https://www.yahavi.com">Yahavi</a>
                    <a href="https://www.yahavi.com">Yahavi</a>
                    <a href="https://www.yahavi.com">Yahavi</a>
                    <a href="https://www.yahavi.com">Yahavi</a>
                    <a href="https://www.yahavi.com">Yahavi</a>
                    <a href="https://www.yahavi.com">Yahavi</a>
                  </div>
                  <section id="content">
                    <!-- Page Layout here -->
                    <div class="row zero-bottom-margin">
                      <div class="col s9 " id="event-left">
                        <div class="card image-card" id="event-banner">
                          <h1 class="card-title"><a style="color:rgba(0, 0, 0, 0.87)" href="<?=$url?>"><?=$event->name?></a> with <?=$artist_name?></h1>
                          <div class="card-image">
                            <img class="activator" src="<?=$event->event_image?>?d=992x400" onError="this.onerror=null;this.src='https://cdn.yahavi.com/content/images/eventbg.png?d=992x400';" alt="<?=$event->name?>">
                          </div>
                          <div class="card-content">
                            <div>
                              <small><?=$event->view_count?> Views</small>
                              <div class="event-cta">
                                <a class="btn-social" data-url="<?=$url?>" href="javascript:void(0)">
                                  <i class="fa fa-share-alt"></i>
                                  <?php $share=json_encode(['id'=>$event->id,'type'=>'admin_events','url'=>$url]);?>
                                  <span class="count" data-share='<?=$share?>'><?=($event->fb_count+$event->tw_count+$event->gp_count)?></span>
                                </a>
                                <a class="event-following <?=!empty($event->is_follow)?'faved':''?>" href="javascript:void(0)">
                                  <i class="fa fa-heart"></i>
                                  <span class="count smooth-transition"><?=$event->event_follow_count?></span>
                                </a>

                                <div class="social-popup">
                                  <div class="socialinner">
                                    <div class="share_count"></div>
                                    <a class="twitter-bg fb-share" href="https://twitter.com/share?url=<?=$url?>"><i class="fa fa-twitter"></i></a>
                                    <a class="facebook-bg fb-share" href="https://www.facebook.com/sharer/sharer.php?u=<?=$url?>"><i class="fa fa-facebook"></i></a>
                                    <a class="google-bg fb-share" href="https://plus.google.com/share?url=<?=$url?>"><i class="fa fa-google-plus"></i></a>
                                  </div>
                                </div>
                                <?php
                                  if(strtotime($event->t_from)<time() and strtotime('+168 hours',strtotime($event->t_from))>time()){
                                   if(empty($rateEventlist->id)){ ?>
                                   <a href="javascript:void(0)" class=" rate-review5 rate">rate &amp; review</a>
                                   <?php } else{ ?>
                                   <a href="javascript:void(0)" class=" rate-review5 rate fill ">rated <i class="fa fa-star" aria-hidden="true"></i> </a>
                                   <?php } 
                                  }
                                 ?>
                              </div>  
                            </div>
                          </div>
                        </div>

                        <div class="card image-card" id="event-details">
                          <h2 class="card-title"><?=$artist_name?> | <?=$event->artist_category?></h2>
                          <div class="card-content">
                            <div class="address detail">
                              <h4 class="venue"><?=$event->venue_name?></h4>

                              <p class="address"><?=$event->address?$event->address:$zomato->location->address?></p>
                            </div>
                            <?php 
                            if ($zomato->cuisines) {?>
                              <div class="cuisines detail">
                              <strong>Cuisines</strong>
                              <p><?=$zomato->cuisines?></p>
                            </div>
                            <?php }?>
                            
                            <?php 
                            if ($zomato->average_cost_for_two) {?>
                            <div>
                              <strong style="font-size:14px;">Cost For Two</strong>
                              <p class="price detail"><span><i class="fa fa-inr"></i></span> <?=$zomato->currency.' '.$zomato->average_cost_for_two.' apprx.'?></p> 
                            </div>                       
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                      <div class="col s3" id="event-content">
                        <div class="card" id="event-about">
                          <div class="card-content">
                            <p><?=$event->brief_desc?></p>
                          </div>
                        </div>
                        <div class="card" id="event-going">
                          <div class="card-content booking-details-info">
                            <div class="schedule detail">
                              <div class="date" style="font-weight: 600;"><?=date('d  M   y',strtotime($event->t_from))?></div>

                              <?php 
                              $s=strtotime($event->t_to)-strtotime($event->t_from);
                              $h=floor($s/3600);
                              $m=floor(($s%3600)/60);
                              $duration=$h.' hrs '.$m.' min';
                              ?>
                              <span class="time"><?=date('h:i A',strtotime($event->t_from))?> - <?=date('h:i A',strtotime($event->t_to))?> </span>   
                            </div>                              
                            <div class="going detail">
                            <?php if (strtotime($event->t_to)<=time()) {?>
                             
                            <?php }else{?>
                              <div class="btngoing-event fix-temp-margin <?=$event->is_going?'active':''?> " data-id=<?=$event->id?>>
                                <span class="btn-going"><?=$event->is_going?'Going&nbsp;&nbsp;<i class="fa fa-check">':'Going?'?></i></span>
                                <small><?=$event->event_going_count?></small>
                              </div>
                              <?php } ?>
                              

                            </div>
                            <?php 
                            if ($event->target_url!='' and strtotime($event->t_from)>time()) {?>
                            <style>
                              .card .booking-details-info{
                                height: 130px !important;
                              }
                              .fix-temp-margin{
                                top: 16.5%!important;
                              }
                            </style>
                            <div class="booking detail event-going-booking">
                              <a href="<?=$event->target_url?>" target="blank"><button class="booking-confirm btn">Book</button></a>
                            </div>                                                
                            <?php } ?>
                            
                            
                          </div>
                        </div>
                        <?php if($event->rules){?>
                          <div class="card">
                          <div class="card-content">
                            <p class="truncate-rules"><?=$event->rules?></p>
                          </div>
                        </div>
                        <?php } ?>
                        <div class="card" id="event-pin">
                          <div class="card-content">
                            <?php 
                            if ($event->address) {?>
                            <div>
                              <iframe style="width:100%;height:300px" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCWU5OJnKeeiPo8VQ16BWCJrDvxw294VRw&q=<?=urlencode($event->address)?>" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            <?php }elseif ($zomato->location->latitude) {?>
                              <div id="map-canvas"></div>  
                            <?php }?>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                  <div id="modal11" class="modal eventrate-modal modal-rateadjust">
                    <form action="#" method="post">
                      <div class="modal-content ratecontent-sec">
                        <h4>Rate Artist</h4>
                        <?php foreach ($rateArtistlist as $key => $value) { ?>
                        <div class="rate-artist1 clearfix center">
                          <div class="rate-artist1-img">
                            <img src="<?=$value->profile_pic?>?d=50x50" alt="img">
                          </div>
                          <div class="rate-artist1-name">
                            <a href="/artist/<?=$value->artist_id?>"><h6><?=$value->name?></h6></a>
                            <div class="artist1-star-row artist-rate" data-artist="<?=$value->artist_id?>" data-rating="<?=$value->rating?$value->rating:'0'?>">

                            </div>
                            <?php if($value->self_rated==1){ ?>
                            <div class="rated1">Your Last rating</div>

                            <?php } ?>
                          </div>
                        </div>
                        <div class="modal-rating-radio toggle" id="ratelist">
                          <span>What could have been better?</span>
                          <p>
                            <input class="with-gap" value="1" name="reason<?=$value->artist_id?>" <?php if($value->reason==1){echo "checked";}?>  type="radio" id="<?=$value->artist_id?>test1">
                            <label for="<?=$value->artist_id?>test1">Punctuality</label>
                          </p>
                          <p>
                            <input class="with-gap" value="2" name="reason<?=$value->artist_id?>" <?php if($value->reason==2){echo "checked";}?>  type="radio" id="<?=$value->artist_id?>test2">
                            <label for="<?=$value->artist_id?>test2">Audience Interaction</label>
                          </p>
                          <p>
                            <input class="with-gap" value="3" name="reason<?=$value->artist_id?>" <?php if($value->reason==3){echo "checked";}?>  type="radio" id="<?=$value->artist_id?>test3">
                            <label for="<?=$value->artist_id?>test3">Choice of Songs</label>
                          </p>
                          <p>
                            <input class="with-gap" value="4" name="reason<?=$value->artist_id?>" <?php if($value->reason==4){echo "checked";}?>  type="radio" id="<?=$value->artist_id?>test4">
                            <label for="<?=$value->artist_id?>test4">Attire</label>
                          </p>
                          <p>
                            <input class="with-gap" value="5" name="reason<?=$value->artist_id?>" <?php if($value->reason==5){echo "checked";}?>  type="radio" id="<?=$value->artist_id?>test5">
                            <label for="<?=$value->artist_id?>test5">Frequency or duration of Breaks</label>
                          </p>
                          <p>
                            <input class="with-gap" value="6" name="reason<?=$value->artist_id?>" <?php if($value->reason==6){echo "checked";}?>  type="radio" id="<?=$value->artist_id?>test6">
                            <label for="<?=$value->artist_id?>test6">Artist Performance</label>
                          </p>
                          <p>
                            <input class="with-gap" value="7" name="reason<?=$value->artist_id?>" <?php if($value->reason==7){echo "checked";}?>  type="radio" id="<?=$value->artist_id?>test7">
                            <label for="<?=$value->artist_id?>test7">Something else :</label>
                          </p>
                          <div class="comment-input <?=$value->reason==7?'comment-input-show':''?>">
                              <input maxlength="600" type="text" name="reason_details" value="<?=$value->reason_details?>" placeholder="Only alphabets(600 characters).">
                          </div>
                        </div>
                        <?php } ?>

                      </div>
                      <div class="modal-footer center-align conformation-footer">
                        <button class=" waves-effect waves-light btn cancelbtn" id="artist-next" type="button">next</button>
                        <button class=" waves-effect waves-light btn" id="artist-rate" type="button">Submit</button>
                      </div>
                    </form>
                  </div>

                  <div id="modal2" class="modal eventrate-modal">
                    <form action="#" method="post">
                      <div class="modal-content ratecontent-sec modaladjust11">
                          <h4>Rate Event</h4>
                          
                          <div class="rate-artist1 clearfix">
                            <div class="rate-artist1-img">
                              <img src="<?=$event->event_image?>?d=50x50" alt="img">
                            </div>
                            <div class="rate-artist1-name">
                              <h6 style="color:#000;"><?=$event->name?></h6>
                              <div class="artist1-star-row event-rate" data-rating="<?=$rateEventlist->rating?>">
                              </div>
                              <?php if(!empty($rateEventlist)){ ?>
                                <div class="rated1">Your Last rating</div>
                              <?php } ?> 
                            </div>
                          </div>

                          <div class="modal-rating-radio event-radioadjust">
                            <span>What could have been better?</span>
                            <p>
                              <input class="with-gap" name="group1" value="1" type="radio" <?php if($rateEventlist->reason==1){echo "checked";}?>  id="rate1">
                              <label for="rate1">Services</label>
                            </p>
                            <p>
                              <input class="with-gap" name="group1" value="2" type="radio" <?php if($rateEventlist->reason==2){echo "checked";}?>  id="rate2">
                              <label for="rate2">F&B Quality</label>
                            </p>
                            <p>
                              <input class="with-gap" name="group1" value="3" type="radio" <?php if($rateEventlist->reason==3){echo "checked";}?>  id="rate3">
                              <label for="rate3">Ambience</label>
                            </p>
                            <p>
                              <input class="with-gap" name="group1" value="4" type="radio" <?php if($rateEventlist->reason==4){echo "checked";}?>  id="rate4">
                              <label for="rate4">Artist Performance</label>
                            </p>
                            <p>
                              <input class="with-gap" name="group1" value="5" type="radio" <?php if($rateEventlist->reason==5){echo "checked";}?>  id="rate5">
                              <label for="rate5">F&B Pricing</label>
                            </p>
                          </div>
                          <textarea maxlength="600" class="rating-textarea" name="review" id="review" placeholder="Write your review(600 characters)."><?=$rateEventlist->review?></textarea>
                        </div>
                        <div class="modal-footer center-align conformation-footer">
                          <button class="modal-close waves-effect waves-light btn cancelbtn <?=empty($rateArtistlist)?'hide':''?>" type="button" id="event-prev">Prev</button>
                          <button class="modal-close waves-effect waves-light btn" type="button" id="event-rate">Submit</button>
                        </div>
                      </form>
                    </div>
                </div>

                <?php View::make('/include/v1_footer') ?>

                <script type="text/javascript">
                var query_token='<?=Helper::queryToken()?>';
                  $(document).on('ready',function(){



                    var myLatLng = {lat: <?=$zomato->location->latitude?$zomato->location->latitude:0?>, lng: <?=$zomato->location->longitude?$zomato->location->longitude:0?>};
                    var map = new google.maps.Map(document.getElementById('map-canvas'), {
                      zoom: 15,
                      center: myLatLng
                    });
                    var marker = new google.maps.Marker({
                      position: myLatLng,
                      map: map,
                      title: 'Hello World!'
                    });
                  });

/*$('.event-following').click(function(){
$(this).toggleClass('active');
$(this).find('.count').toggleClass('event-following active-follow');
});*/

/*$('.btn-social').on('click', function(){
$(this).parents('.event-cta, .cta').find('.social-popup').show();
});*/
$(document).on('click',function(event){
  if(!$(event.target).closest('.btn-social').length && !$(event.target).closest('.social-popup').length){
    $('.social-popup').hide();
  }
});

$('.going-button').on('click',function(){
  $(this).toggleClass('going-confirm');
});

$('.fb-share').click(function(e) {
  e.preventDefault();
  window.open(this.href, 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=1');
  return false;
});
</script>

<script type="text/javascript">
  var access_token="<?=isset($_COOKIE['access_token'])?$_COOKIE['access_token']:''?>";
  $(document).ready(function(){
    $('.btngoing-event').click(function(){
      if (!access_token) {
        $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
        $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
        $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
        $('.jq-login').trigger('click');
        return false;
      };
      if ($(this).hasClass('not-follow')) {
        return false;
      }
      $this=$(this);
      var id="<?=$event->id?>";
      $(this).prop('disabled',true);
      if (($this).hasClass('ajax-waiting')) {
        return false;
      };
      $this.addClass('ajax-waiting');
      if($this.hasClass('active')){
        $.ajax({
          url:'<?=API_URL?>/eventgoing/'+id+'/remove',
          data:query_token,
          method:'POST',
        }).done(function(data){
          $this.removeClass('ajax-waiting');
          result=$.parseJSON(data);
          if(result.success=='1'){
            $this.find('span').text('Going?');
            $this.removeClass('active');
            $this.removeClass('active').prop('disabled',false);
            var going=$this.find('small');
            going.text(going.text()-1);
            return false;
          }
          else{
            alert('some probelem occured');
          }
          return false;
        }); 
      }
      else{
        $.ajax({
          url:'<?=API_URL?>/eventgoing/'+id,
          data:query_token,
          method:'POST',
        }).done(function(data){
          $this.removeClass('ajax-waiting');
          result=$.parseJSON(data);
          if(result.success=='1'){
            $this.find('span').text('Going').append('&nbsp;&nbsp;<i class="fa fa-check"></i>');
            $this.find('btn-going i').addClass('fa-check');
            $this.addClass('active');
            $this.addClass('active').prop('disabled',false);
            var going=$this.find('small');
            going.text(parseInt(going.text())+1);
            return false;
          }
          else{
            alert('some probelem occured');
          }
          return false;
        });
      }
    });
    $('.artist-rate, .event-rate').on('click', function() {
      if($(this).attr('data-rating')>3){
        var $box=$(this).parents('.rate-artist1, .eventrate-row').next('.modal-rating-radio');
        $box.slideUp().attr('checked',false);
      }else{
        var $box=$(this).parents('.rate-artist1, .eventrate-row').next('.modal-rating-radio');
          $box.slideDown();
      }
    });

    $('#artist-next').click(function(){
        $('#modal11').closeModal();
        $('#modal2').openModal();
    });
    $('#event-prev').click(function(){
        $('#modal12').closeModal();
        $('#modal11').openModal();
    });

    $(document).on('click','#artist-rate',function(){
      $this=$(this);
      if($this.hasClass('ajax-waiting')){
        return false;
      }
      $this.addClass('ajax-waiting');
      var arr=[];
      $('.artist-rate').each(function(i,v){
        var c='';
        var a=$(this);
        var b=a.parents('.rate-artist1, .eventrate-row').next('.modal-rating-radio').find('input[type="radio"]:checked').val();
        if(b==undefined || a.attr('data-rating')>3){
          b='0';
        }
        if(b=='7'){
          c=a.parents('.rate-artist1, .eventrate-row').next('.modal-rating-radio').find('input[type="text"]').val();
        }
        arr.push({artist_id:a.attr('data-artist'),rating:a.attr('data-rating'),reason:b,reason_details:c});    
      });
      arr=JSON.stringify(arr);
      $.ajax({
        url:'<?=API_URL?>/event/rateMultipleArtist',
        data:query_token+"&artist_id_list="+arr,
        method:'POST',
      }).done(function(data){
        result=$.parseJSON(data);
        if(result.success=='1'){
          $('#modal11').closeModal();
          $('#modal2').openModal();
          window.setTimeout(function(){
          $this.removeClass('ajax-waiting');
        },400);
        }
        else{
          $('#modal11').closeModal();
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
          //console.log(el.attr('data-rating'));
          el.attr('data-rating',val);     
        }
      })
    });

    $('.event-rate').each(function(i,v){
      var el=$(this);
      el.rating({
        disabled:el.attr('data-disabled'),
        rating:el.attr('data-rating'),
        change:function(val){
          //console.log(el.attr('data-rating'));
          el.attr('data-rating',val);      
        }
      })
    });

    $(document).on('click','#event-rate',function(){
      $this=$(this);
      if($this.hasClass('ajax-waiting')){
        return false;
      }
      $this.addClass('ajax-waiting');
      var a=$('.event-rate');
      if(a.attr('data-rating')=='0'){
        alert("Please rate the event between 1 and 5.");
        $this.removeClass('ajax-waiting');
        return false;
      }
      var b=a.parents('.eventrate-row').next('.modal-rating-radio').find('input[type="radio"]:checked').val();
      if(b==undefined || a.attr('data-rating')>3){
        b='0';
      }
      $.ajax({
        url:'<?=API_URL?>/event/<?=$event->id?>/rating',
        data:query_token+"&rating="+a.attr('data-rating')+"&review="+$('#review').val()+"&reason="+b,
        method:'POST',
      }).done(function(data){
        result=$.parseJSON(data);
        if(result.success=='1'){
          $this.removeClass('ajax-waiting');
          $('#modal2').closeModal();
          $('.rate-review5').addClass('fill').text('rated ').append('<i class="fa fa-star" aria-hidden="true"></i>');
          setTimeout(function () {
            alert('Thanks for your feedback.\nThis would help us improve your future experience.');
          },500);
          
        }
        else{
          $('#modal2').closeModal();
          alert(result.message);
        }
      });
    });

    $('.rate-review5').click(function(){
      if (!access_token) {
        $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
        $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
        $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
        $('.jq-login').trigger('click');
        return false;
      }else if($(this).hasClass('disabled')){
        return false;
      }else{
        $('#modal11').openModal();
        <?php if(empty($rateArtistlist)){ ?>
          $('#artist-next').trigger('click');
          <?php } ?>
      }
    });
    $('#ratelist input[type=radio]').on('click',function(){
      if($(this).val()=='7'){
        $('.comment-input').slideDown();
      }else{
        $('.comment-input').slideUp();
      }
    });
    });

    $(".truncate-rules").shorten({
      "showChars" : 180,
      "moreText"  : "More",
      "lessText"  : "Less",
    });
</script>
</body>
</html>