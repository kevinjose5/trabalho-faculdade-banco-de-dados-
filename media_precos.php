<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MEDIA PREÇO MATERIAIS</title>
<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&family=Reddit+Mono:wght@200..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


</head>
<body>
<div class="caixa"> <a href="index.html"><i class="bi bi-house"></i> tela de inicio</a></div>

<!-- inicio do cabeçalho -->
<header>
    <div class="">
        <h1 id="titulopag">media de preço</h1>
    </div>
    <div class="caixa" id="titulo">
    <h1 class="secaousando">Consulta</h1>
    
    </div>


</header>
<!-- fim do cabeçalho -->
<section id="secaoformulario">

    

    <!-- parte do comando responsavel pela coleta das informações das notas  -->

        
    <form  method="post" action="">
        <table>
            <div id="formulario">
                <!-- <tr>
                    <td>GERAL</td>
                    <td><input  name="pesquisar" id="pesquisar" ></td>
                </tr> -->
                <tr>
                    <td>material</td>
                    <td><input  name="material_media_preco" id="material_media_preco" ></td>
                </tr>
            </div>
            <!-- botão -->
            <tr>
                <td><input class="botaoin" type="submit" value="buscar" name="busca" id="busca"></td>
            </tr>

        </table>
    </form>

</section>
<?php 
        include("conecta.inc");
        
        if(isset($_POST['busca'])){
    // $pesquisa=$con->real_escape_string($_POST['pesquisar']);

    $obr=$_POST['material_media_preco'];
 
   
//SELECIONADOR DE CODIGO


if($obr== null ){
    $obr="";
}   

// "SELECT nfiscal.idnota, nfiscal.obra, nfiscal.chave, nfiscal.notafiscal, FORMAT(SUM(material.total),2 ) as valort 
// FROM material INNER JOIN nfiscal on (nfiscal.idnota=material.idnota) 
//  WHERE nfiscal.obra LIKE '$obr%'
//  GROUP BY nfiscal.idnota, nfiscal.obra ";


$sql_code ="SELECT material.descricao AS OBR, FORMAT(AVG(material.total),2) as total FROM material GROUP BY material.descricao ";



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
             <td><?php echo("OBRA"); ?></td>
             <td><?php echo ("TOTAL"); ?></td>

         </tr>
         <?php
        
        while($dados = $sql_query->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $dados['OBR']; ?></td>
                <td><?php echo $dados['total']; ?></td>
           
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




</body>
</html>