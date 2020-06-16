<?php
if(!$_FILES['file']['error'] > 0){
		
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    $i=0;
    while(file_exists("docs/".$_FILES['file']['name'])){

        $newname = basename($filename,".".$ext).$i.".".$ext;
        if(!file_exists("docs/".$newname)){

            $_FILES['file']['name'] = $newname;
            break;
        }

        $i++ ;
    }

    if(!move_uploaded_file($_FILES['file']['tmp_name'], "docs/".$_FILES['file']['name'])){
        echo "error";
        return;
    }

    $action = "docs/".$_FILES['file']['name'];
    $action = str_replace("'", "\\'", $action);

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0df24b604e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>PDF Viewer</title>
</head>
<body>
    
<div class="top-bar navbar bg-dark fixed-top text-light">
    <button class="btn btn-success mr-auto" id="prev-page">
        <i class="fas fa-arrow-circle-left"></i> Prev Page
    </button>

    <span class="page-info mr-auto ml-auto">
        Page <span id="page-num"></span> of <span id="page-count"></span>
    </span>
    
    
    <button class="btn btn-success ml-auto" id="next-page">
        Next Page <i class="fas fa-arrow-circle-right"></i> 
    </button>

    

</div>

<canvas id="pdf-render"></canvas>
    
<script>
    const url = "<?php echo($action) ?>";
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
<script src="js/main.js"></script>  
</body>
</html>