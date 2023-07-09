$(document).ready(function () {
    $("#table-1").DataTable();
});

function submitDel(id) {
    $("#del-" + id).submit();
}

$('#tombol-form-donasi').on('click',function(){
    $.post("/user-donasi/kirim-donasi", {
        _method: 'POST',
        _token: $('meta[name="csrf-token"]').attr('content'),
       id_daftar_donasi: $('input#id_daftar_donasi').val(),
        jumlah_donasi: $('input#jumlah_donasi').val(),
    },
    function(response){
        snap.pay(response.snapToken, {
            onSuccess: function(result) {
                sendResponse(result,response.idDonasi);
                console.log(result);
            },
            onPending: function(result) {
                sendResponse(result,response.idDonasi);
                console.log(result);
            },
            onError: function(result) {
                sendResponse(result,response.idDonasi);
                console.log(result);
            }
        });
        return false;
    })
})
