$(document).ready(() => {
    $('form').submit(function (e) {
        e.preventDefault();
        let inputs = {};
        $(this).find(':input').each(function () {
            inputs[$(this).attr("name")] = $(this).val();
        });
        $.ajax({
            url: "/addProduct",
            data: inputs,
            method: 'post',
            success: function (msg) {
                if (msg.status === 'success') {
                    window.location.replace("/");
                } else {
                    $('#error').show().html(msg.error);
                }
            }
        });
    });
});