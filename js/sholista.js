$('#index').live('pageinit', function() {
        pageSetup();
    });

function pageSetup() {
    /*
    $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 100,
    });
    */

    $('#cart').droppable();
    var itemDragSpec = { helper: 'clone', stop: itemDrop, revert: 'invalid',
                            appendTo: 'body', zIndex: 10000 }
    $('.item').each(function() {
            $(this).draggable(itemDragSpec);
        });
}

function itemDrop(e, ui) {
    var item;
    if (ui.helper.clonedObj) {
        item = $(ui.helper.clonedObj);
    } else {
        item = $(ui.helper).clone();
    }
    item.css('position', 'static');
    $('#cart').append(item);
}
