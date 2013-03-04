$('#index').live('pageinit', function() {
        pageSetup();
    });

function pageSetup() {
    $('#shelf').droppable({ scope: 'shelf' });
    $('#cart').droppable({ scope: 'cart' });
    var itemDragSpec = { helper: 'clone', stop: cartDrop, revert: 'invalid',
                            appendTo: 'body', zIndex: 10000, scope: 'cart' }
    $('.item').each(function() {
            $(this).draggable(itemDragSpec);
        });
}

function cartDrop(e, ui) {
    var item;
    if (ui.helper.clonedObj) {
        item = $(ui.helper.clonedObj);
    } else {
        item = $(ui.helper).clone();
    }
    item.css('position', 'static');
    item.css('top', '0');
    item.css('left', '0');
    item.removeClass('onshelf');
    item.addClass('incart');
    item.draggable({helper: 'clone', stop: shelfDrop, revert: 'invalid',
                        scope: 'shelf'});

    // see if the item already exists
    var existing = $('#cart img[name="' + item.prop('name') + 
                                '"]')[0];
    if (existing) {
        item = $(existing);
        item[0].count++;
        item.next().html(item[0].count);
    } else {
        item[0].count = 1;

        var count = $(document.createElement('div'));
        count.html(item[0].count);

        var cart_display = $(document.createElement('div'));
        cart_display.append(item);
        cart_display.append(count);
        $('#cart').append($(cart_display));
    }
}

function shelfDrop(e, ui) {
    var item;
    if (ui.helper.clonedObj)
        item = $(ui.helper.clonedObj);
    else
        item = $(ui.helper);
    var orig = $('#cart img[name="' + item.prop('name') + 
                    '"]');

    orig[0].count--;
    if (orig[0].count == 0)
        orig.parent().remove();
    else
        orig.next().html(orig[0].count);
}
