<?php
View::make('/mobile/include/v1_header');
?>
  <section id="content">    
  <div class="banner-bookartist" style="min-height: 130px">
    </div>
    <div class="container bookartist-main">
      <div class="row">
        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfjzOgVQHMpHJEyk85TV_ExmKjoRtVodsqA3JAcjylX58K27w/viewform?embedded=true" width="100%" height="1420" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
      </div>
    </div>
  </section>
</div>
<footer>
  <div class="container-fluid footer-content">
    <div class="row">
      <div class="col s12 subscribe">
        <h2>Stay Upto Date</h2> 
        <form class="form-inline ">
          <div>
            <input value="" id="first_name2" type="text" placeholder="Enter your email id">
            <button type="submit" class="btn subscribe_btn">Subscribe</button>
          </div> 
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col s12 social-links">
        <h2>Stay Connected</h2>
        <a href="http://www.facebook.com/yahavidotcom" target="_blank" class=""> <i class="fa fa-facebook"></i></a>
          <a href="http://www.twitter.com/yahavidotcom" target="_blank" class=""> <i class="fa fa-twitter"></i></a>
          <a href="https://www.linkedin.com/company/yahavi" target="_blank" > <i class="fa fa-linkedin"></i></a>
          <a href="http://instagram.com/yahavidotcom" target="_blank" class=""> <i class="fa fa-instagram"></i></a>
          <a href="http://www.pinterest.com/yahavidotcom" target="_blank" > <i class="fa fa-pinterest"></i></a>
      </div>
    </div>
    <div class="row footer-accordion">
      <div class="col s12">
        <div class="about-links">
          <h2 class="clearfix">Know about us <i class="fa fa-plus pull-right" aria-hidden="true"></i></h2>
          <div class="footerlist">
            <a href="<?=WEB_URL?>/aboutus">Brand Video</a> 
                <a href="<?=WEB_URL?>/aboutus/company">Company</a>
                <a href="<?=WEB_URL?>/aboutus/culture">Culture</a>
                <a href="<?=WEB_URL?>/aboutus/team">Team</a>  
                <a href="<?=WEB_URL?>/aboutus/news">News Room</a>
                <a href="<?=WEB_URL?>/aboutus/testimonial">Testimonial</a>
          </div>
        </div>

        <!-- <div class="about-links">
          <h2 class="clearfix">Artists <i class="fa fa-plus pull-right" aria-hidden="true"></i></h2>
          <div class="footerlist">
            <a href="#">Artists in Delhi</a>
            <a href="#">Artists in Mumbai</a>
            <a href="#">Artists in Bengaluru</a>
            <a href="#">Artists in Hyderabad</a>
            <a href="#">Artists in Goa</a>
            <a href="#">Artists in Kolkata</a>
            <a href="#">Testimonial</a>
          </div>
        </div>

        <div class="about-links">
          <h2 class="clearfix">Events <i class="fa fa-plus pull-right" aria-hidden="true"></i></h2>
          <div class="footerlist">
            <a href="#">Events in Delhi</a>
            <a href="#">Events in Bengaluru</a>
            <a href="#">Events in Hyderabad</a>
            <a href="#">Events in Goa</a>
            <a href="#">Events in Kolkata</a>
            <a href="#">Events in Mumbai</a>
            <a href="#">Testimonial</a>
          </div>
        </div> -->

        <div class="about-links"><h2><a href="/terms">User terms </a></h2></div>
        <div class="about-links"><h2><a href="/privacy">Privacy Policy</a></h2></div>
        <div class="about-links"><h2><a href="/contactus">Contact Us</a></h2></div>
      </div>
    </div>
  </div>
</footer>
<?php
View::make('/mobile/include/v1_footer');
?>
</body>
</html>
