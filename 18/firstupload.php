<?php

move_uploaded_file($_FILES["uploadbox"]["tmp_name"],
"../frisers/" . $_FILES["uploadbox"]["name"]);  
?>
