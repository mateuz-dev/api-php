<?php

    # I M P O R T A Ç Ã O   D O   A R Q U I V O   DE   C O N E X Ã O
    include('connection.php');


    # F U N Ç Ã O   D E   L E I T U R A
    # ~ s e m   c r i t é r i o

    function read($connection){
        $sql = 'SELECT * FROM tbl_pessoa';

        if ($resultado = mysqli_query($connection, $sql)) {
            $dados = mysqli_fetch_all($resultado);
            echo json_encode(array("status"=>"sucess", "data"=>$dados));
        } else{
            echo json_encode(array("status"=>"error", "data"=>mysqli_error($connection)));
        }
    }


    # ~ c o m   c r i t é r i o
    function readId($cod_pessoa, $connection){
        $sql = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = $cod_pessoa";
        
        if ($resultado = mysqli_query($connection, $sql)) {
            $dados = mysqli_fetch_all($resultado);
            echo json_encode(array("status"=>"sucess", "data"=>$dados));
        } else{
            echo json_encode(array("status"=>"error", "data"=>mysqli_error($connection)));
        }
    }


    # F U N Ç Ã O   D E   I N S E R Ç Ã O
    function create($nome, $sobrenome, $email, $celular, $fotografia, $connection){
        $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular, fotografia)
                VALUES ('$nome', '$sobrenome', '$email', '$celular', '$fotografia')";
        
        if (mysqli_query($connection, $sql)){
            echo json_encode(array("status"=>"success", "data"=>"Dados inseridos com sucesso"));
        } else{
            echo json_encode(array("status"=>"error", "data"=>"Erro ao inserir os dados"));
        }
    }


    # F U N Ç Ã O   D E   A T U A L I Z A Ç Ã O
    function update($cod_pessoa, $nome, $sobrenome, $email, $celular, $fotografia, $connection){
        $sql = "UPDATE tbl_pessoa SET nome = '$nome',
                sobrenome = '$sobrenome',
                email = '$email',
                celular = '$celular',
                fotografia = '$fotografia'
                WHERE cod_pessoa = $cod_pessoa";
        
        if (mysqli_query($connection, $sql)){
            echo json_encode(array("status"=>"success", "data"=>"Dados alterados com sucesso"));
        } else{
            echo json_encode(array("status"=>"error", "data"=>"Erro ao alterar os dados"));
        }
    }


    # F U N Ç Ã O   D E   E X C L U S Ã O
    function delete($cod_pessoa, $connection){
        $sql = "DELETE FROM tbl_pessoa WHERE cod_pessoa = $cod_pessoa";

        if (mysqli_query($connection, $sql)){
            echo json_encode(array("status"=>"success", "data"=>"Dados excluidos com sucesso"));
        } else{
            echo json_encode(array("status"=>"error", "data"=>"Erro ao excluir os dados"));
        }
    }

?>