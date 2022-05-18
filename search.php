<div id="live-search">
    <label for="product">Tìm kiếm:</label>
    <input id="product" placeholder="Nhap ten san pham">
    <input type="hidden" id="product-id">
    <p id="product-description"></p>
</div>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $( "#product" ).autocomplete({
            minLength: 0,
            source: 'process_search.php',
            focus: function( event, ui ) {
                $( "#product" ).val( ui.item.label );
                return false;
            },
            select: function( event, ui ) {
                // $( "#product" ).val( ui.item.label );
                // $( "#product-id" ).val( ui.item.value );
                // $( "#product-description" ).html( `<img src='admin/products/photos/${item.photo}' height='100'>` );
                // $( "#product-icon" ).attr( "src", "admin/products/photos/" + ui.item.photo );
                window.location.href = "product.php?id=" + ui.item.value;
                return false;
            }
        })
        .autocomplete( "instance" )._renderItem = function( ul, item ) {
        return $( "<li>" )
            .append( `<div> 
                ${item.label} 
                <br>
                <img src='admin/products/photos/${item.photo}' height='50'>
                ` )
            .appendTo( ul );
        };
    });
</script>
