<div data-role="page" id="index">
    <div data-role="header">
    	<?php include('templates/page_header.php')?>
    </div>
    <div data-role="content">
        Shelf: Drag to add items from here to the cart below
		<div id="shelf">
            <img class="item" src="/img/Apples.jpeg" />
            <img class="item" src="/img/Bananas.jpeg" />
            <img class="item" src="/img/Cauliflower.jpeg" />
		</div>
        Cart: Drag to remove items from here to the shelf above
		<div id="cart">
		</div>
        <a data-role="button" href="#empty">Next</a>
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
