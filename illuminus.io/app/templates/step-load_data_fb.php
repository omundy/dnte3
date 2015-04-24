<div id="load_data_fb">
    <div id="spinner" class="centered"></div>
    Loading
</div>

<script type="text/javascript">
    function afterFBInit(at) {
        if (at != undefined)
            loadUserData(at);            
        else
            gotoFirstScreen();
    }
</script>