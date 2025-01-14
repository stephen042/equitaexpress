<?php 
include 'header.php';


$date = date("Y-m-d H:i:s" , time());

// for deleting tracker
if(isset($_GET['tracker']) && $_GET['tracker'] != '')
{
$tracker_id=filter_var($_GET['tracker'], FILTER_SANITIZE_STRING);
$msg=mysqli_query($con,"DELETE from tracking_details where tracking_number='$tracker_id' ");
mysqli_query($con,"DELETE from tracking_update  where tracking_number='$tracker_id' ");
if($msg)
{
echo "<script>alert('Tracker deleted successfully');
window.location.href='index.php';
</script>";
}
}

$n = 10;
function getNumber($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}


if(isset($_POST['submit'])){

$sendername = filter_var($_POST['sendname'], FILTER_SANITIZE_STRING);

$receivename = filter_var($_POST['receivename'], FILTER_SANITIZE_STRING);

$receivenumber = filter_var($_POST['receivenumber'], FILTER_SANITIZE_STRING);

$email = filter_var($_POST['emailadd'], FILTER_SANITIZE_STRING);

$parcel = filter_var($_POST['parcel'], FILTER_SANITIZE_STRING);

$size = filter_var($_POST['size'], FILTER_SANITIZE_STRING);

// $tnumber = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
$tnumber = getNumber($n);

$origin = filter_var($_POST['origin'], FILTER_SANITIZE_STRING);

$destination = filter_var($_POST['destination'], FILTER_SANITIZE_STRING);

// $transport = filter_var($_POST['transport'], FILTER_SANITIZE_STRING);
// $pieces = filter_var($_POST['pieces'], FILTER_SANITIZE_STRING);

$weight = filter_var($_POST['weight'], FILTER_SANITIZE_STRING);
$cubic = filter_var($_POST['cubic'], FILTER_SANITIZE_STRING);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
$status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

$required_date = $_POST['required_date'];
$required_time = $_POST['required_time'];
$delivery_date = $_POST['delivery_date'];
$delivery_time = $_POST['delivery_time'];
$tdate = $_POST['udate'];
$ttime = $_POST['utime'];

$tmp = $_FILES['image']['tmp_name'];
$filename = $_FILES['image']['name'];
$imgname = $tnumber.".png";
$dir = "../uploads/".$imgname;
$check = @getimagesize($tmp);
if ($check === false) {
    echo "";
}else{
    $query = "INSERT INTO  `tracking_details` (tracking_number, origin, destination, weight, cubic, sender_name, receiver_name, receiver_number, email, parcel_name,  status, size, message, delivery_required_by, estimated_delivery, image) VALUES ('$tnumber', '$origin', '$destination', '$weight', '$cubic', '$sendername', '$receivename', '$receivenumber', '$email', '$parcel', '$status', '$size', '$message', '$required_date $required_time', '$delivery_date $delivery_time', '$imgname') ";
   $sql = mysqli_query($con, $query);
   if($sql){
    move_uploaded_file($tmp, $dir);
    $que = "INSERT INTO `tracking_update` (tracking_number, message, status, created_at)  VALUES ('$tnumber', '$message', '$status', '$tdate $ttime')";
    $sqli = mysqli_query($con, $que);
    echo "<script>
        alert('New Tracking added successfully');
        window.location.href = 'index.php';
    </script>";
   }else{
       echo "not submitted";
   }
}



}

?>


