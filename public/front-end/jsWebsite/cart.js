$(document).ready(function() {
    $("#theInput").bind("keypress", function(e) {
        var keyCode = e.which ? e.which : e.keyCode;

        if (!(keyCode >= 48 && keyCode <= 57)) {
            return false;
        } else {
            return true;
        }
    });

    $('.btn-number').click(function(e) {
        e.preventDefault();
        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[id='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });

    $('.input-number').focusin(function() {
        $(this).data('oldValue', $(this).val());
    });

    $('.input-number').change(function() {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            $(this).val($(this).data('oldValue'));
        }
    });
    $(".input-number").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});


function updateCart(id) {

    setTimeout(function() {
        var formData = {
            'id': id,
            'quantity': $("#" + id).val(),
            'price': $("#" + id).attr('data-price')
        };

        $.ajax({
            method: 'GET',
            url: '/api/cart/update',
            data: formData,
            dataType: 'json',
            success: function(data) {
                if (data != null) {
                    $("#" + data.id).val(data.quantity)
                    $("." + data.id).html(formatMoney(data.total) + " VNĐ");
                    $("#totalPrice").text("Tổng tiền: " + formatMoney(data.totalPrice) + " VNĐ");
                }
            },
            error: function(error) {
                console.log(error.message);
            }
        })
    }, 500);
};


function removeCart(id) {
    $.get('/api/cart/destroy/' + id).then(function(data) {
        $("#item" + data.id).remove();
        $("#totalPrice").text("Tổng tiền: " + formatMoney(data.totalPrice) + " VNĐ");

    });
}

function formatMoney(val) {
    while (/(\d+)(\d{3})/.test(val.toString())) {
        val = val.toString().replace(/(\d+)(\d{3})/, '$1' + '.' + '$2');
    }
    return val;
};
