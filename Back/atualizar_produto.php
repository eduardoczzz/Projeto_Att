<?php 
include('../banco/config.php');
$produto = $_POST['produto'];
$valor = $_POST['valor'];
$fornecedor = $_POST['fornecedor'];
$temp_entrega = $_POST['temp_entrega'];
$id = $_POST['id'];

$sql = "UPDATE `orcamento` SET  `produto`='$produto' , `valor`= '$valor', `fornecedor`='$fornecedor',  `temp_entrega`='$temp_entrega' WHERE id='$id' ";
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