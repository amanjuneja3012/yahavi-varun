<?php 
$section=isset($data['section'])?$data['section']:''; 
$curl=new curl;
@$data=json_decode($curl->get(API_URL.'/account?access_token='.$_COOKIE['access_token']));
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
View::make('/include/v1_header');
?>

  <section id="content">
    <!-- Page Layout here -->
    <div class="aboutbanner-bg">
        <div class="youtube-row">
          <iframe width="1170" height="500" src="https://www.youtube-nocookie.com/embed/Ga7qzV3FzzY?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>

    <section class=" aboutsection whitebg adjustboth marginbottom" id="section-one">
      <div class="headingtag-airro"><h1><span>COMPANY</span></h1></div>
      <p>The journey from talent and creativity to recognition and fame has never been an easy one. The artist within us must navigate a maze of activities: creating content, showcasing artworks, connecting et al until our free spirit feels trapped in systems and business protocols. The internet is our generation’s obvious and omnipresent messiah, but it’s just as easy to be lost as it is to be found or be discovered on the web. This is where we, Yahavi, pop up.</p>

      <p>At Yahavi, we are working to create a one-stop platform, a smooth accession path that will not only help you discover the right opportunities week-in, week-out but also will help you connect directly with the right people, be they promoters, fans or audiences. The idea is to use technology as the enabler and provide you the access to all this on-the-go so that art takes the centre stage but managing it doesn’t.
      </p>

      <p>With a young team that has extensive experience across technology and management and has a strong passion for arts, we have our heart in the right place and the DNA to deliver. What we are working on right now is just the beginning</p>
    </section>

    <section class="aboutsection adjustbg-gray adjustboth" id="section-two">
      <div class="headingtag-airro"><h2><span>CULTURE</span></h2></div>
      <div class="culturerow">
        <img src="/assets/v1/img/culture.png" alt="culture img">
        <span class="culter-text1">Creative</span>
        <span class="culter-text2">Friendly</span>
        <span class="culter-text3">Fun</span>
        <span class="culter-text4">Energetic</span>
        <span class="culter-text5">Informal</span>
        <span class="culter-text6">Youthful</span>
      </div>
    </section>


    <section class="aboutsection aboutteam" id="section-three">
      <div class="headingtag-airro"><h2><span>The team</span></h2></div>
      <div class="team-owlcarouselrow">
        <div class="owlcarousel-team">

        <?php foreach ($team as $key => $value) { ?>

        <div class="item">
            <div class="teamcontent">
              <div class="team-title">
                <span><?=$value[0]->name?></span> <span><?=$value[0]->designation?></span>
              </div>
              <img src="<?=$value[0]->pic?>" style="width:207px; height:207px;" alt="<?=$value->name?>" alt="img">
            </div>
            <?php if(!empty($value[1]->pic)) { ?>
            <div class="teamcontent">
              <div class="team-title">
                <span><?=$value[1]->name?></span> <span><?=$value[1]->designation?></span>
              </div>
              <img src="<?=$value[1]->pic?>" style="width:207px; height:207px;" alt="<?=$value->name?>" alt="img">
            </div>
            <?php  } ?>
            
            <?php if(!empty($value[2]->pic)) { ?>
            <div class="teamcontent">
              <img src="<?=$value[2]->pic?>" style="width:207px; height:207px;" alt="<?=$value->name?>" alt="img">
              <div class="team-title">
                <span><?=$value[2]->name?></span> <span><?=$value[2]->designation?></span>
              </div>
            </div>
            <?php  } ?>

          </div>
         
        <?php  } ?>

 <!--          <div class="item">
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team1.png" alt="img">
            </div>
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team1.png" alt="img">
            </div>
            <div class="teamcontent">
              <img src="/assets/v1/img/about/team1.png" alt="img">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team2.png" alt="img">
            </div>
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team2.png" alt="img">
            </div>
            <div class="teamcontent">
              <img src="/assets/v1/img/about/team2.png" alt="img">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team3.png" alt="img">
            </div>
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team3.png" alt="img">
            </div>
            <div class="teamcontent">
              <img src="/assets/v1/img/about/team3.png" alt="img">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team1.png" alt="img">
            </div>
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team1.png" alt="img">
            </div>
            <div class="teamcontent">
              <img src="/assets/v1/img/about/team1.png" alt="img">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team2.png" alt="img">
            </div>
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team2.png" alt="img">
            </div>
            <div class="teamcontent">
              <img src="/assets/v1/img/about/team2.png" alt="img">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team3.png" alt="img">
            </div>
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team3.png" alt="img">
            </div>
            <div class="teamcontent">
              <img src="/assets/v1/img/about/team3.png" alt="img">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team1.png" alt="img">
            </div>
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team1.png" alt="img">
            </div>
            <div class="teamcontent">
              <img src="/assets/v1/img/about/team1.png" alt="img">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team2.png" alt="img">
            </div>
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team2.png" alt="img">
            </div>
            <div class="teamcontent">
              <img src="/assets/v1/img/about/team2.png" alt="img">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team3.png" alt="img">
            </div>
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team3.png" alt="img">
            </div>
            <div class="teamcontent">
              <img src="/assets/v1/img/about/team3.png" alt="img">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team1.png" alt="img">
            </div>
            <div class="teamcontent">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
              <img src="/assets/v1/img/about/team1.png" alt="img">
            </div>
            <div class="teamcontent">
              <img src="/assets/v1/img/about/team1.png" alt="img">
              <div class="team-title">
                <span>Divyesh Sharma</span> <span>Director</span>
              </div>
            </div>
          </div> -->
          
        </div>
      </div>
    </section>


    <section class="aboutsection whitebg aboutnews" id="section-four">
      <div class="headingtag-airro"><h1><span>NEWS ROOM</span></h1></div>
      
      <div class="about-owlcarouselrow">
        <div class="owlcarousel-about">
          <?php foreach ($yahavi_details->news as $key => $value) {?>


            <div class="item">
              <div class="card crousel-content">
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
  
    </section>


    <section id="section-five" class="aboutsection aboutnews">
      <div class="headingtag-airro adjustbg-gray"><h1><span>TESTIMONIAL</span></h1></div>
      <div class="about-owlcarouselrow">
        <div class="owlcarousel-about">
          <?php foreach ($yahavi_details->testimonials as $key => $value) {?>
            <div class="item">
              <div class="card crousel-content">
                <div class="crousel-testimonial">
                  <blockquote>
                    <?=substr($value->content,0,300)?>
                  </blockquote> 
                  <span><?=substr($value->name,0,40)?></span>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>
    </section>

  </section>
</div>

<?php view::make('/include/v1_footer'); ?>

<script type="text/javascript">
$(document).ready(function(){
  $('.owlcarousel-about').owlCarousel({
      loop:true,
      margin:0,
      pagination:false,
      navigation :true,
      navigationText:["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:5
          }
      }
  });


 // TEAM CROUSEL
  var owl = $(".owlcarousel-team");
    owl.owlCarousel({
      pagination:false,
      navigation :true,
       navigationText:["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
      items : 6, //10 items above 1000px browser width
      itemsDesktop : [1000,5], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
  });

 

});
</script>
</body>
</html>

