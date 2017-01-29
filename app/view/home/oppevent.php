<?php
$event=$data['event'];


foreach ($event->genres as $key => $value) {
  $genre.=$value->name.', ';
}
$genre=rtrim($genre,', ');

foreach ($event->specializations as $key => $value) {
  $specialization.=$value->name.', ';
}
$specialization=rtrim($specialization,', ');

foreach ($event->event_type as $key => $value) {
  $event_type.=$value->event.', ';
}
$event_type=rtrim($event_type,', ');

if($event->event_pic) {
  $pic=$event->event_pic;
}elseif ($event->venue[0]->image) {
  $pic=$event->venue[0]->image;
}else{
  $pic=$event->business->profile_pic;
}
$url=WEB_URL.'/oppevent/'.$event->id;
$title=$event->name;
$desc=$event->artist_category[0]->name.', '.$genre.', '.$specialization.', '.$event_type;
$head=[
  '<meta name="Content-Type" content="text/html; charset=utf-8">',
  '<meta name="description" content="'.$desc.'">',
  '<meta name="keywords" content="yahavi,blog">',
  '<meta property="og:title" content="'.$title.' - Yahavi">',
  '<meta property="og:url" content="'.$url.'">',
  '<meta property="og:image" content="'.$pic.'">',
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
  '<meta name="twitter:title" content="'.$title.' - Yahavi">',
  '<meta name="twitter:description" content="'.$desc.'">',
  '<meta name="twitter:image" content="'.$pic.'">',
  '<meta name="viewport" content="width=device-width, initial-scale=1.0">',
];
View::make('include/v1_header',['title'=>$title,'head'=>$head]);
?>
<style type="text/css">
  .stage_0{
    display: none;
  }
  .stage_<?=$stage?>{
    display: block !important;
  }
  .select2-container--default{
    z-index: 9999;
  }
  .layout-sticky-adjust #content {
    padding-top: 0px;
  }
  #event-banner h2{
    color: rgb(49, 94, 169);

  }
  .artists-edit .row, .artists-edit-one .row {
    margin-bottom: 14px;
  }
  #event-banner .card-title {
    font-size: 20px;
    font-weight: 400;
    margin: 0;
    padding: 10px 20px;
    text-transform: capitalize;
  }
  .card .card-image {
    position: relative;
  }

  .card .card-image img {
    border-radius: 2px 2px 0 0;
    bottom: 0;
    display: block;
    left: 0;
    position: relative;
    right: 0;
    top: 0;
    width: 100%;
  }
  .font-adjust#event-edit .cards-box{
    font-size: 16px;
    font-weight: 500;
  }
  .font-adjust#event-edit .text1{
    font-size:14px;
    font-weight: 400;
  }

  .font-adjust.artists-edit .col span1,
  .font-adjust.artists-edit-one .col span1,
  .font-adjust.artists-edit .col span,
  .font-adjust.artists-edit-one .col span{
    font-size: 14px;
    font-weight: 500;
  }
  .font-adjust#artists-edit .col span1{
    font-weight:500; 
  }

  .card .card-content .event-cta > a.review-write3{
    width: 105px;
    height: 28px;
    line-height: 24px;
    border-width: 2px;
    border-radius: 15px;
    margin-right: 0;
  }
  .card .card-content .event-cta > a{
    vertical-align: middle;
  }
  .card .card-content .event-cta small{margin-right: 15px;}

  .card .card-content .event-cta{
    margin-top: 0;
  } 

  .left-align {
    text-align: left;
  }
  .artists-edit .col span1, .artists-edit-one .col span1 {
    color: #ff5b56;
    font-size: 14px;
    font-weight: 600;
  }
  .artists-edit .card-content, .artists-edit-one .card-content {
    padding: 14px 20px 4px;
  }
  .right-align {
    text-align: right;
  }

  .ongoing-btnfull-width .btn {
    display: block;
  }

  .artists-edit .col, .artists-edit-one .col {
    margin-top: 0;
    padding: 0;
  }
  .other-artistquote h6 {
    color: #6e6e6e;
    font-size: 14px;
    margin: 0 0 10px;
  }
  .other-artistquote span {
    color: #ff5b56;
    display: block;
    font-size: 14px;
    padding-bottom: 10px;
  }

  .margintop0 {
    margin-top: 0 !important;
  }

  .prebox .card{
    padding:10px 15px;
    font-size: 14px;
    font-weight: 500;
  }
  .prebox .pre-article p{
    font-size: 14px;
    color:#121212;
    font-weight: 400;
    line-height: 24px;
  }

  .pre-col1{
    width: 120px;
  }
  .pre-col2{
    margin-left: 130px;
  }


  .prebox .col{
    margin-top: 0;
  }
  .prebox .subtitle{
    display: block;
    color:#26a69a;
    text-transform: capitalize;
    line-height: 24px;
  }
  .prebox .pre-col2 p{
    margin: 0;
    color:#121212;
    font-weight: 500;
    font-size: 14px;
    line-height: 24px;
  }
  .prebox .pre-col2 p span{
    display: block;
  }
  .prebox .paddingcol{
    margin-bottom: 0;
  }
  .prebox .paddingcol .col{
    padding: 0;
  }
  .prebox .paddingcol .subarticle{
    padding-left: 8px;
  }
  .prebox .taging span{
    display: inline-block;
    background: #dcdcdc;
    font-size: 14px;
    color:#121212;
    padding:2px 8px;
    border-radius:10px;
    font-weight: 400;
    margin: 0 3px 5px 0;
  }
  .social-popup a i{
    line-height: 35px !important;
  }
  .cta-col{
    position: static;
    display: inline-block;
    position: relative;
    min-width: auto;
    text-align: center;
  }
  .social-popup1{
    display: inline-block;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    border: 2px solid #fe5b56;
    text-align: center;
    line-height: 28px;
    color: #fe5b56;
    background: #fff;
    position: static;
    right: 16px;
    top: -35px;
    margin-right: 5px;
  }
  .social-popup{
    right: 0;
    left: auto;
    margin: 0;
  }
