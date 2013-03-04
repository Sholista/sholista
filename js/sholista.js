$('#index').live('pageinit', function() {
        pageSetup();
    });

function pageSetup() {
    $('#shelf').droppable({ accept: '.inshoplist', drop: shelfDrop });
    $('#shoplist').droppable({ accept: '.onshelf', drop: shoplistDrop });
    var itemDragSpec = { helper: 'clone', revert: 'invalid',
                            appendTo: 'body', zIndex: 10000 }
    $('.item').each(function() {
            $(this).draggable(itemDragSpec);
        });
}

function shoplistDrop(e, ui) {
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
    item.addClass('inshoplist');
    item.draggable({helper: 'clone', revert: 'invalid'});

    // see if the item already exists
    var existing = $('#shoplist img[name="' + item.prop('name') + 
                                '"]')[0];
    if (existing) {
        item = $(existing);
        item[0].count++;
        item.next().html(item[0].count);
    } else {
        item[0].count = 1;

        var count = $(document.createElement('div'));
        count.addClass('item-count');
        count.html(item[0].count);

        var shoplist_display = $(document.createElement('div'));
        shoplist_display.append(item);
        shoplist_display.append(count);
        $('#shoplist').append($(shoplist_display));
    }
}

function shelfDrop(e, ui) {
    var item;
    if (ui.helper.clonedObj)
        item = $(ui.helper.clonedObj);
    else
        item = $(ui.helper);
    var orig = $('#shoplist img[name="' + item.prop('name') + 
                    '"]');

    orig[0].count--;
    if (orig[0].count == 0)
        orig.parent().remove();
    else
        orig.next().html(orig[0].count);
}

function img2CartDisplay(refimg) {
        var count = $(document.createElement('div'));
        count.addClass('item-count');
        count.html(refimg[0].count);

        var img = refimg.clone();

        var shoplistDisplay = $(document.createElement('div'));
        shoplistDisplay.append(img);
        shoplistDisplay.append(count);
        return shoplistDisplay;
}
