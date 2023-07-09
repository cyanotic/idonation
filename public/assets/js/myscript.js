$(document).ready(function () {
    $("#table-1").DataTable();
});

function submitDel(id) {
    $("#del-" + id).submit();
}

$('#tombol-form-donasi').on('click',function(){
    const idDaftar = $('input#id_daftar_donasi').val()
    $.post("/user-donasi/kirim-donasi", {
        _method: 'POST',
        _token: $('meta[name="csrf-token"]').attr('content'),
       id_daftar_donasi: idDaftar,
        jumlah_donasi: $('input#jumlah_donasi').val(),
    },
    function(response){
        snap.pay(response.snapToken, {
            onSuccess: function(result) {
                sendResponse(result,response.idDonasi,response.snapToken)
            },
            onPending: function(result) {
                sendResponse(result,response.idDonasi,response.snapToken)
            },
            onError: function(result) {
                sendResponse(result,response.idDonasi,response.snapToken)
            }
        });
        return false;
    })
})

function sendResponse(response,idDonasi,snapToken){
    $.post("/user-donasi/notification", {
            _method: 'POST',
            _token: $('meta[name="csrf-token"]').attr('content'),
          response:response,
          idDonasi:idDonasi,
          snapToken:snapToken
        },
        function(response) {
            window.location.href = "/riwayat/invoice/"+response;
        });
    }
