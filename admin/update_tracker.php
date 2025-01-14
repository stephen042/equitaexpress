<?php  
include 'header.php';

$date = date("Y-m-d H:i:s" , time());
$idtrack = "";
if(isset($_GET['tracker']) && $_GET['tracker'] != ''){
    $idtrack = $_GET['tracker'];
}
if(isset($_POST['submit'])){


$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
$status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);
$tracking_num = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
$tdate= $_POST['udate'];
$ttime= $_POST['utime'];

$sql = "SELECT * FROM tracking_details WHERE tracking_number ='$tracking_num' LIMIT 1";
  
$result = mysqli_query($con, $sql);
  

if(mysqli_num_rows($result) > 0){

$que = "INSERT INTO `tracking_update` (tracking_number, message, status, created_at)  VALUES ('$tracking_num', '$message', '$status', '$tdate $ttime')";
     
    $sqli = mysqli_query($con, $que);

   if($sqli){
       echo "
       <script> alert('Update successfully!');
       window.location.href='dashboard.php';
       </script>
       ";
      

   }else{
       echo "not submitted";
   }
}else{
     echo "
       <script> alert('Tracker information invalid!');
       window.location.href=window.location.href;
       </script>
       ";
}

}

?>
<?php 

 ?>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
 <div class="container-fluid">
   <div class="">   
    <form method="post">
    <div class="col-12">
        <div class="col-12">
          <label for="inputAddress2">Tracker Number</label>
          <input type="text" class="form-control" required name="number" value="<?php echo $idtrack;?>">
        </div><br>

        <div class="col-12">
          <label for="inputAddress2">Message</label>
          <textarea name="message" required class="form-control"></textarea>
          
        </div>
        <br>
        <div class="col-12">
          <label>Status</label>
          <select required name="status" class="form-control">
              <option selected>Select Status</option>
              <option value="Pending">Pending</option>
              <option value="Picked up">Picked up</option>
              <option value="Out for delivery">Out for delivery</option>
              <option value="In Transit">In Transit</option>
              <option value="Enroute">Enroute</option>
              <option value="Cancelled">Cancelled</option>
              <option value="Delivered">Delivered</option>
              <option value="Returned">Returned</option>
          </select>
        </div>
      </div>
      
      <br>
      <br>
        
      
     <div class="col-12">
        <label for="inputAddress2">Update Time</label>
        <input type="time" class="form-control" required name="utime">
      </div><br>
      <div class="col-12">
        <label for="inputAddress2">Update Date</label>
        <input type="date" class="form-control" required name="udate">
      </div><br>
      
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Update Tracker</button>
    </form>

</div>
</div><br>


<?php include 'footer.php'; ?>