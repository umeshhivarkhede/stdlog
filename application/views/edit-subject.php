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
<?php foreach($subject_data as $sub): 
      $id=$sub->id;
      ?>
    <form action="<?php echo base_url()?>/update_subject/<?php echo $id ?>" method="post" >

    <div class="container">
        <div class="row">
            
            <div class="col-lg-6 mt-3" >
                <input type="text" class="form-control" name="subject" value="<?php echo $sub->subject ?>" >

            </div>
            <div class="col-lg-6 mt-3" >
                <input   type="text" class="form-control" name="course" value="<?php echo $sub->course_name ?>" >

            </div>
            
            <div class="col-lg-offset-3 col-lg-6 mt-3" >
                <input class="btn btn-success" type="submit"  value="update" >

            </div>

        </div>
    </div>
</form>
    <?php endforeach; ?>
</body>
</html>