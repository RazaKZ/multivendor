$(document).ready(function() {

    $("#current_password").keyup(function() {
        var current_password = $("#current_password").val();
        // alert(current_password);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({

            type: "post",
            url: '/admin/check-admin-password',
            data: { current_password: current_password },

            success: function(resp) {
                alert(resp);

            },
            error: function() {
                alert('Error');
            }
        });


    });


});