<div class="card" style="min-width: 300px; max-width: 300px; margin-top: 10px; border-style: solid; border-width: 3px; background-color: rgb(48, 48, 48, 0.6); color: white;">
    <div class="card-title" style="text-align: center; font-size: large;"><?= isset($row['title']) ? $row['title'] : 'No Title'; ?></div>
    <img src="../images/products/<?=$row['id']?>.png" class="card-img-top" alt="produkte" />
    <div class="card-body" style="text-align: center;">
        Description
        <hr />
        <?php if(isset($row['price'])):?>
                &#8364;<?= number_format($row['price'] / 100, 2, ",", " ") ?>  
        <?php else: ?>
            No Price
        <?php endif ?>
    </div>
    <div class="card-footer" style="display: flex; justify-content: center;">
        <a style="background-color: firebrick; text-align: center; border-style: solid; border-width: 2px; border-color: white;" class="btn btn-primary btn-sm" onclick="showDetailsPopup(<?= $row['id'] ?>)">Details</a>
        
        <?php if (isProductInCart($row['id'])): ?>
            <a style="margin-left: 5px; background-color: #750606; border-style: solid; border-width: 2px; border-color: white;"
                 class="btn btn-success btn-sm" disabled> Already in Cart </a>
        <?php else: ?> 
            <a style="margin-left: 5px; background-color: #750606; border-style: solid; border-width: 2px; border-color: white;" 
                href="/index.php/cart/add/<?= $row['id'] ?>" class="btn btn-success btn-sm"> Add to Cart </a>
        <?php endif; ?>
    </div>
</div>


<div id="popup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closeDetailsPopup()">&times;</span>
        <!-- Hier kannst du die Produktinformationen einfügen -->
        <h2><?= isset($row['title']) ? $row['title'] : 'No Title'; ?></h2>
        <p><?= isset($row['description']) ? $row['description'] : 'No Description'; ?></p>
        <p>&#8364;<?= isset($row['price']) ? number_format($row['price'] / 100, 2, ",", " ") : 'No Price'; ?></p>
    </div>
</div>