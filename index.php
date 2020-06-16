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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card col-8">
                    <img src="logo.png" class="card-img-top " >
                    <div class="card-body">
                        <h5 class="card-title">Upload PDF</h5>
                        
                        <form id="form-a" action="showPdf.php" method="post" enctype='multipart/form-data' >
                            <div class="form-group">
                                <label for="file">File</label>
                                <input type="file" class="form-control-file" name="file">
                            </div>
                        </form>
                        
                        <button type="submit" form="form-a" class="btn btn-primary" >View</button>
                    </div>
            </div>
        </div>
    </div>    




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>  
</body>
</html>