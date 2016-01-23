<script src="jquery.js"></script>
<script>
$(document).ready(function(){
    $('.add_more').click(function(e){
        e.preventDefault();
        $(this).before("<input name='file[]' type='file'>");
    });
});
	$('#upload').click(function() {
    var filedata = document.getElementByName("file"),
            formdata = false;
    if (window.FormData) {
        formdata = new FormData();
    }
    var i = 0, len = filedata.files.length, img, reader, file;

    for (; i < len; i++) {
        file = filedata.files[i];

        if (window.FileReader) {
            reader = new FileReader();
            reader.onloadend = function(e) {
                showUploadedItem(e.target.result, file.fileName);
            };
            reader.readAsDataURL(file);
        }
        if (formdata) {
            formdata.append("file", file);
        }
    }
if (formdata) {
        $.ajax({
            url: "/downloads/",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function(res) {

            },       
            error: function(res) {

             }       
             });
            }
        });
</script>
<form enctype="multipart/form-data" action="upload.php" method="post">
    <input name="file[]" type="file" />
    <button class="add_more">Add More Files</button>
    <input type="button" id="upload" value="Upload File" />
</form>
