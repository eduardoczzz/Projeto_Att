<?php include('../banco/config.php');

$output= array();
$sql = "SELECT * FROM estoque ";

$totalQuery = mysqli_query($conexao,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id',
	1 => 'produto',
	2 => 'quantidade',
	3 => 'fornecedor',
	4 => 'nota_fical',
    5 => 'estado_uso',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE produto like '%".$search_value."%'";
	$sql .= " OR quantidade like '%".$search_value."%'";
	$sql .= " OR fornecedor like '%".$search_value."%'";
	$sql .= " OR nota_fiscal like '%".$search_value."%'";
    $sql .= " OR estado_uso like '%".$search_value."%'";

}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($conexao,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['id'];
	$sub_array[] = $row['produto'];
	$sub_array[] = $row['quantidade'];
	$sub_array[] = $row['fornecedor'];
	$sub_array[] = $row['nota_fiscal'];
    $sub_array[] = $row['estado_uso'];
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-info btn-sm editbtn" >Editar</a>  <a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-danger btn-sm deleteBtn" >Deletar</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
