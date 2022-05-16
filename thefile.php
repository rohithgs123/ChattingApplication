<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Error" . mysqli_connect_error());
}

           $query = "select * from msglog";
           $run = $conn->query($query);
           while($row = $run->fetch_array()) :
           ?>
           <div>
	       <p style="padding: 10px; border: 10px solid black; text-align: center;" >
               <span><?php echo $row['user'];?></span>
               <span><?php echo $row['msgs'];?></span>
	       </p>
           </div>
<?php endwhile; ?>