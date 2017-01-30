<?php
View::make('/include/v1_header');
?>
  <section id="content">
    <div class="banner-bookartist">
      <img src="/assets/v1/img/bookbanner.jpg" alt="banner" class="responsive-img">
    </div>
    <div class="container bookartist-main">
      <div class="row">
        <div class="col s12 margintop0">
          <div class="bookartist-article">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col s12 margintop0">
          <div class="card bookartist-card">
            <div class="row profileform-row">
              <div class="col s12">
                <label>Remarks if any</label>
                <p>success message </p>
              </div>
            </div>
            <div class="center">
              <button onclick="window.location.href='<?=WEB_URL?>'" class="btn" type="submit">Go To Home Page</button>
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
</body>
</html>
