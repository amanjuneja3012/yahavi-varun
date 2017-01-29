<?php 
//Helper::pre($data);die;

$events=$data['events']->events;
$user=$data['user'];
@$form=$data['form'];

$cityIndex=null;
@$query=Input::get(array('search','city_id','locality_id','rating_min','rating_max','fan_min','fan_max','date','genre_id','sort','art_category_id','artist_category_id','specialization_id','language_id','date','cost','is_yahavi'));
$count=$data['events']->count;
switch (@$_COOKIE['user_type']) {
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


$tquery=Input::get();
if (!isset($tquery['art_category_id']) && (isset($tquery['genre_id']) || isset($tquery['artist_category_id']))) {
  unset($tquery['genre_id']);
  unset($tquery['artist_category_id']);
  header('location:/event?'.http_build_query($tquery));
  die;
}

View::makeForce('mobile/include/v1_header',array('title'=>'Yahavi-Events','headerKey'=>'event'));
?>
<style type="text/css">
  ul.select li.active{
    background: #01a2a5;
  }
  li.active a{
    color:#fff !important;
  }
  .hidden{
    display: none !important;
  }
  .bookmark-grid{
    position: absolute;
    z-index: 5;
    left:5px;
    top:-5px;
    font-size:28px;
    color:#fe5b56;
  }
  .bookmark-grid:hover{
    color:#ff3029;
  }
  .past_btn{
    padding:2px 5px 2px 5px;
    font-size:10px;
    margin:10px;
    height:25px;
    line-height:1px;
    background-color:#d5d5d5;
    color:#000;
    box-shadow:none;

  }
</style>
<style type="text/css">
  footer{
    display: none;
  }
</style>
<section id="content">    
    <section  class="listing_section">
      <div style="text-align:left;margin-top:-5px;">
        <a href="/bookartist" target="_blank" style="position: relative;">
          <i class="fibernew">New</i>
          <button class=" past_btn btnloder waves-effect waves-light btn">List an Event</button>
        </a>
        <a href="/event<?=Input::get('type')=='past'?'':'?type=past'?>">
          <button class=" past_btn btnloder waves-effect waves-light btn"><?=Input::get('type')=='past'?'Upcoming Events':'Past Events'?></button>
        </a>
      </div>
      <div style="margin-left:-7px">
        <div class="row">
          <div class="col s12 listingbox-row adjustimg-height114 event-list">

            <?php 
              foreach ($events as $key => $value) { ?>
              <style>
                .no-result{
                  display: none;
                }
              </style>
              <div class="owlcontrol1">
                <div class="item card">
                  <div class="imgviewd">
                  <?php 
              if ($value->is_yahavi==1) {?>
              <a class="bookmark-grid" data-position="top" data-delay="50" data-tooltip="Yahavi event">
                <i class="fa fa-bookmark" aria-hidden="true"></i>
              </a>
              <?php } ?>
                  <a href="/event/<?=$value->id?>">
                  <img src="<?=$value->event_image?>?d=146x114">
                  </a>
                    <div class="imgviewd-text"><?=$value->view_count?> Views</div>
                  </div>
                  <div class="m-follow event-following <?=$value->is_follow>0?'active':''?>" data-id="<?=$value->id?>" data-follow="<?=$value->event_follow_count?>">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                    <small style="font-size:10.5px">
                      <?php
                      if($value->event_follow_count>1000){
                        $value->event_follow_count=round($value->event_follow_count/1000,1).'k';
                      }
                     ?>
                     <?=$value->event_follow_count?>
                    </small>
                  </div>
                  <div class="tile-article-footer">
                    <a href="/event/<?=$value->id?>"><h4 class="ellipsis"><?=$value->name?></h4></a>
                    <?php 
                    $artist_name='';
                    if (sizeof($value->artists)) {
                      foreach ($value->artists as $key => $value1) {
                        $artist_name.='<a style="color:#2f4b93" href="/artist/'.$value1->id.'">'.$value1->name.'</a>,';
                      }
                      $artist_name=rtrim($artist_name,',');
                    }
                    ?>
                    <span class="wrap ellipsis"><?=$artist_name.' '.$value->other_artists?></span>
                  </div>
                  <div class="tile-article-footer">
                    <span class="wrap ellipsis"><?=$value->venue_name?></span>
                    <span><?=date('d-M-y ,  h:i A',strtotime($value->t_from))?></span>
                  </div>
                </div>
              </div>
                
            <?php   } ?>
            <p class="no-result" style="font-size:18px">No results Found In Event</p>
          </div>
          <!-- <div class="event-controls center-align">
              <button class="btn">Load More</button>
          </div> -->
          <?php 
            if ($count>9) {?>
            <div class="center-align event-controls">
              <button class="btn"  id="load_more" style="background:rgb(1, 162, 165)">Load More</button> 
            </div>  
            <?php }
            ?>
        </div>
      </div>
    </section>

  </section>
</div>
<?php 

View::make('mobile/include/v1_footer');
?>

<div class="main_filter">
  <div class="z-depth-3 filter-toggle"><i class="fa fa-filter" aria-hidden="true"></i></div>

    <div class="filter-panel">
      <div class="filter-panel-head"><a class="filter-toggle"><i class="fa fa-arrow-left"></i></a></div>
      <div class="categories">
        <ul>
          <li data-ref="presentation1" class="active">
            <a href="javascript:void(0)">City <span>0</span></a>
          </li>
          <li data-ref="presentation4" id="event_date">
            <a href="javascript:void(0)">event date <span>0</span></a>
          </li>
          <li data-ref="presentation2">
            <a href="javascript:void(0)">Art Category <span>0</span></a>
          </li>
          <li data-ref="presentation3">
            <a href="javascript:void(0)">Artist Category <span>0</span></a>
          </li>
          
          <li data-ref="presentation5">
            <a href="javascript:void(0)">Genre <span>0</span></a>
          </li>

          <li data-ref="presentation6">
            <a href="javascript:void(0)">Event Type <span>0</span></a>
          </li>

        </ul>
      </div>
      <div class="values">
      <div class="tab-content">

        <div data-filcontent="presentation1" class="tab-pane active">
          <div class="search-inner filter-search">
            <input type="text" placeholder="Search">
            <button type="button" class="input-group-addon">
            <i class="fa fa-search"></i>
            </button>
            </div>
            <ul class="city select" data-multiple="0">
              <?php 
              foreach ($form->city as $key => $value) {?>
                <li name="city_id" class="<?=$value->id==$tquery['city_id']?' active ':''?>" value="<?=$value->id?>"><a href="#" data-index="0"><?=$value->text?></a></li>
              <?php } ?>
            </ul>
          </div>

          <div data-filcontent="presentation2" class="tab-pane">
            <div class="search-inner filter-search">
              <input type="text" placeholder="Search">
            <button type="button" class="input-group-addon">
            <i class="fa fa-search"></i>
            </button>
            </div>
            <ul data-multiple="0" class="select art_category">
              <?php 
              foreach ($form->art_category as $key => $value) {?>
                <li class="<?=$value->id==$tquery['art_category_id']?' active ':''?>" name="art_category_id" value="<?=$value->id?>"><a href="#" data-index="0"><?=$value->text?></a></li>
              <?php } ?>
            </ul>
          </div>

          <div data-filcontent="presentation3" class="tab-pane">
            <div class="search-inner filter-search">
              <input type="text" placeholder="Search">
            <button type="button" class="input-group-addon">
            <i class="fa fa-search"></i>
            </button>
            </div>
            <ul data-multiple="1" class="select artist_category">
              
            </ul>
          </div>
          <div data-filcontent="presentation4" class="tab-pane">
            <div class="search-inner filter-search filter-calender">
              <input type="text" name="date" value="<?=$query['date']?>" readonly placeholder="yy-mm-dd" id="datepicker">
            </div>
            <ul class="date select" data-multiple="0" >
                <li class="<?=$tquery['date']==date('Y-m-d',strtotime("+0 day",time()))?'active':''?>" name="date" value="<?=date('Y-m-d',strtotime("+0 day",time()))?>"> <a href="#"><?=date('d M,Y',strtotime("+0 day",time()))?></a></li>
                <li class="<?=$tquery['date']==date('Y-m-d',strtotime("+1 day",time()))?'active':''?>" name="date" value="<?=date('Y-m-d',strtotime("+1 day",time()))?>"> <a href="#"><?=date('d M,Y',strtotime("+1 day",time()))?></a></li>
                <li class="<?=$tquery['date']==date('Y-m-d',strtotime("+2 day",time()))?'active':''?>" name="date" value="<?=date('Y-m-d',strtotime("+2 day",time()))?>"> <a href="#"><?=date('d M,Y',strtotime("+2 day",time()))?></a></li>
                <li class="<?=$tquery['date']==date('Y-m-d',strtotime("+3 day",time()))?'active':''?>" name="date" value="<?=date('Y-m-d',strtotime("+3 day",time()))?>"> <a href="#"><?=date('d M,Y',strtotime("+3 day",time()))?></a></li>
            </ul>
          </div>

          

          <div data-filcontent="presentation5" class="tab-pane">
            <div class="search-inner filter-search">
              <input type="text" placeholder="Search">
            <button type="button" class="input-group-addon">
            <i class="fa fa-search"></i>
            </button>
            </div>
            <ul data-multiple="1" class="select genre">
              
            </ul>
          </div>

          <div data-filcontent="presentation6" class="tab-pane">
            <ul class="etype select" data-multiple="0" >
              <li class="<?=$tquery['is_yahavi']=='1'?'active':''?>" name="is_yahavi" value="1"> <a href="#">Yahavi Events</a></li>
              <li class="<?=$tquery['is_yahavi']=='0'?'active':''?>" name="is_yahavi" value="0"> <a href="#">Other Events</a></li>
            </ul>
          </div>
        </div>
    </div>

      <div class="buttons">
        <button class="btn btn-default btn-reset">Reset</button>
        <button class="btn btn-apply">Apply</button>
      </div>
  </div>
</div>

<script type="text/javascript">
var query_token='<?=Helper::queryToken()?>';
  $( "#datepicker" ).datepicker({
   onSelect: function(dateText) {
    var d = $.datepicker.formatDate("dd-MM-yy", $(this).datepicker("getDate"));
    $('.date li').removeClass('active').addClass('hide');
    $('.date .added').remove();
    var html=make_li(dateText,d);
    $('.date').prepend(html);
  },
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd',
    });
  $('#event_date').click(function(){
    $('.date .added').remove();
    $('.date li').removeClass('hide');
    
  })
  function make_li(v,d){
    return '<li class="active added" name="date" value="'+v+'"> <a href="#">'+d+'</a></li>';
  }
</script>


<script type="text/javascript">
  access_token="<?=$_COOKIE['access_token']?>";
  var tquery=<?=json_encode($tquery)?>;
  console.log(tquery);
    $(document).on("click",".select li" ,function(){
      var parent=$(this).parents('ul');
      console.log(parent.attr('data-multiple'));
      if (parent.attr("data-multiple")==0) {
        $(this).siblings().removeClass('active');
      }
      $(this).toggleClass('active');
      parent.trigger("change");
    });

    $("ul").change(function(){
      var t=$(this).find('li.active').length;
      var e=$('[data-ref="'+$(this).parents(".tab-pane").attr('data-filcontent')+'"]').find('span');
      e.text(t);
      if (t>0) {
        e.show();
      }else{
        e.hide();
      };
    });

    $('.date li').click(function(){
      $('#datepicker').datepicker('setDate', null);
    });

    $(".art_category").change(function(){
      var id=$(this).find('li.active').val();

      $(".genre,.artist_category").find('li').remove();
      $(".genre,.artist_category").trigger("change");
      
      $.ajax({
        url: '<?=API_URL?>/form/art_category/'+id+'/artist_category?filter=event&'+query_token,
      })
      .done(function(data) {
        var result=$.parseJSON(data);
        var html='';
        $.each(result.data,function(i,v) {
          var active=$.inArray(v.id, tquery.artist_category_id)>=0?' active ':'';
          html+='<li name="artist_category_id[]" value="'+v.id+'" class="'+active+'"><a href="#" data-index="0">'+v.text+'</a></li>';
        });
        $(".artist_category").html(html).trigger("change");
      })

      $.ajax({
        url: '<?=API_URL?>/form/art_category/'+id+'/genre?filter=event&'+query_token,
      })
      .done(function(data) {
        var result=$.parseJSON(data);
        var html='';
        $.each(result.data,function(i,v) {
          var active=$.inArray(v.id, tquery.genre_id)>=0?' active ':'';
          html+='<li name="genre_id[]" value="'+v.id+'" class="'+active+'"><a href="#" data-index="0">'+v.text+'</a></li>';
        });
        $(".genre").html(html).trigger("change");

      })    
    });
    $(document).ready(function(){
      $(".art_category,.language,.rating").trigger("change");
    });
    $(".btn-apply").click(function() {
      var query='';
      $(".select li.active").each(function(index, el) {
        query+=$(this).attr('name')+'='+$(this).attr('value')+'&';
        console.log(query);
      });
      if ('<?=Input::get("search")?>'!='') {
        query+='search='+'<?=Input::get("search")?>';
      }
      if ('<?=Input::get('type')?>'=='past') {
        query+='&type=past';
      }
        window.location.href='/event?'+query;
    });
    $(".btn-reset").click(function() {
      if ('<?=Input::get("search")?>'!='') {
        window.location.href='/event?search='+'<?=Input::get("search")?>'; 
      }else{
        window.location.href='/event';
      }
    });

    $('.tab-pane input').keyup(function(){
      var val=$(this).val().trim();
       $(".select li").removeClass('hidden');
      if (val=='') {
       return false;
      };
      $(this).parents('.tab-pane').find(".select li").filter(function(){
        return !$(this).find("a").text().toLowerCase().trim().indexOf(val.toLowerCase())==0;
      }).addClass("hidden");
    });
  $("ul.city").trigger('change');
  $("ul.date").trigger('change');
  $("ul.etype").trigger('change');
</script>

<script type="text/javascript">
  $(document).on('ready',function(){
  $(window).scroll(function() {
    var height=$(document).height() - $(window).height()-80;

    if($(window).scrollTop() >  height) {
      $('.loader').fadeIn(1000);
      $('#load_more').trigger('click');
    }
  });
});



  access_token="<?=$_COOKIE['access_token']?>";
var page=2;
    $(document).on('click','#load_more',function(){
        $(this).text('Loading..').attr('disabled','disabled');
        $.ajax({
            url: '<?=API_URL?>/admin/event/?page='+page+'<?=Input::get('type')?"&type=past":""?>&'+query_token+'&'+'<?=http_build_query($query)?>',
        }).done(function(data){
            result=$.parseJSON(data);
            if (result.success==1) {
                html='';
              $.each(result.data.events,function(i,v){
                html+=append_artist(v);
              });
              var mhtml=$(html);
              $(".event-list").append(mhtml);

            
            $('#load_more').text('Load More').removeAttr('disabled');
            /*$(".input-id").rating('refresh',{
              showClear:false,
              showCaption:false,
              size:'xs',
              step:1
            });*/

            page=page+1;
            if (result.data.events==null) {
              $('#load_more').remove();
              return false;
            }
            if (result.data.events.length<9) {
              $('#load_more').remove();
            };
            } else {
              $('#load_more').remove();
            };
        })
    });
function rand(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}
function append_artist(v){
  if(v.is_fan>0){
        str="faved";
    }else{
        str='';
    }
    var h=rand(190,300);
    var sh=h+92;
    // if(v.is_approved>0 || v.user_type==3){
    //   a_fan_count = v.fan_count;
    // }else{
    //   a_fan_count = v.fan_count-1;
    // }
    if (v.view_count>1000) {
      v.view_count=MATH.round(v.view_count/1000,1)+'k';
    }
    if (v.event_follow_count>1000) {
      v.event_follow_count=MATH.round(v.event_follow_count/1000,1)+'k';
    }
    var fstr='';
    if (v.is_follow) {
      fstr='artist-rating faved';
    }
    var artists='';
    if (v.artists.length) {
      $.each(v.artists,function(index, el) {
        artists+='<a style="color:#2f4b93" href="/artist/'+el.id+'">'+el.name+'</a>,';
      });
      artists=artists.substring(0, artists.length - 1);
    }
    
    return '<div class="owlcontrol1">'+
'<div class="item card">'+
'<div class="imgviewd">'+
'<img src="'+v.event_image+'?d=146x114" onError="this.onerror=null;this.src=\'https://cdn.yahavi.com/content/images/logod.png?d=205x'+h+'\';">'+
'<div class="imgviewd-text">'+v.view_count+' Views</div>'+
'</div>'+
'<div class="m-follow event-following '+fstr+'" data-id="'+v.id+'" data-follow="'+v.event_follow_count+'">'+
'<i class="fa fa-heart" aria-hidden="true"></i>'+
'<small style="font-size:10.5px">'+v.event_follow_count+'</small>'+
'</div>'+
'<div class="tile-article-footer">'+
'<a href="/event/'+v.id+'"><h4 class="ellipsis">'+v.name+'</h4></a>'+
'<span class="wrap ellipsis">'+artists+' '+v.other_artists+'</span>'+
'</div>'+
'<div class="tile-article-footer">'+
'<span class="wrap ellipsis">'+v.venue_name+'</span>'+
'<span>'+v.dateStr+'</span>'+
'</div>'+
'</div>'+
'</div>';
}
$('#events_id').addClass('activebg-menue');
</script>

</body>
</html>
