<?php
require 'config.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$id = addslashes($_GET['id']);


	$sql = "UPDATE cidade SET status = 'I' where id = '$id' ";	
	$pdo->query($sql);

	header("Location: cidade.php");
} else {
	header("Location: ad_cidade.php");
}
?>