<?php require'db.php';
$sql = 'SELECT * FROM clientes';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$clientes = $stmt->fetchAll(PDO::FETCH_OBJ)
?>
<?php require'header.php'; ?>
<!-- Lista de Clientes -->
<div class="row">
  <div class="col l12">
  <a href="./create.php" class="btn modal-trigger green waves-effect waves-light ">Adicionar Cliente</a>
  <div class="card">
      <div class="card-content">
        <span class="card-title"><h4>Lista de Clientes</h4></span>
        <div class='row'>
        <div class= 'col l12 m12 s12'>
        <table class="highlight responsive">
          <tr>
            <th class="hide">Id</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>cep</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>rua</th>
            <th>Nº</th>
            <th>Bairro</th>
            <th>Complemento</th>
            <th>Ações</th>
          </tr>
          <?php foreach($clientes as $person): ?>
          <tr>
            <td class="hide"><?= $person->id;?></td>
            <td><?= $person->nome;?></td>
            <td><?=$person->sobrenome;?></td>
            <td><?=$person->cep;?></td>
            <td><?=$person->cidade;?></td>
            <td><?=$person->estado;?></td>
            <td><?=$person->rua;?></td>
            <td><?=$person->numero;?></td>
            <td><?=$person->bairro;?></td>
            <td><?=$person->complemento;?></td>
            <!-- Botôes de Ação -->
            <td>
              <a href="./edit.php?id=<?= $person->id;?>"  class="edit btn waves-effect waves-light blue left">
              <i class="material-icons">edit</i></a>
              <a onclick="return confirm('Você tem certeza que deseja excluir essa entrada?')" href="./delete.php?id=<?= $person->id;?>" class="btn waves-effect  waves-light red left ">
              <i class="material-icons">delete</i></a>
            </td>
          </tr>
          <?php endforeach;?>
        </table>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require'footer.php'; ?>
