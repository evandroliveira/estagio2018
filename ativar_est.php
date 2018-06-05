<?php
require 'config.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$id = addslashes($_GET['id']);

	
	$sql = "UPDATE estado SET status = 'A' where id = '$id' ";	
	$pdo->query($sql);

	header("Location: est_inativo.php");
} else {
	header("Location: estado.php");
}
?>