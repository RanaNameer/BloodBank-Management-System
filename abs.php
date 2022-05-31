<?php 
session_start();
require 'file/connection.php';
if(isset($_GET['search'])){
    $searchKey = $_GET['search'];
    $sql = "select bloodinfo.*, hospitals.* from bloodinfo, hospitals where bloodinfo.hid=hospitals.id && bg='$searchKey'";
    $sql1 = "SELECT blooddinfo.*, receivers.* from blooddinfo, receivers where blooddinfo.rid=receivers.id && bg='$searchKey'";
}else{
    $sql = "select bloodinfo.*, hospitals.* from bloodinfo, hospitals where bloodinfo.hid=hospitals.id";
    $sql1 = "SELECT blooddinfo.*, receivers.* from blooddinfo, receivers where blooddinfo.rid=receivers.id";
}
$result = mysqli_query ($conn, $sql);
$result1 = mysqli_query ($conn, $sql1);
?>

<!DOCTYPE html>
<html>
<?php $title="Bloodbank | Available Blood Samples"; ?>
<?php require 'head.php'; ?>
<?php require 'navbar.php'; ?>
<style>
    body{
    
    background-size: cover;
    min-height: 0;
    height: 900px;
  }
.login-form{
    width: calc(100% - 20px);
    max-height: 650px;
    max-width: 450px;
    background-color: white;
}
</style>
<body>
    
    <div class="container cont">
        
        <?php require 'message.php'; ?>
        
        <div class="row col-lg-8 col-md-8 col-sm-12 mb-3">
            <form method="get" action="" style="margin-top:-20px; ">
            <label class="font-weight-bolder">Select Blood Group:</label>
               <select name="search" class="form-control">
               <option><?php echo @$_GET['search']; ?></option>
               <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
               </select><br>
               <a href="abs.php" class="btn btn-info mr-4"> Reset</a>
               <input type="submit" name="submit" class="btn btn-info" value="search">
           </form>
        </div>

        <table class="table table-responsive table-striped rounded mb-5">
            <tr><th colspan="7" class="title">Available Blood Samples</th></tr>
            <tr>
                <th>#</th>
                <th>Hospital Name</th>
                <th>Hospital City</th>
                <th>Hospital Email</th>
                <th>Hospital Phone</th>
                <th>Blood Group</th>
                <th>Action</th>
            </tr>

            <div>
                <?php
                if ($result) {
                    $row =mysqli_num_rows( $result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                }else echo '<b style="color:white;background-color:red;padding:7px;border-radius: 15px 50px;">Nothing to show.</b>';
            }
            ?>
            </div>

        <?php while($row = mysqli_fetch_array($result)) { ?>

            <tr>
                <td><?php echo ++$counter;?></td>
                <td><?php echo $row['hname'];?></td>
                <td><?php echo ($row['hcity']); ?></td>
                <td><?php echo ($row['hemail']); ?></td>
                <td><?php echo ($row['hphone']); ?></td>
                <td><?php echo ($row['bg']); ?></td>

                <?php $bid= $row['bid'];?>
                <?php $hid= $row['hid'];?>
                <?php $bg= $row['bg'];?>
                <form action="file/request.php" method="post">
                    <input type="hidden" name="bid" value="<?php echo $bid; ?>">
                    <input type="hidden" name="hid" value="<?php echo $hid; ?>">
                    <input type="hidden" name="bg" value="<?php echo $bg; ?>">

                <?php if (isset($_SESSION['hid'])) { ?>
                <td><a href="javascript:void(0);" class="btn btn-info hospital">Request Sample</a></td>
                <?php } else {(isset($_SESSION['rid']))  ?>
                <td><input type="submit" name="request" class="btn btn-info" value="Request Sample"></td>
                <?php } ?>
                
                </form>
            </tr>

        <?php } ?>
        </table>


        <table class="table table-responsive table-striped rounded mb-5">
            <tr><th colspan="7" class="title">Available Blood Samples</th></tr>
            <tr>
                <th>#</th>
                <th>Donor Name</th>
                <th>Donor City</th>
                <th>Donor Email</th>
                <th>Donor Phone</th>
                <th>Blood Group</th>
                <th>Action</th>
            </tr>

            <div>
                <?php
                if ($result1) {
                    $row1 =mysqli_num_rows( $result1);
                    if ($row1) { //echo "<b> Total ".$row." </b>";
                }else echo '<b style="color:white;background-color:red;padding:7px;border-radius: 15px 50px;">Nothing to show.</b>';
            }
            ?>
            </div>

        <?php while($row1 = mysqli_fetch_array($result1)) { ?>

            <tr>
                <td><?php echo ++$counter;?></td>
                <td><?php echo $row1['rname'];?></td>
                <td><?php echo ($row1['rcity']); ?></td>
                <td><?php echo ($row1['remail']); ?></td>
                <td><?php echo ($row1['rphone']); ?></td>
                <td><?php echo ($row1['bg']); ?></td>

                <?php $bid= $row1['bdid'];?>
                <?php $hid= $row1['rid'];?>
                <?php $bg= $row1['bg'];?>
                <form action="file/request.php" method="post">
                    <input type="hidden" name="bid" value="<?php echo $bid; ?>">
                    <input type="hidden" name="hid" value="<?php echo $hid; ?>">
                    <input type="hidden" name="bg" value="<?php echo $bg; ?>">

                <?php if (isset($_SESSION['hid'])) { ?>
                <td><a href="javascript:void(0);" class="btn btn-info hospital">Request Sample</a></td>
                <?php } else {(isset($_SESSION['rid']))  ?>
                <td><input type="submit" name="request" class="btn btn-info" value="Request Sample"></td>
                <?php } ?>
                
                </form>
            </tr>

        <?php } ?>
        </table>
    </div>
   
</body>

<script type="text/javascript">
    $('.hospital').on('click', function(){
        alert("Hospital user can't request for blood.");
    });
</script>