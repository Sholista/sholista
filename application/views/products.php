<div data-role="page" id="index">
    <div data-role="header">
    	<?php include('templates/page_header.php')?>
    </div>
    <div data-role="content">
        Shelf: Add items by dragging to the list below
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
        Shoplist: Remove items by dragging to the shelf above
        <div style="overflow-x: scroll">
		<div id="shoplist">
		</div>
        </div>
        <a data-role="button" href="#shop">Shop</a>
    </div>
    <div data-role="footer">
    </div>
</div>


<div data-role="page" id="shop">
    <div data-role="header">
    <?php include('templates/page_header.php')?>
    </div>
    <div data-role="content">
    Your Shoplist:
    <div id="checkoutlist"></div>
    </div>
    <div data-role="footer">
    </div>
    <a data-role="button" href="#index">Back</a>
</div>

<script type="text/javascript">
$('#shop').live('pageshow', function(e, d) {
        $('#checkoutlist').empty();
        var pdata = { shoplist: [] };
        $('#shoplist img').each(function(i, img) {
            $('#checkoutlist').append(img2CartDisplay($(img)));
                pdata.shoplist.push({ id: img.name, qty: $(img).next().html() });
            });

        // post the shoplist to server
        $.ajax('/index.php/shoplist',
                {
                    type: 'POST',
                    data: pdata
                }
            ).done(function(msg) {
                console.log(msg);
                });

    });
</script>


<div data-role="page" id="empty">
    <div data-role="header">
    <?php include('templates/page_header.php')?>
    </div>
    <div data-role="content">
    </div>
    <div data-role="footer">
    </div>
</div>
