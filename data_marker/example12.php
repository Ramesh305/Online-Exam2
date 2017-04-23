<html>
  <body>
    <script type="text/javascript">  
<?php
$con=mysqli_connect('localhost','root','','database');
$file = file('E:\ok.txt'); # read file into array
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
echo "hello";
?>
</script>
</body>
</html>