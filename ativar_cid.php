<?php
require 'config.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$id = addslashes($_GET['id']);

	
	$sql = "UPDATE cidade SET status = 'A' where id = '$id' ";	
	$pdo->query($sql);

	header("Location: cid_inativa.php");
} else {
	header("Location: cidade.php");
}
?>