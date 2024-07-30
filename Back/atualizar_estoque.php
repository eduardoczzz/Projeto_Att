<?php 
include('../banco/config.php');
$produto = $_POST['produto'];
$quantidade = $_POST['quantidade'];
$fornecedor = $_POST['fornecedor'];
$nota_fiscal = $_POST['nota_fiscal'];
$estado_uso = $_POST['estado_uso'];
$id = $_POST['id'];

$sql = "UPDATE `estoque` SET  `produto`='$produto' , `quantidade`= '$quantidade', `fornecedor`='$fornecedor',  `nota_fiscal`='$nota_fiscal', `estado_uso`='$estado_uso' WHERE id='$id' ";
$query= mysqli_query($conexao,$sql);
$lastId = mysqli_insert_id($conexao);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>