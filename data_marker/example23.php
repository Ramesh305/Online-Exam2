<html>
<body>
<script>
function on_fun_php()
{
	var result="<?php call_php();?>";
	alert(result)
	return false;
}
</script>
<form action ="" method="post">
<input type="text" name="uname"><br>
<input type="button" value="hit me" onclick="on_fun_php()">
</form>
<?php
$nam = $_POST['uname'];
echo $nam;
function call_php()
{
$con=mysqli_connect('localhost','root','','database');
$file = file('C:\Users\Ramesh\Desktop\Azone\down\ok.txt'); # read file into array
$count = count($file);
$lag;
$lat;
$query;
if($count > 0) # file is not empty
{
    
    foreach($file as $row)
    {
        $milestone =array_map('trim',explode(',',$row));
		$lag=$milestone[0];
		$lat=$milestone[1];
        $query="INSERT INTO `userdata`(`lag`, `lat`) VALUES ('$lag','$lat')";
		$run=mysqli_query($con,$query);
        
    }
    
}	
}
?>
</body>
</html>