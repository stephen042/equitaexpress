<?php 
include 'header.php';

$msg = "";
$passOld = "";

  	if (isset($_POST['submit'])) {

      $admin = $_SESSION['ADMIN_LOGIN'];

  		$select =  "SELECT * FROM tracking_admin WHERE email = '$admin' LIMIT 1 ";
  		 $query = mysqli_query($con, $select);

       if (mysqli_num_rows($query) > 0) {
         while($row = mysqli_fetch_assoc($query)) {
          $passOld = $row['password'];
          $id = $row['id'];
         }
       }else{
        $msg = "not found";
       }

  		$oldpass = trim($_POST['oldpassword']);
  		$newpass = trim($_POST['newpassword']);

      

  		if ($oldpass == $passOld) {
  			
        $update = mysqli_query($con, "UPDATE tracking_admin SET password = '$newpass' ");
          if ($update) {
            $msg = "Password changed Successfully";
        } else {
            $msg = "Error updating record: " . mysqli_error($con);
        }

  		}else{
  			
  			$msg = "Incorrect Old Password";
  		}
  	}


?>

<br/>
<br/>
<br/>
<br/>

 <div style="padding: 60px 25px 30px 5px;">
 <div class="container d-flex justify-content-center">
   <div class="row">   
   	<span style="color: blue; font-size: 18;"><?php echo $msg ?></span>
<form method="post" action="changepassword.php">
  <div class="form-row">
    <div class="form-group col-md-12 col-xl-12">
      <label for="inputEmail4">Old Password</label>
      <input type="password"  width="100" required="" class="form-control" name="oldpassword">
    </div><br>

    <div class="form-group col-md-12 col-xl-12">
      <label for="inputPassword4">New Password</label>
      <input type="password" required  class="form-control" name="newpassword" >
    </div><br>
  
  </div>
  <br>

  <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
</form>

<br/><br/>
</div>
</div>
</div>

<?php 

	include 'footer.php';

 ?>