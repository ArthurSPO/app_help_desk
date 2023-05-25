<?php

    session_start();

    
    $titulo = str_replace('#','-',$_POST['titulo']);
    $categoria = str_replace('#','-',$_POST['categoria']);
    $descricao = str_replace('#','-',$_POST['descricao']);
    

    $texto = $_SESSION['id']. '#' .$titulo.'#'.$categoria.'#'.$descricao.PHP_EOL;
    
    //Open to write
    $arquivo = fopen('../../app_help_desk/arquivo.hd','a');

    fwrite($arquivo,$texto);

    fclose($arquivo);

    //refresh
    header('Location: abrir_chamado.php')
?>