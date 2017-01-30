<?php 
$uri='/event/list';
$title='Event Category';
$desc=htmlspecialchars('Find all artists listed by category');
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
View::make('include/v1_header',array('title'=>$title,'headerKey'=>'artist','head'=>$head));
?>
<style type="text/css">
*{margin:0; padding: 0; outline: 0;}
ul, ol{
  list-style: none;
}
a{text-decoration: none;}
.footer-row{
  width: 1220px;
  margin: 0 auto;
  clear: both;
   }
.footer-row-single{
   width: 1200px;
   margin: 0 auto;

  }
.footer-row-single .f-list { 
  float: left;
  height: 240px;
}
.footer-col .footer-row-single{
  float: left;
}
.footer-col .footer-row-single .f-list {  
  float: left;
  height: 200px;
  line-height: 200%;

}
.footer-row .footer-col {
  margin-left: 10px;
  float: left;
   
}

.f-list{
  background-color: #fff;
  margin-bottom: 10px;
  font-size: 13px;
  height: 200px;
  width:200px;
  line-height: 200%;
}
.f-list-heading li
{
  padding: 10px;
  background-color: #fff;
  font-size: 16px;
  font-weight: bold;
  color: #6e6e6e;
  border-bottom: 1px solid #eee; 
    
}
.f-list li a{
  color: #666666;
  padding-left: 10px;
   
}
.footer-col .f-list-heading li{
  padding: 10px;
  background-color: #fff;
  font-size: 16px;
   
  color: #6e6e6e; 
  border-bottom: 1px solid #eee; 
}
#content{
  height:700px;
}
.footer-row{
  overflow: hidden;
}
.flist-2{
  width:390px;
}
.flist2{
  width:195px !important;
}
.footer-col{
  width:380px;
}
</style>
<section id="content">
<div class="footer-row-single">
  <br/>
  <h3 style="margin:0;padding:0;font-size:24px;font-weight:600">Browse Events</h3>
  <br/>
  <ul class="f-list-heading">
    <li>By Location</li>
  </ul>
  <ul class="f-list">

      <li><a href="/event/events-in-delhi-ncr">Events in Delhi</a></li>
      <li><a href="/event/dj-night-in-delhi-ncr">DJ night in Delhi/NCR</a></li>
      <li><a href="/event/bollywood-night-in-delhi-ncr">Bollywood Night in Delhi/NCR</a></li>
      <li><a href="/event/standup-comedy-in-delhi-ncr">Standup Comedy in Delhi/NCR</a></li>
    
  </ul>
  <ul class="f-list">

      <li><a href="/event/events-in-bangalore">Events in Bangalore</a></li>
      <li><a href="/event/dj-night-in-bangalore">DJ night in Bangalore</a></li>
      <li><a href="/event/bollywood-night-in-bangalore">Bollywood Night in Bangalore</a></li>
      <li><a href="/event/standup-comedy-in-bangalore">Standup Comedy in Bangalore</a></li>
    </ul>
    <ul class="f-list">
       
      <li><a href="/event/events-in-kolkata">Events in Kolkata </a></li>
      <li><a href="/event/dj-night-in-kolkata">DJ night in Kolkata </a></li>
      <li><a href="/event/bollywood-night-in-kolkata">Bollywood Night in Kolkata </a></li>
      <li><a href="/event/standup-comedy-in-kolkata">Standup Comedy in Kolkata </a></li>
    </ul>
    <ul class="f-list">

      <li><a href="/event/events-in-mumbai">Events in Mumbai </a></li>
      <li><a href="/event/dj-night-in-mumbai">DJ night in Mumbai </a></li>
      <li><a href="/event/bollywood-night-in-mumbai">Bollywood Night in Mumbai </a></li>
      <li><a href="/event/standup-comedy-in-mumbai">Standup Comedy in Mumbai </a></li>
    </ul>
    <ul class="f-list">

      <li><a href="/event/events-in-chennai">Events in Chennai </a></li>
      <li><a href="/event/dj-night-in-chennai">DJ night in Chennai </a></li>
      <li><a href="/event/bollywood-night-in-chennai">Bollywood Night in Chennai </a></li>
      <li><a href="/event/standup-comedy-in-chennai">Standup Comedy in Chennai </a></li>
    </ul>
    <ul class="f-list">

      <li><a href="/event/events-in-hyderabad">Events in Hyderabad </a></li>
      <li><a href="/event/dj-night-in-hyderabad">DJ night in Hyderabad </a></li>
      <li><a href="/event/bollywood-night-in-hyderabad">Bollywood Night in Hyderabad </a></li>
      <li><a href="/event/standup-comedy-in-hyderabad">Standup Comedy in Hyderabad </a></li>

    </ul>

  </div>

  <div class="footer-row">
    <div class="footer-col">
      <div class="footer-row-single">
        <ul class="f-list-heading flist-2">
          <li>By Artist Type</li>
        </ul>

        <ul class="f-list flist2">

          <li><a href="/event/live-sufi-night">Live Sufi Night</a></li>
          <li><a href="/event/bollywood-night">Bollywood Night</a></li>
          <li><a href="/event/commercial-night">Commercial night</a></li>

        </ul>
        <ul class="f-list flist2">

         <li><a href="/event/open-mic-comedy">Open Mic Comedy</a></li>
        <li><a href="/event/comedy-events-in-delhi">Standup Comedy night</a></li>
        </ul>
      </div>
    </div>

  </div>
  </section>
  </div>
<?php
View::make('/include/v1_footer');
?>
</body>
</html>