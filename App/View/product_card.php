
<div class="card mb-4" style="min-width: 12rem; max-width: 12rem;">
    <?php if ($product->getImage() == false) : ?>
        <img class="card-img-top" src="https://placehold.it/280x140/abc" alt="Card image cap">
    <?php elseif($product->getImage() == true) : ?>
        <img class="card-img-top" src="app/assets/imagens/imageid<?php echo $product->getId();?>.jpg" alt="Card image cap">
    <?php endif; ?>
    <div class="card-body">
        <h6 class="card-title"><?php echo $product->getName();?></h6>
        <p class="card-text">R$ <?php echo number_format($product->getPrice(), 2, ',', '.')?></p>
        <p class="card-text"><small class="text-muted"></small></p>
        <form action="index.php?page=cart&action=add" method="post">    
            <input type="hidden" name="id" value="<?php echo $product->getId()?>"/>
            <button type="submit" class="btn btn-primary btn-sm btn-block">Adicionar
            <i class="fas fa-shopping-cart"></i>
            </button>
        </form>
    </div>
</div>