</style> 
<section id="content">
   <div class="row zero-bottom-margin">
      <div class="col s9" id="event-left">
         <div class="card image-card" id="event-banner">
          <h2 class="card-title card-titles"><?=$event->name?></h2>
          <div class="card-image">
            <img class="activator" src="<?=$pic?>?d=937x391">
            <div class="cta-col follow-view right" style="margin-top: -40px;">
              <a href="javascript:void(0)" data-postid="<?=$blog->post_id?>" class="social-popup1 left"><i class="fa fa-share-alt"></i></a>
              <div class="cta">
                <div class="social-popup">
                 <?php
                 $shareUrl=WEB_URL.'/oppevent/'.$event->id;
                 ?>

                 <div class="socialinner">
                  <a class="facebook-bg" href="https://www.facebook.com/sharer/sharer.php?u=<?=$shareUrl?>"><i class="fa fa-facebook"></i></a>
                  <a class="google-bg" href="https://plus.google.com/share?url=<?=$shareUrl?>"><i class="fa fa-google-plus"></i></a>
                  <a class="twitter-bg" href="https://twitter.com/share?url=<?=$shareUrl?>"><i class="fa fa-twitter"></i></a>
                </div>
              </div>
            </div>
          </div> 
          </div>
        </div>
      </div>
      <div class="col s3 event-content" id="">
        <div class="card font-adjust artists-edit" id="">
          <div class="card-content">
            <div class="row">     
              <div class="col left s6">
                <span class="left-align">Business</span>
              </div>
              <div class="col left s6">
                <a href="/opportunities/venue/<?=$event->venue[0]->id?>"><span1 class="right-align" style="color: rgb(49, 94, 168);font-weight: 600;"><?=$event->venue[0]->name?></span1></a>
              </div>      
            </div>
            <div class="row">     
              <div class="col left s6">
                <span class="left-align">Date</span>
              </div>
              <div class="col left s6">
                <span1 class="right-align"><?=date('d M y',strtotime($event->event_date))?></span1>
              </div>      
            </div>

            <div class="row">     
              <div class="col left s6">
                <span class="left-align">Time</span>
              </div>
              <div class="col left s6">
                <span1 class="right-align"><?=date('h:i A',strtotime($event->start_time)).' - '.date('h:i A',strtotime($event->start_time)+$event->duration*60)?></span1>
              </div>      
            </div>

            <div class="row">
              <div class="col s12 ongoing-btnfull-width">
                <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Apply</a>
              </div>
            </div>
          </div>

        </div>
      </div>
  </div>
   <div class="clearfix"></div>
    <div class="row">
        <div class="col s12 margintop0 prebox">
          <div class="card">
          <div class="row">
            <div class="col s12 pre-article">
              <p>
              <?=$event->brief_desc?>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="pre-col1 left">
                <span class="subtitle">Venue :</span>
              </div>
              <div class="pre-col2">
                  <p><?=$event->venue[0]->name.', '.$event->venue[0]->address?><?=$event->venue[0]->localiy.', '.$event->venue[0]->city?></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s4">
              <div class="pre-col1 left">
                <span class="subtitle">Art Category :</span>
              </div>
              <div class="pre-col2">
                  <p>
                      <?=$event->art_category[0]->name?>
                  </p>
              </div>
            </div>

            <div class="col s4">
              <div class="pre-col1 left">
                <span class="subtitle">Artist Category :</span>
              </div>
              <div class="pre-col2">
                  <p><?=$event->artist_category[0]->name?></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="pre-col1 left">
                <span class="subtitle">Genre :</span>
              </div>
              <div class="pre-col2">
                  <p>
                      <?php 
                      foreach ($event->genres as $key => $value) {
                        $genre.=$value->name.', ';
                      }
                      $genre=rtrim($genre,', ');
                      echo $genre;
                      ?>

                  </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="pre-col1 left">
                <span class="subtitle">Specialisation :</span>
              </div>
              <div class="pre-col2">
                 <p>
                     <?php 
                      foreach ($event->specializations as $key => $value) {
                        $specialization.=$value->name.', ';
                      }
                      $specialization=rtrim($specialization,', ');
                      echo $specialization;
                      ?>
                 </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="pre-col1 left">
                <span class="subtitle">Budget :</span>
              </div>
              <div class="pre-col2">
                  <p><i aria-hidden="true" class="fa fa-inr"></i> <?=$event->budget?$event->budget:'Not Available'?></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="pre-col1 left">
                <span class="subtitle">Time :</span>
              </div>
              <div class="pre-col2">
                  <p><?=date('h:i A',strtotime($event->start_time))?> to <?=date('h:i A',(strtotime($event->start_time)+($event->duration*60)))?></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="pre-col1 left">
                <span class="subtitle">Event Type :</span>
              </div>
              <div class="pre-col2">
                 <p>
                     <?php 
                      foreach ($event->event_type as $key => $value) {
                        $event_type.=$value->event.', ';
                      }
                      $event_type=rtrim($event_type,', ');
                      echo $event_type;
                      ?>
                 </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="pre-col1 left">
                <span class="subtitle">Venue to Provide :</span>
              </div>
              <div class="pre-col2">
                 <div class="subarticle taging">
                    <?php 
                    foreach ($event->inclusion as $key => $value) {?>
                      <span><?=$event->is_booked? $value:$value->inclusion?></span>
                    <?php }
                    ?>
                  </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="pre-col1 left">
                <span class="subtitle">Artist to Arrange :</span>
              </div>
              <div class="pre-col2">
                 <div class="subarticle taging">
                    <?php 
                    foreach ($event->exclusion as $key => $value) {?>
                      <span><?=$event->is_booked? $value:$value->inclusion?></span>
                    <?php }
                    ?>
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
View::make('include/v1_footer');
?>  
<script type="text/javascript">
  $(document).ready(function(){
    message('Please login or sign up as an artist');

  });
  $('.social-popup1').click(function(){
    $('.social-popup').toggle();
  });
  
</script>
<script>
  $('.socialinner a').click(function(e) {
    e.preventDefault();
    window.open(this.href, 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=1');
    return false;
  });
</script>
</body>
</html>

