<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    alert("cxx");
  });
});
</script>
</head>
<body>

<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

<button>Get External Content</button>

    <from>
        <select  name="course_id" oninput='get_details(this.value)'>
        <option value="" >Select</option>
            <?php foreach($course_list as $row){ ?>
           <option value="<?php echo $row['course_id']; ?>" ><?php echo $row['course_name']; ?></option>

<?php } ?>
</select>
<select  name="subject"  id="subject" >
        <option value="" >Select</option>
           
</select> 
 
<script type="text/javascript">

function get_details(course_id)
{
 
jQuery.ajax({
                  type: "POST",
                
                  url: "<?php echo base_url("get_subject"); ?>",
                  data: {course_id: course_id},
                  success: function(response) 
                        {
                      alert(response);
                            $('#subject').html(response);                                     
                               
                        }
                  });
}     
</script>
</from>
</body>
</html>