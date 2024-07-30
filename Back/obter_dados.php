<?php include('../banco/config.php');
$id = $_POST['id'];
$sql = "SELECT * FROM estoque WHERE id='$id' LIMIT 1";
$query = mysqli_query($conexao,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>
