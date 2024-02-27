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
    <form action="<?php echo base_url()?>/insert_subject" method="post" >
    <div class="row">
        <div class="col-lg-6 mt-3">
            <input class="form-control" name="subject" value="" placeholder="Enter Subject name" >
            </div>
            <div class="col-lg-6 mt-3">
            <select class="form-select" name="course" value="" >
               <option value="">Select</option>
               <?php foreach($course_list as $course_row){?>
                <option value="<?php echo $course_row['id'] ?>"><?php echo $course_row['course_name'] ?></option>
               <?php } ?>
            </select>
            </div>
           
                <div class="col-lg-6 mt-3">
                <input class="btn btn-info" type="submit" name="submit">
       </div>
</form>
</div>
</div>
</body>
</html>