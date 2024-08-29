<?php

include('conecao.php');

try {
    // Cria uma nova instância do PDO
    
    // Define o modo de erro do PDO para exceções

    // Dados a serem inseridos
    $nf = $_POST['NF'];
    $chave = $_POST['chave'];
    $obra = $_POST['obra'];
    setcookie("nota",$nf,time()+3000);
    setcookie("chave",$chave,time()+3000);
    setcookie("obra",$obra,time()+3000);
    

    // Prepara a consulta SQL
    $sql = "INSERT INTO nfiscal (notafiscal,chave,obra) VALUES (:notafiscal,:chave,:obra)";
    $stmt = $pdo->prepare($sql);

    // Bind dos parâmetros
    $stmt->bindParam(':notafiscal', $nf);
    $stmt->bindParam(':chave', $chave);
    $stmt->bindParam(':obra',$obra);

    // Executa a consulta
    $res=$stmt->execute();



    setcookie("rest",0,time()+3000);
    header("location:cadastro_material.html");


    
} catch (PDOException $e) {
    // Captura e exibe erros
    echo "Erro: m" . $e->getMessage();

}

// Fecha a conexão
$pdo = null;
?>