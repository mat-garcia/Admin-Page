<?php

require 'db.php';
if(!empty($_POST)){
    try{

        $sql = "INSERT INTO clientes (nome, sobrenome, cep, cidade, estado, rua, numero, bairro, complemento) VALUES (:nome, :sobrenome, :cep, :cidade, :estado, :rua, :numero, :bairro, :complemento)";
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
         header('location: index.php');
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
            <span class="card-title gree-text"><h4>Adicionar Cliente</h4></span>
                <form action="" method="post">
                <div class="row">
                <div class= "input-field col l6">
                    <label for=nome>Nome*</label>
                    <input required placeholder="ex: João Inácio" type="text" name="nome" id="nome" class="validate">
                </div>
                <div class= "input-field col l6">
                    <label for=sobrenome>Sobrenome*</label>
                    <input required placeholder="Freitas" type="text" name="sobrenome" id="sobrenome" class="validate">
                </div>
                </div>
                <div class="row">
                <div class="input-field col l4">
                    <label for=cep>cep*</label>
                    <input required placeholder="Apenas numeros" type="text" maxlength="9" name="cep" id="cep" class="validate">
                </div>
                <div class="input-field col l4">
                    <label for=cidade>Cidade*</label>
                    <input readonly placeholder=""value=""type="text" name="cidade" id="cidade" class="validate">
                </div>
                <div class="input-field col l4">
                    <label for=uf>Estado*</label>
                    <input readonly placeholder="" value=""type="text" name="uf" id="uf" class="validate">
                </div>
                </div>
                <div class="row">
                <div class="input-field col l6">
                    <label for=rua>Logradouro*</label>
                    <input required value=""type="text" name="rua" id="rua" class="validate">
                </div>
                <div class="input-field col l1">
                    <label for=numero>Nº*</label>
                    <input required value="" type="text" name="numero" id="numero" class="validate">
                </div>
                <div class="input-field col l5">
                    <label for=bairro>Bairro*</label>
                    <input required value="" type="text" name="bairro" id="bairro" class="validate">
                </div>
                </div>
                <div clas='row'>
                <div class="input-field col l12">
                    <label for=complemento>Complemento*</label>
                    <input type="text" name="complemento" id="complemento" class="validate">
                </div>
                </div>

               
                <div class="row">
                <button class="btn waves-effect waves-light" type="submit">Adicionar
                <i class="material-icons right">add</i></button>
                <a href="./index.php" class="btn waves-effect waves-light red">Voltar</a>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php';?>