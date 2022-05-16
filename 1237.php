<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Error" . mysqli_connect_error());
}

session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>chat messages</title>
  
<script>
function ajax(){
       var req = new XMLHttpRequest();
       req.onreadystatechange = function(){
       if(req.readyState == 4 && req.status == 200){
       document.getElementById('chat').innerHTML = req.responseText;
       }
       }
       req.open('GET','thefile.php',true);
       req.send();
}
setInterval(function(){ajax()},1000);
</script>
</head>

<body onload="ajax();">
<div id="chat">
</div>
<div>
<p style="padding: 10px; border: 10px solid black; text-align: center;" >
<form method="post" action="1237.php">
<input type="text" name="text" placeholder="enter message">
<input type="submit" name="submit" value="submit it">
</p>
</form>
  
<?php
if(isset($_POST['submit'])){
$user = $_SESSION['user'];
$text = $_POST['text'];

$query = "INSERT INTO msglog (msgs,user) VALUES ('$text','$user')";
$run =$conn->query($query);

}
?>
</div>  

</body>