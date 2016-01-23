<script src='jquery.js'></script>
<script>
jQuery('.uploadbox').change(function() {
alert(1);
    jQuery.ajax({
        type: "POST",
        url: "includes/friserupload.php",
        success: function(){
            jQuery('div.success').fadeIn();
        }
    });
    return false;
});


</script>
<input type="file" name="uploadbox" id="uploadbox" class="uploadbox" size="35"">
