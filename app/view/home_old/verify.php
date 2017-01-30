<?php 

$success=$data['data'];
$curl=new curl;
@$json=json_decode($curl->get(API_URL.'/account?'.Helper::queryToken()));
$user=$json->data;
$profile_url='';
if($user->user_type==1){
  $profile_url=ARTIST_URL;
}if($user->user_type==2){
  $profile_url=BUSINESS_URL;
}
if($success->success and !empty($profile_url)){
  header('location:'.$profile_url.'/basic');
}
if(!$success->success and !empty($profile_url)){
  header('location:'.$profile_url.'/account');
}

View::make('/include/v1_header');
?>


  <?php if($success->success=='1'){ ?>
      <section id="content">
          <div class="center-align">
            <p>Hi User ! </p>
            <p>Your account has been verified. please login to continue with profile creation.</p>
          <a class="waves-effect waves-light modal-trigger btn jq-login" href="#modal1">Login</a>
          </div>    
      </section>
  <?php } else{  ?>
    <section id="content">
      <div class="center-align">
        <p>Hi User ! <?=$user->name?> ! </p>
        <p>Your account has not been verified. please login to continue with account page and resend  again.</p>
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

