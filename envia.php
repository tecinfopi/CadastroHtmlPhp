<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recebe Dados</title>
</head>
<body>

<?php

$conexao = mysqli_connect ("localhost","root","","teste");
//CHECAR CONEXAO
if(!conexao){
echo "NÃO CONECTADO...";
}
echo"CONECTADO AO BANCO>>>>>>";

// RECUPERAR E VERIFICAR JÁ EXITTE
$cpf = $_POST['cpf'];
$cpf = mysqli_real_escape_string($conexao, $cpf);

$sql = "Select cpf from teste.dados WHERE CPF='$cpf'";
$retorno = mysqli_query($conexao,$sql);

if(mysqli_num_rows($retorno)>0){
    echo"CPF JÁ CADASTRADO!<br>";
    echo"<a href='cadastro.html'>VOLTAR</a>";
}else{

    $cpf = $_POST['cpf'];
    $idade = $_POST['idade'];
    $nome = $_POST['nome'];

    $sql = "INSERT INFO teste.dados(cpf,idade,nome) values('$cpf','$idade','$nome')";
    $resultado = mysqli_query($conexao,$sql);
    echo">USUÁRIO CADASDTRADO COM SUCESSO!<BR>";
    echo"<a href='cadastro.html'>VOLTAR</a>";
}

?>
</body>
</html>