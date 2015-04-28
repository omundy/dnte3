<div id="load_data_fb">
    <div id="spinner" class="centered"></div>
    <?php echo ( isset($text[0]['loading']) ? $text[0]['loading'] : 'Loading' ) ?>
</div>

<style>
    html, body, .site-main  {
        height: 100% !important;
    }
</style>


<script type="text/javascript">

    var timerLoadFb;

    function afterFBInit(at) {
        
        clearTimeout(timerLoadFb);
        
        if (at != undefined)
            loadUserData(at);            
        else
            gotoFirstScreen();
    }
    
    $(document).ready(function() {
        timerLoadFb = setTimeout(gotoFirstScreen, 3000);
    })
</script>