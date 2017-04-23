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
		$lat=$milestone[0];
		$lag=$milestone[1];
		print_r($milestone);
        $query="INSERT INTO `busstopdata`(`id`, `lat`, `long`) VALUES ('null','$lat','$lag')";
		$run=mysqli_query($con,$query);
		//print_r($run);
        
    }
    
}
?>