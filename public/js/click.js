$(document).ready(function () {
    $("input[id^=defaultChecked]").click(function (e) {
        e.preventDefault();
        var form = $(this);
        var data = {id: form.attr('value'), _token: secure_token};
        $.ajax({
            type: 'POST',
            url: form.attr('data-url'),
            dataType: 'json',
            data: data,
            beforeSend: function (data) {
                form.attr('disabled', 'disabled');
            },
            success: function (data) {
                if (data["pos"] == 1)
                    form.prop('checked', true);
                else
                    form.prop('checked', false);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            },
            complete: function (data) {
                form.prop('disabled', false);
            }
        });
        return false;
    })
})