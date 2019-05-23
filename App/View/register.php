<?php include 'topo.php' ?>

<title>Cadastro</title>

<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Produto</th>
        <th>Tipo</th>
        <th>Preço</th>
        <th>Alíquota (%)</th>
        <th>Ação</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <br>
    <p>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#adicionar" aria-expanded="false" aria-controls="adicionar">
      Adicionar produto
    </button>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#addtipo" aria-expanded="false" aria-controls="addtipo">Adicionar tipo</button>
    <div class="collapse" id="addtipo">
      <form action="index.php?page=register&action=addType" method="post">
      <input type="text" class="form-control mr-sm" name="type" placeholder='Tipo' value=''>
      <p></p>
      <button type="submit" class="btn btn-success btn-xs">Salvar</button>
      </form>
    </div>
    </p>
    <form action="index.php?page=register&action=add" method="post">
    <tr class="collapse" id="adicionar">
      <td>Id</td>
      <td>
        <div class="form-group">
          <input type="text" class="form-control" name="name" placeholder='Produto' value=''>
        </div>
      </td>
      <td>
        <div class="form-group">
          <select class="custom-select" name='type'>
            <option selected>Selecione o tipo</option>
            <?php foreach ($types as $type ) : ?>
              <option value="<?php echo $type->getType() ?>"><?php echo $type->getType() ?></option>
            <?php endforeach?>
          </select>
        </div>
      </td>
      <td>
        <div class="form-group">
          <input type="int" class="form-control" name="price" placeholder="Preço" value=''>
        </div>
      </td>
      <td>
        <div class="form-group">
          <input type="int" class="form-control" name="tax" placeholder="Alíquota" value=''>
        </div>
      </td>
      <td>
        <button type="submit" class="btn btn-success btn-xs">Adicionar</button>
      </td>
    </tr>
    </form>
</div>
    <?php $i = 1?>
    <?php foreach ($products as $product) : ?>
      <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $product->getName();?>
        <div class="collapse" id="editar<?php echo $product->getId()?>">
          <form action="index.php?page=register&action=edit" method="post">
          <input name="id" type="hidden" value="<?php echo $product->getId()?>" />
          <input type="text" name="name" class="form-control" value="<?php echo $product->getName()?>"/>
        </div>
      </td>
      <td><?php echo $product->getType();?>
        <div class="collapse" id="editar<?php echo $product->getId()?>">
          <input name="id" type="hidden" value="<?php echo $product->getId()?>" />
          <input type="text" name="type" class="form-control mr-sm-2" value="<?php echo $product->getType()?>"/>
        </div>
      </td>
      <td>R$ <?php echo number_format($product->getPrice(), 2, ',', '.')?>
        <div class="collapse" id="editar<?php echo $product->getId()?>">
          <input name="id" type="hidden" value="<?php echo $product->getId()?>" />
          <input type="text" name="price" class="form-control mr-sm-2" value="<?php echo $product->getPrice()?>"/>
        </div>
      </td>
      <td><?php echo $product->getTax();?>
        <div class="collapse" id="editar<?php echo $product->getId()?>">
          <input name="id" type="hidden" value="<?php echo $product->getId()?>" />
          <input type="text" name="tax" class="form-control mr-sm" value="<?php echo $product->getTax()?>"/>
          <br>
          <button type="submit" class="btn btn-success btn-xs">Salvar</button>
        </div>
        <br>
        </form>
      </div>
        </form>
      </td>
      <td>
      <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#editar<?php echo $product->getId()?>" aria-expanded="false" aria-controls="editar<?php echo $product->getId()?>">
        Editar
      </button>
        <a href="index.php?page=register&action=delete&id=<?php echo $product->getId()?>" class="btn btn-danger btn-sm">Excluir</a>
      </td>
      <td>
        <form method='post' action="index.php?page=register&action=addImage" enctype='multipart/form-data'>
        <input type="hidden" name="id" value="<?php echo $product->getId()?>"/>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" name='pic' class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Imagem</label>
          </div>
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="inputGroupFile01">Enviar</button>
          </div>
        </div>
        </form>
       </td>
      </tr>
      <?php $i++ ?>
    <?php endforeach?>
  </tbody>
</table>
</div>

</body>
</html>