<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
  _fbq.push(['addPixelId', '893511094044886']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=893511094044886&amp;ev=PixelInitialized" /></noscript>

<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-42015401-15');ga('send','pageview');
    ga('create','UA-32257069-1', {'name': 'newTracker'});ga('newTracker.send','pageview');
</script>
<script type="text/javascript">
xtnv = document;   
xtsd = "https://logs1136";
xtsite = "539110";
<?php if ($control['lang'] == 'EN'){ ?>
xtn2 = "3";
<?php } else if ($control['lang'] == 'DE'){ ?>
xtn2 = "2";
<?php } else if ($control['lang'] == 'FR' || $control['lang'] == 'CA'){ ?>
xtn2 = "1";
<?php } ?>

//page name (with the use of :: to create chapters)  
<?php if ($control['step'] == 'zero'){ ?>
xtpage = "webprod_donottrack::illuminus::index"
<?php } else if ($control['step'] == 'load_data'){ ?>
xtpage = "webprod_donottrack::illuminus::getstarted"
<?php } else if ($control['step'] == 'privacy'){ ?>
xtpage = "webprod_donottrack::illuminus::privacy"
<?php } else if ($control['step'] == 'one'){ ?>
xtpage = "webprod_donottrack::illuminus::personality"
<?php } else if ($control['step'] == 'two'){ ?>
xtpage = "webprod_donottrack::illuminus::financialrisk"
<?php } else if ($control['step'] == 'three'){ ?>
xtpage = "webprod_donottrack::illuminus::healthrisk"
<?php } else { ?>
xtpage = "webprod_donottrack::illuminus";  
<?php } ?>

xtdi = "";
xt_multc = "";
xt_an = "";
xt_ac = "";

//do not modify below
if (window.xtparam!=null){window.xtparam+="&ac="+xt_ac+"&an="+xt_an+xt_multc;}
else{window.xtparam = "&ac="+xt_ac+"&an="+xt_an+xt_multc;};
</script>
<script src="<?php print $path_to_stats ?>xtcore.js"></script>