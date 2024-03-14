<div class="col-3" style="background-image: src()">
    <img class="productPicture" src="../images/products/<?= $cartItem['product_id']?>.png" />
</div>
<div class="col-7">
    <div style="font-size: 30px; font-weight: bold;"><?= $cartItem['title'] ?></div>
    <div><?= $cartItem['description'] ?></div>
</div>
<div class="col-2 text-right">
    <span class="price"> &#8364;<?= number_format($cartItem['price'] / 100, 2, ",", " ") ?></span>
</div>
<div class="col-1" style="display: flex; margin-top: 5px;">
    <!-- <select class="quantity" id="quantity" name="quantity">
        <option value="1">Qty: 1</option>
        <option value="2">Qty: 2</option>
        <option value="3">Qty: 3</option>
        <option value="4">Qty: 4</option>
        <option value="5">Qty: 5</option>
        <option value="6">Qty: 6</option>
        <option value="7">Qty: 7</option>
        <option value="8">Qty: 8</option>
        <option value="9">Qty: 9</option>
        <option value="10">Qty: 10</option>
    </select> -->
    <a style="margin-left: 5px;" href="/index.php/cart/remove/<?= $cartItem['product_id'] ?>" class="actions">remove</a>
</div>
