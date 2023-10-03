<?php

include "conexao.php";
$dados = $conn -> query("SELECT * FROM usuario");



$rm = $_POST['rm'];
$nome = $_POST['nome'];
$dtnasc = $_POST['dtnasc'];
$email = $_POST['email'];
$tipo = $_POST['tipo'];
$senha = $_POST['senha'];
$pasta = "img/";
$avatar = $_FILES['avatar'] ['name'];
$ext = strtolower(pathinfo($avatar, PATHINFO_EXTENSION));
$avatarf = $rm . '.' . $ext;
$avatarbd = $pasta . $avatarf;



$testar_rm = $conn->query("SELECT * FROM usuario WHERE rm = '$rm' ");
$check_rm = mysqli_num_rows($testar_rm);

$testar_email = $conn->query("SELECT * FROM usuario WHERE email = '$email' ");
$check_email = mysqli_num_rows($testar_email);




if ($check_rm >= 1 && $check_email >=1 ) {
    echo "EMAIL e RM já cadastrados";
}


elseif ($check_rm >= 1) {
    echo "RM já cadastrado";
}

elseif ($check_email >=1 ) {
    echo "EMAIL já cadastrado";
}

else{
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $pasta . $avatarf)){

    }else {
        $result_message = "Não foi possivel concluir o upload da imagem";
    }
    $conn -> query("INSERT INTO usuario (id, rm, nome, avatar, dtnasc, email, tipo, senha)
    VALUES (NULL, '$rm', '$nome', '$avatarbd', '$dtnasc', '$email', '$tipo', '$senha')");

    echo"seus dados foram salvos com sucesso";
    header("refresh:3;url=salvar_select.php");
}


/*$busca_rm = $conn -> query("SELECT * FROM usuario WHERE rm = '$rm'");
$busca_email = $conn -> query("SELECT * FROM usuario WHERE email= '$email'");



if ($busca_rm -> num_rows === 0 && $busca_email -> num_rows === 0){
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $pasta . $avatarf)){

    }else {
        $result_message = "Não foi possivel concluir o upload da imagem";
    }
    $conn -> query("INSERT INTO usuario (id, rm, nome, avatar, dtnasc, email, tipo, senha)
    VALUES (NULL, '$rm', '$nome', '$avatarbd', '$dtnasc', '$email', '$tipo', '$senha')");
    echo"seus dados foram salvos com sucesso";
    header("refresh:3;url=form.html");
} 
else if($busca_rm -> num_rows === 0 && $busca_email -> num_rows > 0){
    echo"Email ja utilizado, tente novamente";
    header("refresh:3;url=form.html");
    
}

else if($busca_rm -> num_rows > 0 && $busca_email -> num_rows === 0){
    echo"RM ja utilizado, tente novamente";
    header("refresh:3;url=form.html");
    
}

else if($busca_rm -> num_rows > 0 && $busca_email -> num_rows > 0){
    echo"RM e EMAIL ja utilizados, tente novamente";
    header("refresh:3;url=form.html");
    
}
*/








?>



