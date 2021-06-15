<?php

require 'db.php';
$id = $_GET['id'];
$sql = "SELECT * FROM clientes WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt -> execute([':id' => $id]);
$person = $stmt -> fetch(PDO::FETCH_OBJ);

if(!empty($_POST)){
    try{

        $sql = "UPDATE clientes SET nome = :nome,
                                    sobrenome = :sobrenome,
                                    cep = :cep,
                                    cidade = :cidade,
                                    estado = :estado,
                                    rua = :rua,
                                    numero = :numero,
                                    bairro = :bairro,
                                    complemento = :complemento  WHERE id = $id ";
        $stmt = $pdo->prepare($sql);
        $dados = array(
            ':nome' => $_POST['nome'],
            ':sobrenome' => $_POST['sobrenome'],
            ':cep' => $_POST['cep'],
            ':cidade' => $_POST['cidade'],
            ':estado' => $_POST['uf'],
            ':rua' => $_POST['rua'],
            ':numero' => $_POST['numero'],
            ':bairro' => $_POST['bairro'],
            ':complemento' => $_POST['complemento'],
        );
        if($stmt->execute($dados)){
            header("location: home.php") ;
        }
    }
    catch (PDOException $e){ 

    }
}


    


?>

<?php require 'header.php';?>

<div class="row container">
    <div class="col s12 m12 l12 mt-2"> 
        <div class="card">
            <div class="card-content">
            <span class="card-title blue-text"><h4>Editar Cliente</h4></span>
                <form action="" method="post">
                <div class="row">
                <div class= "input-field col l6">
                    <label for=nome>Nome*</label>
                    <input required value="<?= $person->nome;?>" type="text" name="nome" id="nome" class="validate">
                </div>
                <div class= "input-field col l6">
                    <label for=sobrenome>Sobrenome*</label>
                    <input required value="<?= $person->sobrenome;?>" type="text" name="sobrenome" id="sobrenome" class="validate">
                </div>
                </div>
                <div class="row">
                <div class="input-field col l4">
                    <label for=cep>cep*</label>
                    <input required value="<?= $person->cep;?>" type="text" maxlength="9" name="cep" id="cep" class="validate">
                </div>
                <div class="input-field col l4">
                    <label for=cidade>Cidade*</label>
                    <input readonly required value="<?= $person->cidade;?>"type="text" name="cidade" id="cidade" class="validate">
                </div>
                <div class="input-field col l4">
                    <label read only for=uf>Estado*</label>
                    <input readonly required value="<?= $person->estado;?>"type="text" name="uf" id="uf" class="validate">
                </div>
                </div>
                <div class="row">
                <div class="input-field col l6">
                    <label for=rua>Logradouro*</label>
                    <input required value="<?= $person->rua;?>"type="text" name="rua" id="rua" class="validate">
                </div>
                <div class="input-field col l1">
                    <label for=numero>Nº*</label>
                    <input required value="<?= $person->numero;?>" type="text" name="numero" id="numero" class="validate">
                </div>
                <div class="input-field col l5">
                    <label for=bairro>Bairro*</label>
                    <input required value="<?= $person->bairro;?>" type="text" name="bairro" id="bairro" class="validate">
                </div>
                </div>
                <div clas='row'>
                <div class="input-field col l12">
                    <label for=complemento>Complemento*</label>
                    <input value="<?= $person->complemento;?>" type="text" name="complemento" id="complemento" class="validate">
                </div>
                </div>

               <!-- Botões -->
                <div class="row">
                <button class="btn blue waves-effect waves-light" type="submit">Editar
                <i class="material-icons right">edit</i>
                </button>
                <a href="./home.php" class="btn waves-effect waves-light red">Voltar</a>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php require 'footer.php';?>



