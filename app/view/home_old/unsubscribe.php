<?php



$success=$data['data'];
View::make('/include/v1_header');
?>


  <?php if($success->success=='1'){ ?>
      <section id="content">
          <div class="center-align">
            <p>Hi User ! </p>
            <p>You have been successfully unsubscribed.</p>
          <a class="waves-effect waves-light modal-trigger btn jq-login" href="#modal1">Login</a>
          </div>    
      </section>
  <?php } else{  ?>
    <section id="content">
      <div class="center-align">
        <p>Hi User ! <?=$user->name?> ! </p>
        <p>We are unable to unsubscribe you at this moment. please try again. </p>
      <a class="waves-effect waves-light modal-trigger btn jq-login" href="#modal1">Login</a>
      </div> 
    </section>
    <?php } ?>
  </div>















<?php 
view::make('/include/v1_footer');
?>
 </body>
</html>

