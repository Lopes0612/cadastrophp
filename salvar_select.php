<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table{
            width: 100%;
            border: 1px solid black;
        }

        td{
            border: 1px solid black;
        }
        img{
            height: 90px;
            width: 90px;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <td>AVATAR </td>
        <td> RM </td>
        <td> NOME </td>
        <td> EMAIL </td>
        <td> SENHA </td>
        <td> TIPO </td>
        <td> DTNASC </td>
        <td colspan="2"> ACAO </td>

    </tr>
    


    <?php

    include "conexao.php";

    $dados = $conn -> query("SELECT * FROM usuario");



    while($linha = $dados -> fetch_assoc()){
        $rm = htmlspecialchars($linha['rm']);
        $nome = $linha['nome'];
        $avatarbd = $linha['avatar'];
        $email = $linha['email'];
        $senha = $linha['senha'];
        $tipo = $linha['tipo'];
        $dtnasc = $linha['dtnasc'];
        


        echo "<tr>
            <td> <img src = $avatarbd > </td>
            <td> $rm </td>
            <td> $nome </td>
            <td> $email </td>
            <td> $senha </td>
            <td> $tipo </td>
            <td> $dtnasc </td>
            <td> Excluir </td>
            <td> Alterar </td>

           
            
        
        
        </tr>
        ";

    }


/* while ($linha = mysqli_fetch_array($dados)){
    $rm = $linha ['rm'];
    
    echo "RM: ". $rm . " <br>";

} */

    ?>
</table>

    
</body>
</html>




