<?php include 'topo.php' ?>

<nav class="navbar navbar-expand-lg navbar-light"  style="background-color: #0091ED;">
    <form class="form-inline">
        <div style="margin:10px;">
            <button class="btn btn-sm btn-light" type="button" data-toggle="collapse" data-target='#todos' aria-expanded="false" aria-controls='tipo'>Todos</button>
        </div>
        <?php foreach ($types as $type) : ?>

            <div style="margin:10px;">
                <button class="btn btn-sm btn-light" type='button' data-toggle="collapse" data-target="#tipo<?php echo $type->getType()?>" aria-expanded="false" aria-controls="tipo<?php echo $type->getType()?>"><?php echo $type->getType()?></button>
            </div>
    
        <?php endforeach?>

    </form>

</nav>

<?php if ($cartTotal > 0):  include 'nav.php' ?>
<?php endif ?>

<title>Home</title>

<div class="container mt-3">
    <div class="row">
        <div class="card-deck">
            <?php foreach ($products as $product) : ?>
                <div class="collapse show" id="todos">
                    <?php  include 'product_card.php' ?>
                </div>
                <?php foreach ($types as $type) : ?>
                    <div class="collapse" id="tipo<?php echo $type->getType()?>">
                        <?php if ($product->getType() == $type->getType() ) : include 'product_card.php' ?>
                        <?php endif ?>
                    </div>
                <?php endforeach?>
            <?php endforeach?>
        </div>
    </div>
</div>

<script type="text/javascript">

jQuery('button').click( function(e) {
    jQuery('.collapse').collapse('hide');
});

</script>
</body>
</html>

