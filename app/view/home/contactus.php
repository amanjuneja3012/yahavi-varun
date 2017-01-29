<?php 
View::make('/include/v1_header')
?>

  <section id="content">
    <!-- Page Layout here -->
    <div class="container">
      <div class="card contactus-row">
        <div class="contactus-col">
          <h3>CONTACT US:</h3>
          <div class="contacttalk">
            <div class="contactus-top clearfix">
              <div class="contactus-title left"><i class="fa fa-envelope"></i></div>
              <div class="contactus-text">
                <p>Send your queries, suggestions and comments to us at :</p>
                <a href="mailto:customercare@yahavi.com">customercare@yahavi.com</a>
              </div>
            </div>
          </div>
          <div class="contacttalk">
            <div class="contactus-top clearfix">
              <div class="contactus-title left"><i class="fa fa-phone"></i></div>
              <div class="contactus-text">
                <p>To talk to our experts and learn more about our services, reach us at</p>
                <a href="tel:+919266635555"> +91- 9266635555</a>
              </div>
            </div>
          </div>
        </div>
        <div class="contactus-col">
          <h3>ADDRESS &amp; DIRECTION:</h3>
          <address>
            <p>Collective Artists Pvt. Ltd.</p>
            <p>Address:212, Surya Kiran Building, 19, KG Marg, New Delhi, Delhi 110001</p>
          </address>
          <div class="contactmap">
            <p>Find us on google map:</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.081589533332!2d77.21983531449484!3d28.62731669106906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd3471c6ac0b%3A0xe6cd5e434c913e84!2sYahavi!5e0!3m2!1sen!2sin!4v1460376447029" width="100%" height="340" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php View::make('/include/v1_footer'); ?>

</body>
</html>

