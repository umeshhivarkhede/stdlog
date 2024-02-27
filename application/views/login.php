<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container  mt-3">
    <form action="<?php echo base_url()?>/login" method="post" >
    <div class="col-lg-6 mt-3">
    <div class="row">
        <div class="col-lg-12 mt-3">
            <input class="form-control" name="username" value="" placeholder="Enter username" >
            </div>
            <div class="col-lg-12 mt-3">
            <input class="form-control" name="password"  type="password" placeholder="Enter password" >
            </div>
           
                <div class="col-lg-12 mt-3">
                <input class="btn btn-info" type="submit" name="login" value="Login" >
       </div>
       </div>
</form>
</div>
</div>
</body>
</html>