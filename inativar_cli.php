<?php
require 'config.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$id = addslashes($_GET['id']);


	$sql = "UPDATE cliente SET status = 'I' where id = '$id' ";	
	$pdo->query($sql);

	header("Location: clientes.php");
} else {
	header("Location: ad_clientes.php");
}
?>