


//follower csv list download start//

$(document).ready(function(){
    $("#inp-chkbox1").change(function(){
        $(".inpchk1").prop("checked",$(this).prop("checked"));
    });
});

//Extraxt CSV 

$(document).ready(function () {

    function exportTableToCSV($table, filename) {
    
            var $rows = $table.find('tr:has(td:has(input:checked)),tr:has(th)'),
            //var $rows = $table.filter('tr:has(:checkbox:checked)').find('tr:has(td),tr:has(th)'),

            tmpColDelim = String.fromCharCode(11),
            tmpRowDelim = String.fromCharCode(0),

            colDelim = '","',
            rowDelim = '"\r\n"',

            csv = '"' + $rows.map(function (i, row) {
                var $row = $(row), $cols = $row.find('td,th');
    
                return $cols.map(function (j, col) {
                    var $col = $(col), text = $col.text();
    
                    return text.replace(/"/g, '""');
                }).get().join(tmpColDelim);
    
            }).get().join(tmpRowDelim)
                .split(tmpRowDelim).join(rowDelim)
                .split(tmpColDelim).join(colDelim) + '"',

            csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);
            
            console.log(csv);
            
            if (window.navigator.msSaveBlob) { 
                window.navigator.msSaveOrOpenBlob(new Blob([csv], {type: "text/plain;charset=utf-8;"}), "csvname.csv")
            } 
            else {
                $(this).attr({ 'download': filename, 'href': csvData, 'target': '_blank' }); 
            }
    }
    
    $("#down").on('click', function (event) {
        
        exportTableToCSV.apply(this, [$('#demo'), 'data.csv']);

    });
});

//follower csv list download end//

//following csv list download start//

$(document).ready(function(){
    $("#inp-chkbox1-following").change(function(){
        $(".inpchk1_following").prop("checked",$(this).prop("checked"));
    });
});

//Extraxt CSV 

$(document).ready(function () {

    function exportTableToCSV($table, filename) {
    
            var $rows = $table.find('tr:has(td:has(input:checked)),tr:has(th)'),
            //var $rows = $table.filter('tr:has(:checkbox:checked)').find('tr:has(td),tr:has(th)'),

            tmpColDelim = String.fromCharCode(11),
            tmpRowDelim = String.fromCharCode(0),

            colDelim = '","',
            rowDelim = '"\r\n"',

            csv = '"' + $rows.map(function (i, row) {
                var $row = $(row), $cols = $row.find('td,th');
    
                return $cols.map(function (j, col) {
                    var $col = $(col), text = $col.text();
    
                    return text.replace(/"/g, '""');
                }).get().join(tmpColDelim);
    
            }).get().join(tmpRowDelim)
                .split(tmpRowDelim).join(rowDelim)
                .split(tmpColDelim).join(colDelim) + '"',

            csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);
            
            console.log(csv);
            
            if (window.navigator.msSaveBlob) { 
                window.navigator.msSaveOrOpenBlob(new Blob([csv], {type: "text/plain;charset=utf-8;"}), "csvname.csv")
            } 
            else {
                $(this).attr({ 'download': filename, 'href': csvData, 'target': '_blank' }); 
            }
    }
    
    $("#down_following").on('click', function (event) {
        
        exportTableToCSV.apply(this, [$('#dataTables-example'), 'data_following.csv']);

    });
});

//following csv list download end//

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

// First search follower and following details start //
var filtersConfig = {
        base_path: 'tablefilter/',
        auto_filter: {
            delay: 1100 //milliseconds
        },
        filters_row_index: 1,
        state: true,
        alternate_rows: true,
        rows_counter: true,
        btn_reset: true,
        status_bar: true,
        msg_filter: 'Filtering...'
    };
    var tf = new TableFilter('demo', filtersConfig);
    tf.init();
// First search follower and following details end //


// Compare search end //

// Following list details advanced search start //
var filtersConfig = {
    base_path: 'tablefilter/',
    auto_filter: {
        delay: 1100 //milliseconds
    },
    filters_row_index: 1,
    state: true,
    alternate_rows: true,
    rows_counter: true,
    btn_reset: true,
    status_bar: true,
    msg_filter: 'Filtering...'
};
var tf = new TableFilter('following_list_csv', filtersConfig);
tf.init();

// Following list details advanced search end //