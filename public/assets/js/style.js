//follower js start //
$(document).ready(function(){

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current){
        $('#show-previous-image, #show-next-image').show();
        if(counter_max == counter_current){
            $('#show-next-image').hide();
        } else if (counter_current == 1){
            $('#show-previous-image').hide();
        }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr){
        var current_image,
            selector,
            counter = 0;

        $('#show-next-image, #show-previous-image').click(function(){
            if($(this).attr('id') == 'show-previous-image'){
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
        });

        function updateGallery(selector) {
            var $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-caption').text($sel.data('caption'));
            $('#image-gallery-title').text($sel.data('title'));
            $('#image-gallery-image').attr('src', $sel.data('image'));
            disableButtons(counter, $sel.data('image-id'));
        }

        if(setIDs == true){
            $('[data-image-id]').each(function(){
                counter++;
                $(this).attr('data-image-id',counter);
            });
        }
        $(setClickAttr).on('click',function(){
            updateGallery($(this));
        });
    }
});
//follower js end //

// Compare search start //


$('.first-search-add-btn').click(function(){

    $('.first-search-add-btn').hide();
    $('.second-search-add-btn').show();
    $('.second-search-remove-btn').show();
    $('.second-search-add').show();
});

$('.second-search-add-btn').click(function(){

    $('.second-search-add-btn').hide();
    $('.second-search-remove-btn').hide();
    $('.third-search-remove-btn').show();
    $('.third-search-add').show();
});

$('.second-search-remove-btn').click(function(){

    var second_value = $('#searchUser2').val();

    if(second_value){
        alert('Remove the input value');
    }
    else{
        $('.second-search-add-btn').hide();
        $('.second-search-remove-btn').hide();
        $('.second-search-add').hide();
        $('.first-search-add-btn').show();
    }    
});

$('.third-search-remove-btn').click(function(){

    var third_value = $('#searchUser3').val();
    if(third_value){
        alert('Remove the input value');
    }else{
        $('.third-search-remove-btn').hide();
        $('.third-search-add').hide();
        $('.second-search-add-btn').show();
        $('.second-search-remove-btn').show();
        $('.second-search-add').show();
    }    
});




// Compare search end //