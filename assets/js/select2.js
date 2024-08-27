// Class definition
var KTSelect2 = function () {
    // Private functions
    var demos = function () {
        // basic
        $('#product_type').select2({
            placeholder: 'Select product type'
        });

        $("#select_order_search").select2({
            placeholder: "Search for products",
            allowClear: true,
            minimumInputLength: 3,
            ajax: {
                url: '/getShopProducts',
                dataType: 'json',
                type: 'get',
                data: function (params) {
                    return {
                        q: params.term,
                        shop_id: $('#shop').val()
                    };
                },
            }
        });

    }

    // Public functions
    return {
        init: function () {
            demos();
        }
    };
}();

// Initialization
jQuery(document).ready(function () {
    KTSelect2.init();
});
