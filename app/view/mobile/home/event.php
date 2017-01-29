<?php
$curl=new curl;
@$json=json_decode($curl->get(API_URL.'/account?'.Helper::queryToken()));
$user=$json->data;
$headerKey = isset($data['headerKey'])?$data['headerKey']:'';


// Helper::pre($data);die; 
$event=$data['event'];
$curl=new curl;
$json=$curl->get(API_URL.'/venue/zomato/'.$event->zomato_url.'?'.Helper::queryToken());
$zomato=json_decode($json);

$json=$curl->get(API_URL.'/event/rateArtistlist/'.$event->id.'?'.Helper::queryToken());
$rateArtistlist=json_decode($json)->data;

$json=$curl->get(API_URL.'/event/rateEventlist/'.$event->id.'?'.Helper::queryToken());
$rateEventlist=json_decode($json)->data[0];


$ev_name=$event->name;
if ($event->artist_id>0) {
    $ev_name.=' with '.$event->artist_name;
}
$ev_desc=$event->venue_name.', '.$event->city.', '.$event->locality;

$artist_name='';
if (sizeof($event->artists)) {
  foreach ($event->artists as $key => $value) {
    $artist_name.='<a style="color:#2f4b93" href="/artist/'.$value->id.'">'.$value->name.'</a>,';
  }
  
}