<br/>
<br/>
<br/>
<br/>
<br/>

 <div class="container">
   <div class="">   
      <form method="post" enctype="multipart/form-data">
        <div class=" row">
            <label class="col-lg-4 col-form-label" for="val-username">Sender's name <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input required type="text" name="sendname" class="form-control" >
            </div>
        </div>

        <div class=" row mt-3">
            <label class="col-lg-4 col-form-label" >Receiver's name <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input required type="text" name="receivename" class="form-control" >
            </div>
        </div>

        <div class=" row mt-3">
            <label class="col-lg-4 col-form-label" for="val-username">Receiver's phone number <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input required type="text" name="receivenumber" class="form-control" >
            </div>
        </div>

        <div class=" row mt-3">
            <label class="col-lg-4 col-form-label" for="val-username">Email Address <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input required type="email" name="emailadd" class="form-control" >
            </div>
        </div>

        <div class=" row mt-3">
            <label class="col-lg-4 col-form-label" for="val-username">Name of parcel <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input required type="text" name="parcel" class="form-control" >
            </div>
        </div>

        <div class=" row mt-3">
            <label class="col-lg-4 col-form-label" for="val-username">Place of origin <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input required type="text" name="origin" class="form-control" >
            </div>
        </div>

        <div class=" row mt-3">
            <label class="col-lg-4 col-form-label" for="val-username">Destination <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input required type="text" name="destination" class="form-control" >
            </div>
        </div>

        <div class=" row mt-3">
            <label class="col-lg-4 col-form-label" for="val-username">Status <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <div class="radio mb-3">
                    <label>
                        <input required type="radio" value="Pending" name="status">Pending</label>
                </div>

                <div class="radio mb-3">
                    <label>
                        <input required type="radio" value="Picked up" name="status">Picked up</label>
                </div>

                <div class="radio mb-3">
                    <label>
                        <input required type="radio" value="Out for delivery" name="status">Out for delivery</label>
                </div>

                <div class="radio mb-3">
                    <label>
                        <input required type="radio" value="In Transit" name="status">In Transit</label>
                </div>

                <div class="radio mb-3">
                    <label>
                        <input required type="radio" value="Enroute" name="status">Enroute</label>
                </div>

                <div class="radio mb-3">
                    <label>
                        <input required type="radio" value="Cancelled" name="status">Cancelled</label>
                </div>

                <div class="radio mb-3">
                    <label>
                        <input required type="radio" value="Delivered" name="status">Delivered</label>
                </div>

                <div class="radio mb-3">
                    <label>
                        <input required type="radio" value="Returned" name="status">Returned</label>
                </div>
            
            </div>
        </div>

        <div class=" row mt-3">
            <label class="col-lg-4 col-form-label" for="val-username">Weight (Kgs) <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input required type="text" name="weight" class="form-control" >
            </div>
        </div>

        <div class=" row mt-3">
            <label class="col-lg-4 col-form-label" for="val-username">Weight (Cubic metres) <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input required type="text" name="cubic" class="form-control" >
            </div>
        </div>

        <div class=" row mt-3">
            <label class="col-lg-4 col-form-label" for="val-username">Size/Type <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input required type="text" name="size" class="form-control" >
            </div>
        </div>

        <div class=" row mt-3">
            <label class="col-lg-4 col-form-label" for="val-username">Delivery Required By - Date <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input required type="date" name="required_date" class="form-control" >
            </div>
        </div>

        <div class=" row mt-3">
            <label class="col-lg-4 col-form-label" for="val-username">Delivery Required By - Time <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input required type="time" name="required_time" class="form-control" >
            </div>
        </div>

        <div class=" row mt-3">
            <label class="col-lg-4 col-form-label" for="val-username">Estimated Delivery - Date <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input required type="date" name="delivery_date" class="form-control" >
            </div>
        </div>

        <div class=" row mt-3">
            <label class="col-lg-4 col-form-label" for="val-username">Estimated Delivery - Time <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input required type="time" name="delivery_time" class="form-control" >
            </div>
        </div>

        <div class=" row mt-3">
            <label class="col-lg-4 col-form-label" for="val-username">Additional Comment <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <textarea class="form-control" name="message" rows="5"></textarea>
            </div>
        </div>

        <div class=" row mt-3">
            <label class="col-lg-4 col-form-label" for="val-username">Time Created<span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input required type="time" name="utime" class="form-control" >
            </div>
        </div>

        <div class=" row mt-3">
            <label class="col-lg-4 col-form-label" for="val-username">Date Created<span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input required type="date" name="udate" class="form-control" >
            </div>
        </div>

        <div class=" row mt-3">
            <label class="col-lg-4 col-form-label" for="val-username">Item Image<span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input required type="file" name="image" required class="form-control" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
            </div>
            <div><img src="" id="img-preview" width="100%" height="100%" style="display: none;"></div>
        </div>

        
        <div class=" row text-center mt-3">
            <div class="col-lg-8 ml-auto">
                <button type="submit" name="submit" class="btn btn-primary">Add Tracker</button>
            </div>
        </div>
      </form>


<br/><br/>
<div class="table-responsive" style="margin-top: 30px;">
   <table class="table table-striped">
  <thead class="thead-light">
    <tr>
        <th>Image</th>
      <th scope="col">Trackers</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
       $sql_fetch = "SELECT * FROM tracking_details ORDER BY id DESC";
                 $result_fetch = mysqli_query($con, $sql_fetch);
                 while($user = mysqli_fetch_array($result_fetch)) { 
                     $tdi = $user['tracking_number'];
                 $sql_fetch1 = "SELECT status FROM tracking_update WHERE tracking_number = '$tdi' ORDER BY id DESC";
                 $result_fetch2 = mysqli_query($con, $sql_fetch1);
                 $result_fetch1 = mysqli_fetch_assoc($result_fetch2)
                 ?>
    <tr>
        <td>
            <img src="../uploads/<?php echo $user['image'] ?>" width="50" height="50">
        </td>
      <td style="color: #000;"><?php echo $tdi;?></td>
      <td style="color: #000;">
          <?php 
          // if($result_fetch1['status'] == 'RECEIVED'){
          // echo "PICKED";
          // }
          // if($result_fetch1['status'] == 'IN TRANSIT'){
          // echo "ARRIVED ";
          // }
          // if($result_fetch1['status'] == 'DELIVERED'){
          // echo "DELIVERED";
          // }
          echo $result_fetch1['status']
          ?> 
      <td style="color: #000;"><a href="update_tracker.php?tracker=<?php echo $tdi;?>"><span class='badge badge-me' style="padding: 8px 10px;background: blue; color: white; cursor: pointer;">UPDATE</span></a> | <a href="index.php?tracker=<?php echo $tdi;?>" onClick="return confirm('Do you really want to delete');"><span class='badge badge-me' style="padding: 8px 10px;background: #a51212; color: white; cursor: pointer;">DELETE</span></a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</table>

</div>
</div>
</div>

<script type="text/javascript">
      function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    console.log(src);
    var preview = document.getElementById("img-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}

</script>


<?php 
include 'footer.php';
?>