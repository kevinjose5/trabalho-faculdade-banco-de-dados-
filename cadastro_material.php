<?php
include('conecao.php');

$obra=$_COOKIE["obra"];
$nota=$_COOKIE["nota"];
$chave=$_COOKIE["chave"];

$material=$_POST['material'];
$unidade=$_POST['unidadematerial'];
$valorunidade=$_POST['valor_unitario_material'];
$valortotal=$unidade*$valorunidade;

$res=0;

if(isset($_COOKIE['rest'])){
    $res=$_COOKIE['rest'];
}

$idn;

try {
$sql="INSERT INTO material (descricao,unitario,valorunitario,total,idnota) VALUES (:descricao,:unitario,:valorunitario,:total,:idnota)";
$consulta_id="SELECT idnota FROM nfiscal WHERE chave='$chave'";

$conid=$pdo->prepare($consulta_id);
$stmt=$pdo->prepare($sql);

$conid->execute();

$resultado=$conid->fetch(PDO::FETCH_ASSOC);

if($resultado){
    $idn=$resultado['idnota'];
}




echo($idn);


$stmt->bindParam(':descricao',$material);
$stmt->bindParam(':unitario',$unidade);
$stmt->bindParam(':valorunitario',$valorunidade);
$stmt->bindParam(':total',$valortotal);
$stmt->bindParam(':idnota',$idn);

$res++;

setcookie("rest",$res,time()+3000);
$stmt->execute();





header("location:cadastro_material.html");

}catch (PDOException $e) {
    // Captura e exibe erros
    echo "Erro: m" . $e->getMessage();

}






?>