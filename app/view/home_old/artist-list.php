<?php 
$uri='/artist/list';
$title='Artist Category';
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
  <h3 style="margin:0;padding:0;font-size:24px;font-weight:600">Browse Artists</h3>
  <br/>
  <ul class="f-list-heading">
    <li>By Location</li>
  </ul>
  <ul class="f-list">

      <li><a href="/artist/musicians-in-delhi-ncr">Musicians in Delhi/NCR  </a></li>
      <li><a href="/artist/singers-in-delhi-ncr">Singers in Delhi/NCR   </a></li>
      <li><a href="/artist/hindi-singer-in-delhi-ncr">Hindi Singer in Delhi/NCR </a></li>
      <li><a href="/artist/punjabi-singer-in-delhi-ncr">Punjabi Singer in Delhi/NCR </a></li>
      <li><a href="/artist/rock-bands-in-delhi-ncr">Rock Bands in Delhi/NCR </a></li>
      <li><a href="/artist/dj-in-delhi-ncr">DJ in Delhi/NCR </a></li>
      <li><a href="/artist/standup-comedian-in-delhi-ncr">Standup Comedian in Delhi/NCR </a></li>
      <li><a href="/artist/magician-in-delhi-ncr">Magician in Delhi/NCR </a></li>
      <li><a href="/artist/anchor-in-delhi-ncr">Anchor in Delhi/NCR </a></li>
  </ul>
  <ul class="f-list">

      <li><a href="/artist/musicians-in-mumbai">Musicians in Mumbai  </a></li>
      <li><a href="/artist/singers-in-mumbai">Singers in Mumbai   </a></li>
      <li><a href="/artist/hindi-singer-in-mumbai">Hindi Singer in Mumbai </a></li>
      <li><a href="/artist/punjabi-singer-in-mumbai">Punjabi Singer in Mumbai </a></li>
      <li><a href="/artist/rock-bands-in-mumbai">Rock Bands in Mumbai </a></li>
      <li><a href="/artist/dj-in-mumbai">DJ in Mumbai </a></li>
      <li><a href="/artist/standup-comedian-in-mumbai">Standup Comedian in Mumbai </a></li>
      <li><a href="/artist/magician-in-mumbai">Magician in Mumbai </a></li>
      <li><a href="/artist/anchor-in-mumbai">Anchor in Mumbai </a></li>
    </ul>
    <ul class="f-list">

      <li><a href="/artist/musicians-in-kolkata">Musicians in Kolkata</a></li>
      <li><a href="/artist/singers-in-kolkata">Singers in Kolkata  </a></li>
      <li><a href="/artist/hindi-singer-in-kolkata">Hindi Singer in Kolkota </a></li>
      <li><a href="/artist/bengali-singer-in-kolkata">Bengali Singer in Kolkota </a></li>
      <li><a href="/artist/rock-bands-in-kolkata">Rock Bands in Kolkata </a></li>
      <li><a href="/artist/dj-in-kolkata">DJ in Kolkata </a></li>
      <li><a href="/artist/standup-comedian-in-kolkata">Standup Comedian in Kolkata </a></li>
      <li><a href="/artist/magician-in-kolkata">Magician in Kolkata </a></li>
      <li><a href="/artist/anchor-in-kolkata">Anchor in Kolkata </a></li>
    </ul>
    <ul class="f-list">

      <li><a href="/artist/musicians-in-chennai">Musicians in Chennai</a></li>
      <li><a href="/artist/singers-in-chennai">Singers in Chennai </a></li>
      <li><a href="/artist/hindi-singer-in-chennai">Hindi Singer in Chennai </a></li>
      <li><a href="/artist/tamil-singer-in-chennai">Tamil Singer in Chennai </a></li>
      <li><a href="/artist/rock-bands-in-chennai">Rock Bands in Chennai </a></li>
      <li><a href="/artist/dj-in-chennai">DJ in Chennai </a></li>
      <li><a href="/artist/standup-comedian-in-chennai">Standup Comedian in Chennai </a></li>
      <li><a href="/artist/magician-in-chennai">Magician in Chennai </a></li>
      <li><a href="/artist/anchor-in-chennai">Anchor in Chennai </a></li>
    </ul>
    <ul class="f-list">

     <li><a href="/artist/musicians-in-bangalore">Musicians in Bangalore</a></li>
      <li><a href="/artist/singers-in-bangalore">Singers in Bangalore  </a></li>
      <li><a href="/artist/hindi-singer-in-bangalore">Hindi Singer in Bangalore </a></li>
      <li><a href="/artist/kannada-singer-in-bangalore">Kannada Singer in Bangalore </a></li>
      <li><a href="/artist/rock-bands-in-bangalore">Rock Bands in Bangalore </a></li>
      <li><a href="/artist/dj-in-bangalore">DJ in Bangalore </a></li>
      <li><a href="/artist/standup-comedian-in-bangalore">Standup Comedian in Bangalore </a></li>
      <li><a href="/artist/magician-in-bangalore">Magician in Bangalore </a></li> 
      <li><a href="/artist/anchor-in-bangalore">Anchor in Bangalore </a></li>

    </ul>
    <ul class="f-list">

     <li><a href="/artist/musicians-in-hyderabad">Musicians in Hyderabad</a></li>
      <li><a href="/artist/singers-in-hyderabad">Singers in Hyderabad </a></li>
      <li><a href="/artist/hindi-singer-in-hyderabad">Hindi Singer in Hyderabad </a></li>
      <li><a href="/artist/telugu-singer-in-hyderabad">Telugu Singer in Hyderabad </a></li>
      <li><a href="/artist/rock-bands-in-hyderabad">Rock Bands in Hyderabad </a></li>
      <li><a href="/artist/dj-in-hyderabad">DJ in Hyderabad </a></li>
      <li><a href="/artist/standup-comedian-in-hyderabad">Standup Comedian in Hyderabad </a></li>
      <li><a href="/artist/magician-in-hyderabad">Magician in Hyderabad </a></li>
      <li><a href="/artist/anchor-in-hyderabad">Anchor in Hyderabad </a></li>

    </ul>

  </div>

  <div class="footer-row">
    <div class="footer-col">
      <div class="footer-row-single">
        <ul class="f-list-heading flist-2">
          <li>By Artist Type</li>
        </ul>

        <ul class="f-list flist2">
          <li><a href="/artist/musicians">Musicians</a></li>
          <li><a href="/artist/singer">Singer</a></li>
          <li><a href="/artist/guitarist">Guitarist </a></li>
          <li><a href="/artist/dj">DJ</a></li>
        </ul>
        <ul class="f-list flist2">
          <li><a href="/artist/comedian">Comedian </a></li>
          <li><a href="/artist/standup-comedians">Standup Comedians </a></li>
          <li><a href="/artist/anchors">Anchors </a></li>
          <li><a href="/artist/magicians">Magicians </a></li>
        </ul>
      </div>
    </div>
    <div class="footer-col" style="margin-left:25px">
      <ul class="f-list-heading flist-2">
        <li>By Genre</li>
      </ul>
      <div class="footer-row-single">
        <ul class="f-list flist2">

          <li><a href="/artist/rock-bands">Rock Band </a></li>
          <li><a href="/artist/metal-band">Metal Band </a></li>
          <li><a href="/artist/jazz-bands">Jazz Band </a></li>
          <li><a href="/artist/blues-band">Blues Band </a></li>
        </ul>
        <ul class="f-list flist2">
          <li><a href="/artist/bollywood-dj">Bollywood DJ </a></li>
          <li><a href="/artist/bollywood-singer">Bollywood Singer </a></li>
          <li><a href="/artist/sufi-singer">Sufi Singer </a></li>
          <li><a href="/artist/edm-dj">EDM DJ </a></li>
        </ul>
      </div>
    </div>
    <div class="footer-col" style="float: right; margin-right: 20px;">
      <ul class="f-list-heading flist-2">
        <li>By Language</li>
      </ul>
      <div class="footer-row-single">
       <ul class="f-list flist2">

        <li><a href="/artist/hindi-band">Hindi Band </a></li>
        <li><a href="/artist/hindi-singer">Hindi Singer </a></li>
        <li><a href="/artist/english-band">English Band </a></li>
        <li><a href="/artist/english-singer">English Singer </a></li>
        <li><a href="/artist/bhojpuri-singer">Bhojpuri Singer </a></li>
       </ul>
      <ul class="f-list flist2">

        <li><a href="/artist/punjabi-singer">Punjabi Singer </a></li>
        <li><a href="/artist/punjabi-dj">Punjabi DJ </a></li>
        <li><a href="/artist/bengali-band">Bengali Band </a></li>
         <li><a href="/artist/telugu-singer">Telugu Singer </a></li>
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