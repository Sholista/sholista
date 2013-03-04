<div data-role="page" id="index">
    <div data-role="header">
    	<?php include('templates/page_header.php')?>
    </div>
    <div data-role="content">
        Shelf: Drag to add items from here to the cart below
        <div style="overflow-x: scroll">
		<div id="shelf">
            <img name="1" class="onshelf item" src="/img/Apples.jpeg" />
            <img name="2" class="onshelf item" src="/img/Bananas.jpeg" />
            <img name="3" class="onshelf item" src="/img/Cauliflower.jpeg" />
            <img name="4" class="onshelf item" src="/img/Apples.jpeg" />
            <img name="5" class="onshelf item" src="/img/Bananas.jpeg" />
            <img name="6" class="onshelf item" src="/img/Cauliflower.jpeg" />
            <img name="7" class="onshelf item" src="/img/Apples.jpeg" />
            <img name="8" class="onshelf item" src="/img/Bananas.jpeg" />
            <img name="9" class="onshelf item" src="/img/Cauliflower.jpeg" />
		</div>
        </div>
        Cart: Drag to remove items from here to the shelf above
        <div style="overflow-x: scroll">
		<div id="cart">
		</div>
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
