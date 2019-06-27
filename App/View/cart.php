<?php include 'topo.php' ?>

<title>Carrinho</title>

<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Subtotal</th>
            <th>Imposto</th>
            <th></th>
        </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="4"></td>
                <td><b>Total R$ <?php echo number_format($cartTotal, 2, ',', '.')?></b></td>
                <td><b>Imposto R$ <?php echo number_format($cartTax, 2, ',', '.')?></b></td>
                <td>
                <a href="index.php?page=cart" class="btn btn-success" role="button">Finalizar compra</a>
                </td>
                <td></td>
            </tr>
        </tfoot>
        <tbody>
        <?php $i = 1?>
        <?php foreach ($cartItems as $item) : ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $item->getProduct()->getName()?></td>
                <td>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <form action="index.php?page=cart&action=update" method="post">
                        <input class="form-control" name="id" type="hidden" value="<?php echo $item->getProduct()->getId()?>" />
                        <button class="btn btn-outline-secondary" name="quantity" style="max-height:45px; max-width:45px;" value="<?php echo $item->getQuantity()-1?>">
                        <i class="fas fa-minus"></i>
                        </button>
                        </form>
                    </div>
                    <form action="index.php?page=cart&action=update" method="post">
                    <input class="form-control" name="id" type="hidden" value="<?php echo $item->getProduct()->getId()?>" />
                    <input type="text" class="form-control" name="quantity" style="max-height:45px; max-width:45px" value="<?php echo $item->getQuantity()?>" >
                    </form>
                    <div class="input-group-append">
                        <form action="index.php?page=cart&action=update" method="post">
                        <input class="form-control" name="id" type="hidden" value="<?php echo $item->getProduct()->getId()?>" />
                        <button class="btn btn-outline-secondary" name="quantity" style="max-height:45px; max-width:45px;" value="<?php echo $item->getQuantity()+1?>"> 
                        <i class="fas fa-plus"></i>
                        </button>
                        </form>
                    </div>
                    </div>

                </td>
                <td>R$ <?php echo number_format($item->getProduct()->getPrice(), 2, ',', '.')?></td>
                <td>R$ <?php echo number_format($item->getSubTotal(), 2, ',', '.')?></td>
                <td>R$ <?php echo number_format($item->getTax(), 2, ',', '.')?></td>
                <td>
                    <a href="index.php?page=cart&action=delete&id=<?php echo $item->getProduct()->getId()?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php $i++ ?>
        <?php endforeach;?>
        </tbody>
    </table>
</div>

</body>
</html>
