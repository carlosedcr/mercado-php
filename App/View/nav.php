<nav class="navbar navbar-light bg-light" style="max-height:120px; overflow-y:scroll;" >
    <ul class="nav navbar-nav navbar-center" style="margin-left:auto; margin-right: auto;">
    <table >
    <thead >
        <tr>
            <th></th>
            <th >Id</th>
            <th></th>
            <th>Produto</th>
            <th><th><th></th></th></th>
            <th>Quantidade</th>
            <th><th><th></th></th></th>
            <th>Preço</th>
            <th><th><th></th></th></th>
            <th>Subtotal</th>
            <th><th><th></th></th></th>
            <th>Imposto</th>
            <th></th>
            <a href="index.php?page=cart" class="btn btn-sm btn-success" role="button">Finalizar compra</a>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="20"></td>
            <td><b>Total R$ <?php echo number_format($cartTotal, 2, ',', '.')?></b></td>
            <td><b>Imposto R$ <?php echo number_format($cartTax, 2, ',', '.')?></b></td>
            <td></td>
        </tr>
    </tfoot>
    <tbody>
        <?php $i = 1?>
        <?php foreach ($cartItems as $item) : ?>
            <tr>
                <td>
                    <a href="index.php?page=cart&action=deleteAlt&id=<?php echo $item->getProduct()->getId()?>" class="btn btn-link" style='color:red;'>
                    <i class="far fa-trash-alt"></i>
                    </a>
                </td>
                <td ><?php echo $i;?></td>
                <td></td>
                <td ><?php echo $item->getProduct()->getName()?></td>
                <td><td><td></td></td></td>
                <td ><?php echo $item->getQuantity()?></td>
                <td><td><td></td></td></td>
                <td>R$ <?php echo number_format($item->getProduct()->getPrice(), 2, ',', '.')?></td>
                <td><td><td></td></td></td>
                <td>R$ <?php echo number_format($item->getSubTotal(), 2, ',', '.')?></td>
                <td><td><td></td></td></td>
                <td>R$ <?php echo number_format($item->getTax(), 2, ',', '.')?></td>
            </tr>
        <?php $i++ ?>
        <?php endforeach;?>
    </tbody>
    </table>
    </ul>
</nav>


