$(document).ready(function () {
    $("#table-1").DataTable();
});

function submitDel(id) {
    $("#del-" + id).submit();
}
