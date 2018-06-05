<?php
require 'config.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$id = addslashes($_GET['id']);

	$sql = "UPDATE estado SET status = 'I' where id = '$id' ";	
	$pdo->query($sql);

	header("Location: estado.php");
} else {

	header("Location: ad_estado.php");
}
?>