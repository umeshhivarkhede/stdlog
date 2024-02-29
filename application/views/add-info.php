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
  <?php 
 // $username = ($this->session->userdata['logged_in']['username']);

  ?>
  <h1>Welcome <?php //echo  $username  ?></h1>
    <div class="container  mt-3">
    <form action="<?php echo base_url()?>insert_info" method="post"  enctype="multipart/form-data" >
    <div class="row">
         
            <div class="col-lg-6 mt-3">
            <input class="form-control" name="name" value="" placeholder="Enter name">
            <span style="color:red"><?php echo form_error('name'); ?></span> 
            </div>
            <div class="col-lg-6 mt-3">
            <input class="form-control" name="email" value="" placeholder="Enter Email">
            <span style="color:red"><?php echo form_error('email'); ?></span> 
            </div>
            <div class="col-lg-6 mt-3">
             <input type="radio" id="amount" name="coupon_type" value="1" <?php echo set_checkbox('coupon_type', '1'); ?>  >
<label for="amount">Amount</label>

<input type="radio" id="percentage" name="coupon_type" value="2"  <?php echo set_checkbox('coupon_type', '2'); ?>  >
<label for="percentage">percentage</label>

<span style="color:red"><?php echo form_error('coupon_type'); ?></span> 
</div>
            <div class="col-lg-6 mt-3">
            <select class="form-select" name="course" value="" >
              <option value="">Select</option>
              <option value="BA" <?php echo set_select('course','BA'); ?> >BA</option>
              <option value="BCOM" <?php echo set_select('course','BCOM'); ?>>BCOM</option>
              <option value="BE" <?php echo  set_select('course','BE'); ?>>BE</option>
            </select>
            <span style="color:red"><?php echo form_error('course'); ?></span> 
            </div>
            <div class="col-lg-6 mt-3 ">
            <input type="checkbox"   name="gender" id="gender"  value="male" <?php echo set_checkbox('gender', 'male'); ?>>male
            <input type="checkbox"  name="gender"  id="gender"   value="female"  <?php echo set_checkbox('gender', 'female'); ?> >female
          <span style="color:red" ><?php echo form_error('gender') ?></span>
          </div>
                         <div class="col-lg-6 mt-3">
            <select class="form-select" name="course" value="" >
              <option value="">Select</option>
              <option value="BA" <?php echo set_select('course','BA'); ?> >BA</option>
              <option value="BCOM" <?php echo set_select('course','BCOM'); ?>>BCOM</option>
              <option value="BE" <?php echo  set_select('course','BE'); ?>>BE</option>
            </select>
            <span style="color:red"><?php echo form_error('course'); ?></span> 
            </div>
            <div class="col-lg-6 mt-3">
            <input type="file"  class="form-control" name="profile_pic" value=""  >
            <span style="color:red"><?php echo form_error('profile_pic'); ?></span> 
            </div>
				 <!-- <div class="form-group row">
 					<div class="col-sm-1"> </div>
 					<label class="col-sm-3" for="name"> Profile Pic </label>
 					<div class="col-sm-4">
 						<input type="file" class="form-control"  name="profile_pic" id="profile_pic" >
 					</div> 
 				</div> -->
                <div class="col-lg-6 mt-3">
                <input class="btn btn-info" type="submit" name="submit">
       </div>
</form>
</div>
</div>
</body>
</html>