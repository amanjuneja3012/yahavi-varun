<?php 
$videos=$data['videos']->videos;
$user=$data['user'];
@$form=$data['form'];
@$query=Input::get(array('art_category_id','artist_category_id','genre_id'));
$count=$data->count;
$tquery=Input::get();
if (!isset($tquery['art_category_id']) && (isset($tquery['genre_id']) || isset($tquery['artist_category_id']))) {
  unset($tquery['genre_id']);
  unset($tquery['artist_category_id']);
  header('location:/feature-video');
  die;
}
$uri=$data['static']['uri']?$data['static']['uri']:'/feature-video';
$title='Featured Videos - Yahavi';
$desc=htmlspecialchars('Find out happening of events nearby you. Discover standup comedy, sufi, bollywood, rock, pop DJ night, jazz etc. events happening in your city.');
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
View::make('include/v1_header',array('title'=>$title,'headerKey'=>'event','head'=>$head));
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
  .feauter-tile{
    letter-spacing: normal;
    display: inline-block;
    width: 300px;
    background:#fff;
    box-shadow:1px 1px 5px rgba(0, 0, 0, 0.2);
    margin-bottom:10px;
  }

  .feauter-tile-video{
    position: relative;
    padding-bottom: 56.25%; /* 16:9 */
    height:115px;
  }

  .feauter-tile-video iframe{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  .feauter-tile-time{
    font-size:12px;
    color:#fff;
    padding:2px 3px;
    background:rgba(0,0,0,0.54);
    position: absolute;
    z-index:10;
    right:3px;
    bottom:3px;
  }
  .feauter-tile-time-left{
    font-size:12px;
    color:#fff;
    padding:2px 3px;
    background:rgba(0,0,0,0.54);
    position: absolute;
    z-index:10;
    left:3px;
    bottom:3px;
  }

  .feauter-tile-bottom{
    padding:0 5px 5px 5px;
    color:#434343;
    text-align: left;
  }

  .feauter-tile-bottom h5{
    margin:5px 0 1px;
    font-size: 12px;
    text-transform: capitalize;
    font-weight:600;
  }
  .feauter-tile-bottom p{
    margin:0px;
    font-size: 12px;
  }
  .feauter-tile-bottom p a{
    color:#2f4b93;
  }
.overlay-fixed{
  position: fixed;
  top: 0;
  left: 0;
  opacity: .9;
  height: 100%;
  width: 100%;
  display: none;
  z-index: 9999;
  background: #000;
}
  .customemodoal{
    position: fixed;
    display: none;
    width: 100%;
    height: 100%;
    z-index: 9999;
    cursor: pointer;
  }
  .customemodoal-inner{
    position: absolute;
    left:0;
    top:0;
    right:0;
    bottom:0;
    margin: auto 20px;
  }
  .customemodoal-inner img,.customemodoal-inner iframe{
    max-width: 95%;
    max-height: 95%;
    position: absolute;
    left:0;
    top:0;
    right:0;
    bottom:0;
    margin: auto;
    z-index: 3;
    border: 10px solid rgb(213, 213, 213);
    border-radius: 8px;
  }
  .customemodoal-inner iframe{
    width: 95%;
    height:280px;
  }
  .controls{
    color:#999;
    transform: translateY(-50%);
    top: 46.5%;
    position: relative;
    z-index: 99;
  }
  .controls .left,.controls .right{
    width: 50px;
    height: 50px;
    cursor: pointer;
  }
  .controls .left{
    margin-left:-15px;
  }
  .controls .right{
    margin-right:-15px;
  }
  .controls .left.active,.controls .right.active{
    color:#fff;
  }
  .controls i{
    font-size: 50px;
  }
  .close{
    z-index: 99999;
    width: 36px;
    height: 36px;
    position: fixed;
    top: 2px;
    right: 10px;
    display: none;
    cursor: pointer;
  }
  .close i{
    color:#fff;
    font-size: 36px;
  }
  .yplay{
    position: absolute;
    width: 52px;
    height: 52px;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
  }
  .yplay i{
    font-size: 52px;
    color:rgba(255, 255, 255, 0.5);
  }
  .featurediv{
    position: absolute;
    left: 0;
    top: 0;
    z-index: 5;
  }
</style>
<style type="text/css">
  footer{
    display: none;
  }
</style>
<section id="content">    
    <section  class="listing_section">
      <div style="margin-left:-7px">
        <div class="row">
          <div class="col s12" style="text-align: center">
            <div class="feautre-section feature_video clearfix">
            </div>
          </div>
            <div class="center-align event-controls">
              <button class="btn"  id="load_more" style="background:rgb(1, 162, 165)">Load More</button> 
            </div>  
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
          
          <li class="active" data-ref="presentation2">
            <a href="javascript:void(0)">Art Category <span>0</span></a>
          </li>
          <li data-ref="presentation3">
            <a href="javascript:void(0)">Artist Category <span>0</span></a>
          </li>
          
          <!-- <li data-ref="presentation5">
            <a href="javascript:void(0)">Genre <span>0</span></a>
          </li> -->
        </ul>
      </div>
      <div class="values">
      <div class="tab-content">


          <div data-filcontent="presentation2" class="tab-pane active">
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
<div class="overlay-fixed"></div>
<div class="close">
        <i class="material-icons">close</i>
</div>
<div class="customemodoal">
    <div class="customemodoal-inner">
      <img src="/assets/images/ajax-circular.gif">
    </div>
    <div class="controls">
        <div class="right"><i class="material-icons">keyboard_arrow_right</i></div>
      </div>
      <div class="controls">
        <div class="left"><i class="material-icons">keyboard_arrow_left</i></div>
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
      $("#load_more").trigger('click');
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
        window.location.href='/feature-video?'+query;
    });
    $(".btn-reset").click(function() {
      if ('<?=Input::get("search")?>'!='') {
        window.location.href='/feature-video?search='+'<?=Input::get("search")?>'; 
      }else{
        window.location.href='/feature-video';
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
var page=1;
  $(document).on('click','#load_more',function(){
    $(this).text('Loading..').attr('disabled','disabled');
    $.ajax({
      url: '<?=API_URL?>/video/feature?feature_v=1&page='+page+'<?=Input::get('type')?"&type=past":""?>&'+query_token+'&'+'<?=http_build_query($query)?>',
    }).done(function(data){
      result=$.parseJSON(data);
      if (result.success==1) {
        var html='';
        $.each(result.data.videos,function(i,v){
          html+=appendVideos(v);
        });
        $(".feature_video").append(html);
        $(".tooltipped").tooltip();


        $('#load_more').text('Load More').removeAttr('disabled');
        if (page==1) {
          $("#vcount").text(result.data.count);
        }
        page=page+1;
        if (result.data.videos==null) {
          $('#load_more').remove();
          return false;
        }
        if (result.data.videos.length<9) {
          $('#load_more').remove();
        };
      } else {
        $('#load_more').remove();
        if (page==1) {
          $(".feature_video").html('<p style="text-align:center">No relevent videos found</p>');
        }
      };
    })
  });
function appendVideos(v){
        var ribbon='';
        if(v.is_featured=='1'){
          ribbon='<span class="featurediv tooltipped" data-tooltip="Featured video" data-position="top"><img src="/assets/v1/img/ribbon3.png"></span>';
        }
        var thumb='https://cdn.yahavi.com/url?url='+v.thumb+'&d=300x170';
        return '<div class="feauter-tile">'+
    '<div class="feauter-tile-video">'+
    '<span class="feauter-tile-time">'+parseDuration(v.json.items[0].contentDetails.duration)+'</span>'+
    '<span class="feauter-tile-time-left tooltipped" data-tooltip="Views" data-position="top">'+v.json.items[0].statistics.viewCount+'</span>'+
    '<a class="image" data-type="'+v.type+'" data-id="'+v.id+'" href="#">'+
    '<img src="'+thumb+'">'+ribbon+
    '<div class="yplay"><i class="material-icons">play_circle_outline</i></div>'+
    '</a>'+
    '</div>'+
    '<div class="feauter-tile-bottom">'+
    '<h5 class="ellipsis" title="'+v.json.items[0].snippet.title+'">'+v.json.items[0].snippet.title+'</h5>'+
    '<p class="ellipsis">by <a href="/artist/'+v.artist_id+'">'+v.artist_name+'</a></p>'+
    '</div>'+
    '</div>';
  }
function rand(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}
function parseDuration(PT) {
  var output = [];
  var durationInSec = 0;
  var matches = PT.match(/P(?:(\d*)Y)?(?:(\d*)M)?(?:(\d*)W)?(?:(\d*)D)?T(?:(\d*)H)?(?:(\d*)M)?(?:(\d*)S)?/i);
  var parts = [
    { // years
      pos: 1,
      multiplier: 86400 * 365
    },
    { // months
      pos: 2,
      multiplier: 86400 * 30
    },
    { // weeks
      pos: 3,
      multiplier: 604800
    },
    { // days
      pos: 4,
      multiplier: 86400
    },
    { // hours
      pos: 5,
      multiplier: 3600
    },
    { // minutes
      pos: 6,
      multiplier: 60
    },
    { // seconds
      pos: 7,
      multiplier: 1
    }
  ];
  
  for (var i = 0; i < parts.length; i++) {
    if (typeof matches[parts[i].pos] != 'undefined') {
      durationInSec += parseInt(matches[parts[i].pos]) * parts[i].multiplier;
    }
  }
  
  // Hours extraction
  if (durationInSec > 3599) {
    output.push(parseInt(durationInSec / 3600));
    durationInSec %= 3600;
  }
  // Minutes extraction with leading zero
  output.push(('0' + parseInt(durationInSec / 60)).slice(-2));
  // Seconds extraction with leading zero
  output.push(('0' + durationInSec % 60).slice(-2));
  
  return output.join(':');
};
$('#events_id').addClass('activebg-menue');
</script>

<script type="text/javascript">
var currId=false;
var currType=false;
$(document).on('click','[data-type="image"],[data-type="yt"],[data-type="sc"]',function(e){
  e.preventDefault();
  if (!$(this).attr('data-id')) {return false;};
  var currId=parseInt($(this).attr('data-id'))+1;
  var type=$(this).attr('data-type');
  currType=type;
  openGallery();
  slideGallery(currId,type,1);
});
function slideGallery(id,type,dir){
  $('.customemodoal-inner').html('<img src="/assets/images/ajax-circular.gif">');
  var url='<?=API_URL?>/video/'+id+'/next?dir='+dir+'&type='+type+'&'+query_token;
  $.ajax({
    url: url,
  }).done(function(data) {
    var result=$.parseJSON(data);
    if (!result.success==1) {
      closeGallery();
      alert('Some problem occured');
      return false;
    };
    if (!result.data.id) {
      closeGallery();
      alert('No Item found');
      return false;
    };
    currId=result.data.id;
    if (type=='image') {
      var image = new Image();
      image.src = result.data.image;
      image.onload=function(){
        $('.customemodoal-inner').html('<img src="'+image.src+'">');
      }
    } else if(type=='yt' || type=='sc'){
      var src=result.data.src;
      if (type=='yt') {
       src+='?autoplay=1&modestbranding=1';
      }
      $('.customemodoal-inner').append('<iframe allowfullscreen style="display:none" src="'+src+'"></iframe>');
      $('.customemodoal-inner').find('iframe').load(function(){
        $('.customemodoal-inner').find('img').remove();
        $(this).show();
      });
    }
  }); 
}
function closeGallery(){
  $('.overlay-fixed,.close,.customemodoal').hide();
  $('.controls').find('.left,.right').removeClass('active');
  $('.customemodoal-inner').html('<img src="/assets/images/ajax-circular.gif">');
  currType=false;
  currId=false;
}
function openGallery(){
  var w = ($(window).width() - $('.customemodoal').width())/2,h = ($(window).height() - $('.customemodoal').height())/2;
  $('.overlay-fixed,.close').show();
  $('.customemodoal-inner').html('<img src="/assets/images/ajax-circular.gif">');
  $('.customemodoal').css({left:w,top:h}).show();
}
 $('.customemodoal').mousemove(function(e) {
    if (!$('.customemodoal').is(':visible')) {
      return false;
    }
   var pWidth=$('.customemodoal').width();
   var x = e.pageX;
    if(pWidth/2 > x){
      $('.controls').find('.left').addClass('active');
      $('.controls').find('.right').removeClass('active');
    }else{
      $('.controls').find('.right').addClass('active');
      $('.controls').find('.left').removeClass('active');  
    }
  });
  $('.customemodoal').mouseleave(function() {
    $('.controls').find('.left,.right').removeClass('active');
  });
$('.close').click(function(e) {
    closeGallery();
});

$('.customemodoal').click(function() {
  if ($('.controls .right').hasClass('active')) {
    var dir=1;
  }else{
    var dir=0;
  };
  slideGallery(currId,currType,dir);
});
$(document).keyup(function(e) {
  if (!$('.customemodoal').is(':visible')) {
      return false;
    }
    if (e.which=='39') {
      var dir=1;
    } else if(e.which=='37'){
      var dir=0;
    }else if(e.which=='27'){
      closeGallery();
      return false;
    }else{
      return false;
    }
    slideGallery(currId,currType,dir);
});
</script>


</body>
</html>
