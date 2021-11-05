<?php

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');
    header('Access-Control-Allow-Methods: GET. POST');
    header('Content-Type: applicatoin/json');

    include('connection.php');
    include('crud.php');


    # RECUPERANDO O TIPO DE AÇÃO DA REQUISIÇÃO
    $acao = $_REQUEST['acao'];


    # C R I A Ç Ã O   D A S   R O T A S

        # R O T A   D O   R E A D
        # ~ s e m   c r i t é r i o 
        if($acao == 'read') {
            read($connection);
        }

        # ~ c o m   c r i t é r i o
        if($acao == 'readId'){
            $cod_pessoa = $_REQUEST['cod_pessoa'];
            readId($cod_pessoa, $connection);
        }

        
        # R O T A   D O   C R E A T E
        if($acao == 'create') {
            $nome = $_REQUEST['nome'];
            $sobrenome = $_REQUEST['sobrenome'];
            $email = $_REQUEST['email'];
            $celular = $_REQUEST['celular'];
            $fotografia = $_REQUEST['fotografia'];

            create($nome, $sobrenome, $email, $celular, $fotografia, $connection);
        }


        # R O T A   D O   U P D A T E
        if($acao == 'update') {
            $cod_pessoa = $_REQUEST['cod_pessoa'];
            $nome = $_REQUEST['nome'];
            $sobrenome = $_REQUEST['sobrenome'];
            $email = $_REQUEST['email'];
            $celular = $_REQUEST['celular'];
            $fotografia = $_REQUEST['fotografia'];

            update($cod_pessoa, $nome, $sobrenome, $email, $celular, $fotografia, $connection);
        }


        # R O T A   D O   D E L E T E
        if($acao == 'delete'){
            $cod_pessoa = $_REQUEST['cod_pessoa'];
            delete($cod_pessoa, $connection);
        }

?>