if (strlen($event->other_artists)>1) {
  $artist_name.=$event->other_artists;
}else{
  $artist_name=rtrim($artist_name,',');
}
View::make('/mobile/include/v1_header');
$genre='';
foreach ($event->genres as $key => $value) {
  $genre.=$value->name.', ';
}
$genre=rtrim($genre,', ');
$url='https://www.yahavi.com/event/'.Helper::encodeSlug($event->name,$event->id);
?>
  <style type="text/css">
    .modal .conformation-footer .btn{
      float: none;
    }
    .banner-rate-row1{
      position: absolute;
      z-index: 5;
      width: 100%;
      bottom: 10px;
      left: 0;
      text-align: right;
      padding:0 12px;
    }
    .banner-rate-row1 .view-rating,
    .banner-rate-row1 .goingcount{
      position: static;
    }
    .banner-rate-row1 .eventbanner-btn-row,
    .banner-rate-row1 .goingcount{
      display: inline-block;
      position: static;
    }
    .eventrate-modal .rate-artist1{
      border: none;
    }
    .ratecontent-sec h4{
      border-bottom: 1px solid #d8d8d8;
      padding-bottom:10px;
    }
    .ratecontent-sec .rate-artist1-img{
      margin: 0 auto 5px;
    }
    .ratecontent-sec .rate-artist1-name{
      text-align: center;
      margin-left: 0;
    }
    .modal-rating-radio span{
      font-weight: 600;
    }
    .eventrate-modal .ratecontent-sec{
      padding-bottom: 0;
    }
    .ratecontent-sec .eventrate-row{
      margin-bottom: 0;
    }
    .share_count{
      position: absolute;
      height: 15px;
      width: 97%;
      right: 3px;
      top: -14px;
      color: #fff;
      text-align: right;
      font-size: 10px;
      background: rgba(0,0,0,0.54);
    }
  </style>
    <section id="content">
    <div class="card marginbottom0">
        <div class="row performance-h" style="background:#00a3a7">
            <div class="col s12" style="color:white">
                <h3><?=$event->name?></h3>
                <small class="small-live" style="color:rgba(0,0,0,0.47)"><?=$artist_name?> | <?=$event->artist_category?></small>
            </div>
        </div>

      <div class="eventbanner">
        <img src="<?=$event->event_image?>?d=640x360" alt="banner">
        <div class="banner-rate-row1">
          <div class="eventbanner-btn-row">
            <?php
            if(strtotime($event->t_from)<time() and strtotime('+168 hours',strtotime($event->t_from))>time()){
             if(empty($rateEventlist->id)){ ?>
             <a href="javascript:void(0)" class=" view-rating rate">rate &amp; review</a>
             <?php } else{ ?>
             <a href="javascript:void(0)" class=" view-rating rate fill ">rated <i class="fa fa-star" aria-hidden="true"></i> </a>
             <?php } 
           }
           ?>
          </div>
          <?php if (strtotime($event->t_to)<=time()) {?>
          <?php }else{?>
          <div class="goingcount <?=$event->is_going?'active':''?> " data-id=<?=$event->id?>>
            <span class="btn-going"><?=$event->is_going?'Going&nbsp;&nbsp;<i class="fa fa-check">':'Going?'?></i></span>
            <small style="font-size:10px;margin-left:2px"><?=$event->event_going_count?></small>
          </div>
          <?php } ?>
        </div>
      </div>
      <div class="row liveevent">
        <div class="col s6 eventcol-date">
          
          <div class="eventcol-text"><span><?=date('d M y',strtotime($event->t_from))?></span><small>(<?=date('h:i A',strtotime($event->t_from))?> to<?=date('h:i A',strtotime($event->t_to))?>)</small></div>
        </div>
        <div class="col s6 eventcol-social right-align">
          <ul class="eventsocial-inner">
            <li><a href="javascript:void(0)" data-url="<?=$url?>" class="circol btnshare"><i class="fa fa-share-alt" aria-hidden="true"></i></a> 
              <?php $share=json_encode(['id'=>$event->id,'type'=>'admin_events','url'=>'https://yahavi.com/event/'.$event->slug]);?>
              <small data-share='<?=$share?>'><?=($event->fb_count+$event->tw_count+$event->gp_count)?></small>
             <div class="social-col">
              <div class="share_count"></div>
              <a class="twiter fb-share" href="https://twitter.com/share?url=<?=WEB_URL?>/event/<?=$event->slug?>"><i aria-hidden="true" class="fa fa-twitter"></i></a>
              <a class="fb fb-share" href="https://www.facebook.com/sharer/sharer.php?u=<?=WEB_URL?>/event/<?=$event->slug?>"><i aria-hidden="true" class="fa fa-facebook"></i></a>
              <a class="gp fb-share" href="https://plus.google.com/share?url=<?=WEB_URL?>/event/<?=$event->slug?>"><i aria-hidden="true" class="fa fa-google-plus"></i></a>
            </div>
            </li>
            <li><a href="javascript:void(0)" class="circol event-following1 <?=!empty($event->is_follow)?'active':''?>" data-id="<?=$event->id?>"><i class="fa fa-heart" aria-hidden="true"></i></a>
              <small id="follow_count"><?=$event->event_follow_count?></small>
            </li>
            <li><a href="javascript:void(0)" class="circol"><i class="fa fa-eye" aria-hidden="true"></i></a>
              <small><?=$event->view_count?></small>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row eventcard">
      <div class="col s12">
        <div class="card">
          <div class="venue-detail">
            <p class="color-red"><?=$event->venue_name?></p>
            <p><?=$event->address?$event->address:$zomato->location->address?></p>
          </div>
          <?php 
          if ($zomato->cuisines) {?>
          <div class="venue-detail">
            <span>Cuisines</span>
            <p><?=$zomato->cuisines?></p>
          </div>
          <?php }?>

          <?php 
          if ($zomato->average_cost_for_two) {?>
          <div class="venue-detail">
            <span>Cost for two</span>
            <p><i class="fa fa-inr" aria-hidden="true"></i> <?=$zomato->currency.' '.$zomato->average_cost_for_two.' apprx.'?></p>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <?php 
    if(!empty($event->brief_desc)){ ?>
      <div class="row eventcard">
        <div class="col s12">
          <div class="card">
            <div class="venue-detail">
              <p>
                <?php
                if(strlen($event->brief_desc)<150){
                  echo $event->brief_desc;
                }else{
                  echo substr($event->brief_desc, 0,150);?>
                  <small class="btn-read">More</small>
                  <span class="readtext"><?=substr($event->brief_desc,150)?>
                    <small class="btn-less">Less</small>
                  </span>
                  <?php } ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    

    <div class="row eventcard" style="display:<?=strlen(trim($event->rules))?'':'none'?>">
      <div class="col s12">
        <div class="card">
          <div class="venue-detail">
            <p>Rule &amp; regulation</p>
          </div>
          <div class="venue-detail">
            <ol>
            <?=$event->rules?>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col s12">
        <a style="margin-bottom:38px" class="waves-effect waves-light btn mapbtn" target="blank" href="https://www.google.com/maps/place/<?=$event->address?$event->address:$event->venue_name.'/@'.$zomato->location->latitude.','.$zomato->location->longitude?>">
          <i class="fa fa-map-marker" aria-hidden="true"></i> map</a>
      </div>
    </div>


    <?php 
    if ($event->target_url!='' and strtotime($event->t_from)>time()) {?>
      <style>
        .card .booking-details-info{
          height: 125px !important;
        }
      </style>
      <div class="row card eventbtn-fixed">
      <div class="col s12">
        <a href="<?=$event->target_url?>" target="blank"><button style="background:#ff3029;font-size:14px;font-weight:600" class="waves-effect waves-light btn">Book</button></a>
        </div>
      </div>                                                
      <?php } ?>
    </section>
</div>
<div id="modal11" class="modal  modalheight450 eventrate-modal">
  <form action="#" method="post">
      <div class="modal-content ratecontent-sec">
        <h4>Rate Artist</h4>
        <?php foreach ($rateArtistlist as $key => $value) { ?>

        <div class="rate-artist1 clearfix">
          <div class="rate-artist1-img">
            <img src="<?=$value->profile_pic?>?d=50x50" alt="img">
          </div>
          <div class="rate-artist1-name">
            <a href="/artist/<?=$value->artist_id?>"><h6 style="color:#425093;"><?=$value->name?></h6></a>
            <div class="artist1-star-row artist-rate" data-artist="<?=$value->artist_id?>" data-rating="<?=$value->rating?$value->rating:'0'?>">

            </div>
            <?php if($value->self_rated==1){ ?>
            <div class="rated1 ">Your Last rating</div>

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
          <div class="comment-input <?=$value->reason==7?'comment-input-show':'comment-input-hide'?>">
            <input maxlength="600" type="text" name="reason_details" value="<?=$value->reason_details?>" placeholder="  Only alphabets(600 characters).">
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

<div id="modal2" class="modal  modalheight450 eventrate-modal">
  <form action="#" method="post">
                      <div class="modal-content ratecontent-sec">
                        <div class="eventrate-row">
                          <h4>Rate Event</h4>
                          <div class="rate-artist1 clearfix">
                            <div class="rate-artist1-img">
                            <img src="<?=$event->event_image?>?d=50x50" alt="img">
                            </div>
                            <div class="rate-artist1-name">
                              <h6><?=$event->name?></h6>
                              <div class="artist1-star-row event-rate"  data-rating="<?=$rateEventlist->rating?>">
                              </div>
                              <?php if(!empty($rateEventlist)){ ?>
                                <div class="rated1 ">Your Last rating</div>
                              <?php } ?> 
                            </div>
                          </div>
                          <div class="eventrate-col2 right-align hide">
                            <div class="eventrate-vote">
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <span>4/<sub>5</sub><span><br/>
                                <small>200 Votes</small>
                              </div>
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

<?php 
    View::make('mobile/include/v1_footer');
?> 
<script type="text/javascript">
var query_token='<?=Helper::queryToken()?>';
$(document).ready(function(){

// Banner for share  
    $('.btnshare').on('click', function(){
        $(this).find('i').toggleClass('active');
        $('.social-col').fadeToggle();
        var url=$(this).attr('data-url');
        if($('.social-col').is(':visible')){
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
        }
    });
    $(document).on('click', function(event){
        if(!$(event.target).closest('.btnshare, .social-col').length){
            $('.social-col').fadeOut();
            $('.btnshare').find('i').removeClass('active');
        }
    });

// Banner for heart
  /*  $('.event-following <?=!empty($event->is_follow)?'active':''?>').on('click', function(){
        $(this).toggleClass('active');
    });*/

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





     
});
$('.fb-share').click(function(e) {
        e.preventDefault();
        window.open(this.href, 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=1');
        return false;
  });
</script>

<script type="text/javascript">
$('.goingcount').click(function(){
  if (!access_token) {
    $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    $('.header-signup').trigger('click');
    $('.jqblogin-btn').trigger('click');
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
        $this.find('span').text('Going?').find('i').hide();
        $this.removeClass('active');
        $this.removeClass('active').prop('disabled',false);
        var going=$this.find('small');
        going.text(going.text()-1);
        return false;
      }
      else{
        message('error');
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
        $this.find('span').text('Going').append('<i class="fa fa-check"></i>');
        $this.find('btn-going i').show();
        $this.addClass('active');
        $this.addClass('active').prop('disabled',false);
        var going=$this.find('small');
        going.text(parseInt(going.text())+1);
        return false;
      }
      else{
        message('error');
      }
      return false;
    });
  }
});




 $('.event-following1').click(function(){
    $this=$(this);
    var event_id=$(this).attr('data-id');
    if (!access_token) {
      $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $('.header-signup').trigger('click');
      $('.jqblogin-btn').trigger('click');
      return false;
    };
    var follow_count=$('#follow_count').text();
    if (($this).hasClass('ajax-waiting')) {
      return false;
    };
    $this.addClass('ajax-waiting');
    if($(this).hasClass('active')){
      $.ajax({
            url:'<?=API_URL?>/eventfollow/'+event_id+'/remove',
            data:query_token,
            method:'POST',
             }).done(function(data){
            result=$.parseJSON(data);
            if(result.success=='1'){
                $this.removeClass('ajax-waiting').removeClass('active');
                $('#follow_count').text(parseInt(follow_count)-1);
                
               return false;
            }
            else{
                message("Oops! Some problem occurred.");
            }
            return false;
        });
    }else{
       $.ajax({
                url:'<?=API_URL?>/eventfollow/'+event_id,
                data:query_token,
                method:'POST',
                 }).done(function(data){
                result=$.parseJSON(data);
                if(result.success=='1'){
                    $this.removeClass('ajax-waiting').addClass('active');
                    $('#follow_count').text(parseInt(follow_count)+1);;
                    
                   return false;
                }
                else{
                    message("Oops! Some problem occurred.");
                }
                return false;
            });
    }
  });

  $(document).on('click','.srtist-following',function(){
      $this=$(this);
    
    var artist_id=$(this).attr('data-id');
    if (!access_token) {
      $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $('.header-signup').trigger('click');
      $('.jqblogin-btn').trigger('click');
      return false;
    };
    var follow_count=$(this).attr('data-fan');
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
            result=$.parseJSON(data);
            if(result.success=='1'){
                $this.removeClass('ajax-waiting');
                $this.removeClass('active').find('small').text(parseInt(follow_count)-1);
                $this.attr('data-fan',parseInt(follow_count)-1)
               return false;
            }
            else{
                message("Oops! Some problem occurred.");
            }
            return false;
        });
    }else{
       $.ajax({
                url:'<?=API_URL?>/artist/'+artist_id+'/fan',
                data:query_token,
                method:'POST',
                 }).done(function(data){
                result=$.parseJSON(data);
                if(result.success=='1'){
                    $this.removeClass('ajax-waiting');
                    $this.addClass('active').find('small').text(parseInt(follow_count)+1);;
                    $this.attr('data-fan',parseInt(follow_count)+1)
                   return false;
                }
                else{
                    message("Oops! Some problem occurred.");
                }
                return false;
            });
    }
    });
</script>

<script type="text/javascript">

$(document).ready(function(){
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
    $('#modal2').openModal();
    $('#modal11').closeModal();

  });

  $('#event-prev').click(function(){
    $('#modal11').openModal();
    $('#modal12').closeModal();
    
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
    console.log(arr);
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
      message("Please rate the event between 1 and 5.");
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
        message('Thanks for your feedback.\nThis would help us improve your future experience.');
        $('#modal2').closeModal();
        $('.view-rating').addClass('fill').text('rated ').append('<i class="fa fa-star" aria-hidden="true"></i>');
        return false;
        
      }
      else{
        message(result.message);
        $('#modal2').closeModal();
      }
    });
  }); 

  $('.view-rating').click(function(){
   if (!access_token) {
    $.cookie('business_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    $.cookie('artist_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
    $.cookie('fan_next',window.location.pathname,{ domain: '.<?=DOMAIN_NAME?>' ,path:'/'});
      $('.header-signup').trigger('click');
      $('.jqblogin-btn').trigger('click');
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


</script>
</body>
</html>