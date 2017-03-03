$(function () {

    var new_dialog = function (type, row) {
        var dlg = $("#dialog-form").clone();
        var fname = dlg.find(("#first-name")),
            lname = dlg.find(("#last-name")),
            email = dlg.find(("#email")),
            password = dlg.find(("#password"));
        type = type || 'Create';
        var config = {
            autoOpen: true,
            height: 300,
            width: 350,
            modal: true,
            buttons: {
                "Create an account": save_data,
                    "Cancel": function () {
                    dlg.dialog("close");
                }
            },
            close: function () {
                dlg.remove();
            }
        };
        if (type === 'Edit') {
            config.title = "Edit User";
            get_data();
            delete(config.buttons['Create an account']);
            config.buttons['Edit account'] = function () {
                row.remove();
                save_data();

            };

        }
        dlg.dialog(config);

        function get_data() {
            var _email = $(row.children().get(1)).text(),
                _password = $(row.children().get(2)).text();
            email.val(_email);
            password.val(_password);

        }

        function save_data() {
            $("#users tbody").append("<tr>" + "<td>" + (fname.find("option:selected").text() + ' ').concat(lname.find("option:selected").text()) + "</td>" + "<td>" + email.val() + "</td>" + "<td>" + password.val() + "</td>" + "<td><a href='' class='edit'>Edit</a></td>" + "<td><span class='delete'><a href=''>Delete</a></span></td>" + "</tr>");
            dlg.dialog("close");
        }
    };

    $(document).on('click', 'span.delete', function () {
        $(this).closest('tr').find('td').fadeOut(1000,

        function () {
            // alert($(this).text());
            $(this).parents('tr:first').remove();
        });

        return false;
    });
    $(document).on('click', 'td a.edit', function () {
        new_dialog('Edit', $(this).parents('tr'));
        return false;
    });

    $("#create-user").button().click(new_dialog);

});