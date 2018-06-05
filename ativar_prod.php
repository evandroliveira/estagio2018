<?php
require 'config.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$id = addslashes($_GET['id']);

	
	$sql = "UPDATE produto SET status = 'A' where id = '$id' ";	
	$pdo->query($sql);

	header("Location: prod_inativo.php");
} else {
	header("Location: produto.php");
}
?>