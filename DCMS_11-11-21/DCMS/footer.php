<?php 
   try{
       include './connection.php';
   } catch (Exception $ex) {
       header("Location:error.php");
   }
   $q="SELECT firstname,lastname,contactno,email,role FROM tblmember WHERE role='Chairman' or role='Co-Chairman' and status='A'";
   $r= mysqli_query($con, $q);
   $name=array();
   $contact=array();
   $email=array();
   while($row= mysqli_fetch_assoc($r)){
       $temp=$row['firstname'] ." " .$row['lastname'];
       array_push($name,$temp);
       array_push($contact,$row['contactno']);
       array_push($email,$row['email']);
   }
?>
<div class="footer-inner bg-white">
    <div class="row">
        <div class="col-md-4" style="height: 10px;">
            <p><?php echo $name[0] ." : " .$contact[0] ."<p style='margin-left: 117px; margin-top: -17px'>{$email[0]}</p>";?></p>    
            <p><?php echo $name[1] ." : " .$contact[1] ." \n <p style='margin-top:-16px ; margin-left:99px;'> {$email[1]} </p>" ;?></p>
        </div>
        <div class="col-md-6 text-right">
            Designed by <a href="#">DCMS</a>
        </div>
    </div>
</div>