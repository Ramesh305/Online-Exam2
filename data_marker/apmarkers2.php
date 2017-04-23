<?php
ob_start();
$con=mysqli_connect('localhost','root','','database');


$sql = "SELECT  * FROM userdata12 LIMIT 1000";
$res = mysqli_query($con,$sql);

$xml = new XMLWriter();

$xml->openURI("php://output");
$xml->startDocument();
$xml->setIndent(true);

$xml->startElement('markers');

while ($row = mysqli_fetch_array($res)) {
  $xml->startElement("marker");

  $xml->writeAttribute('lat', $row['0']);
  $xml->writeAttribute('lng', $row['1']);
  

  $xml->endElement();
}

$xml->endElement();

header('Content-type: text/xml');
$xml->flush();
?>