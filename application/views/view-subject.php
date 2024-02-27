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
    <div class="container">
        <div class="row mt-3">
        <table class="table responsive" >
            <tr>
                <th>Action</th>
                <th>Course</th>
                <th>Subject</th>
         </tr>
         <?php foreach($subject_list as $sub){?>
           <tr>
            <td><a href="<?php echo base_url() ?>edit-subject/<?php echo $sub['id'] ?>" class="btn btn-success" >edit</a></td>
            <td><?php echo $sub['course_name'] ?></td>
            <td><?php echo $sub['subject'] ?></td>
            </tr>
      <?php } ?>  
           



</table>
</div>
</div>
</body>
</html>