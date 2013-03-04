<div data-role="page" id="index">
    <div data-role="header">
    	<?php include('templates/page_header.php')?>
    </div>
    <div data-role="content">
        Shelf: Drag to add items from here to the cart below
        <div style="overflow-x: scroll">
		<div id="shelf">
        <?php
            foreach ($products as $prod) {
        ?>
                <img name="<?=$prod->ItemId?>" src="/img/<?=$prod->ItemImageName?>" class="onshelf item" />
        <?php
            }
        ?>
		</div>
        </div>
        Cart: Drag to remove items from here to the shelf above
        <div style="overflow-x: scroll">
		<div id="cart">
		</div>
        </div>
        <a data-role="button" href="#empty">Shop</a>
    </div>
    <div data-role="footer">
    </div>
</div>
<div data-role="page" id="empty">
    <div data-role="header">
    <?php include('templates/page_header.php')?>
    </div>
    <div data-role="content">
    </div>
    <div data-role="footer">
    </div>
</div>
