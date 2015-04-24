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
<?php if ($control['lang'] == 'EN'): ?>
xtn2 = "3";
<?php elseif($control['lang'] == 'DE'): ?>
xtn2 = "2";
<?php elseif(in_array($control['lang'], array('CA', 'FR'))): ?>
xtn2 = "1";
<?php endif; ?>
<?php if ($control['step'] == 'one'): ?>
    xtpage = "webprod_donottrack::illuminus::step1";
<?php elseif ($control['step'] == 'two'): ?>
    xtpage = "webprod_donottrack::illuminus::step2";
<?php elseif ($control['step'] == 'three'): ?>
    xtpage = "webprod_donottrack::illuminus::step3";
<?php endif; ?>
xtdi = "";
xt_multc = "";
xt_an = "";
xt_ac = "";

//do not modify below
if (window.xtparam!=null){window.xtparam+="&ac="+xt_ac+"&an="+xt_an+xt_multc;}
else{window.xtparam = "&ac="+xt_ac+"&an="+xt_an+xt_multc;};
</script>
<script src="assets/js/xtcore.js"></script>