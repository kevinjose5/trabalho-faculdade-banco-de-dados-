<?PHP
// conecta com o banco de dados $con é a conexão
// NOME DA TABELA É notasfiscais

include("conecta.inc");

// conexão de busca
?>



<!-- ESQUEMA DA PAGINA  -->


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CONTROLE DE MATERIAIS</title>
<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&family=Reddit+Mono:wght@200..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
<!-- inicio do cabeçalho -->
<header>
<div class="caixa"> <a href="index.html"><i class="bi bi-house"></i> tela de inicio</a></div>
    <div class="">
        <h1 id="titulopag">CONSULTA</h1>
    </div>

   
    


</header>
<!-- fim do cabeçalho -->
<section id="secaoformulario">

    

    <!-- parte do comando responsavel pela coleta das informações das notas  -->

        
    <form  method="post" action="consulta_nota.php">
        <table>
            <div id="formulario">
                <!-- <tr>
                    <td>GERAL</td>
                    <td><input  name="pesquisar" id="pesquisar" ></td>
                </tr> -->
                <tr>
                    <td>NOTA FISCAL</td>
                    <td><input  name="NF" id="NF" ></td>
                </tr>
                <tr>
                    <td>Chave de acesso</td>
                    <td><input  name="chave" id="chave" ></td>
                </tr>

                <tr>
                    <td>Obra</td>
                    <td><input  name="obra" id="obra" ></td>
                </tr>



            </div>
            <!-- botão -->
            <tr>
                <td><input class="botaoin" type="submit" value="buscar" name="busca" id="busca"></td>
            </tr>

        </table>









    </form>

</section>





</body>
</html>


<?php
if(isset($_POST['busca'])){
    // $pesquisa=$con->real_escape_string($_POST['pesquisar']);
    $NF=$_POST['NF'];
    $chavexml=$_POST['chave'];
    $obr=$_POST['obra'];
 
   
//SELECIONADOR DE CODIGO


if($NF== null ){
    $NF="";
}
if($chavexml== null ){
    $chavexml="";

}

if($obr== null ){
    $obr="";
}   




$sql_code ="SELECT nfiscal.idnota, nfiscal.obra, nfiscal.chave, nfiscal.notafiscal, FORMAT(SUM(material.total),2 ) as valort 
FROM material INNER JOIN nfiscal on (nfiscal.idnota=material.idnota) 
 WHERE nfiscal.notafiscal LIKE '$NF%'
 AND nfiscal.chave LIKE '$chavexml%'
 AND nfiscal.obra LIKE '$obr%'
 GROUP BY nfiscal.idnota, nfiscal.obra ";




// executa o codigo
    $sql_query = $con->query($sql_code)or die("erro ao consultar". $con->error);






    if ($sql_query->num_rows == 0) {
        ?>
    <tr>
        <td colspan="3">Nenhum resultado encontrado...</td>
    </tr>


    <?php
    }else{
    ?>

    <!-- CRIAÇÃO DA TAELA  -->

        <table width="600px" border="1PX" >
    <?PHP
         ?>
         <tr>
             <td><?php echo("identificador"); ?></td>
             <td><?php echo ("NF"); ?></td>
             <td><?php echo("XML"); ?></td>
             <td><?php echo("OBRA"); ?></td>
             <td><?php echo("VALOR TOTAL"); ?></td>
         </tr>
         <?php
        
        while($dados = $sql_query->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $dados['idnota']; ?></td>
                <td><?php echo $dados['notafiscal']; ?></td>
                <td><?php echo $dados['chave']; ?></td>
                <td><?php echo $dados['obra']; ?></td>
                <td><?php echo $dados['valort']; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
        
        <?php

    }



}

mysqli_close($con);







?>