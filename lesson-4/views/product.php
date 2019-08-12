<?php
/**
 * @var $item
 */
?>
<div class="container">
  <h1 class="text-center mt-5 mb-5"><?= $item->name ?></h1>
<div class="row">
  <div class="col-md-6">
    <img style="width: 400px" src="uploads/<?= $item->img ?>" alt="<?= $item->name ?>">
  </div>
  <div class="col-md-6 text-center">
    <div class="text-justify"><?= $item->description ?></div>
    <h2 class="my-5"><?= $item->price ?> р.</h2>
    <form class="form-inline" action="#" method="post">
      <div class="btn-group mx-auto">
        <input class="form-control" type="number" value="1" min="0" max="10">
        <button type="submit" class="cart-button btn btn-primary" title="В корзину" data-id="1"><i class="fas
            fa-cart-arrow-down"></i> Купить
        </button>
      </div>
    </form>
  </div>
</div>
</div>
