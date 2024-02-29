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
    <table class="table" >
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Course</th>
            <th>Status</th>
</tr>
<?php 
foreach($user_list as $row){?>


<tr>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['gender'] ?></td>
    <td><?= $row['course'] ?></td>
    <td><?= $row['status'] ?></td>
</tr>
<?php 
} ?>
    </table>
</body>
</html>