<?php
require 'config.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$id = addslashes($_GET['id']);

	
	$sql = "UPDATE cliente SET status = 'A' where id = '$id' ";	
	$pdo->query($sql);

	header("Location: cli_inativo.php");
} else {
	header("Location: clientes.php");
}
?>