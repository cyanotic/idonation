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

    document.addEventListener('DOMContentLoaded', function(){
        // Mendapatkan data dari Laravel menggunakan Ajax jQuery
        $.ajax({
            url: '/donasi-chart',
            method: 'GET',
            dataType: 'json',
            success: function(chartData) {
                renderChart(chartData);
            },
            error: function(error) {
                console.error('Error retrieving chart data:', error);
            }
        });
    });

    function renderChart(chartData) {
        const labels = chartData[Object.keys(chartData)[0]]['labels'];
        const datasets = Object.keys(chartData).map((key) => {
            return {
                label: key,
                data: chartData[key]['data'],
                borderColor: '#151eb0',
                fill: false
            };
        });

        const data = {
            labels: labels,
            datasets: datasets
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Grafik Donasi per Kategori'
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Total Donasi'
                        }
                    }
                }
            },
        };

        var myChart = new Chart(
            document.getElementById('donasiChart'),
            config
        );
    }

    function getRandomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }



    $(document).ready(function() {
        // Memberikan penanganan peristiwa klik pada elemen dengan class dropdown-item
        $('.dropdown-item').on('click', function() {
            $('.dropdown-item').removeClass('active');
            $(this).addClass('active');
            var bulan = $(this).data('bulan');
            var namaBulan = $(this).text();
            $('#orders-month').text(namaBulan);
            filterDonasi(bulan)
        });
    });

  function  filterDonasi(bulan){
    $.ajax({
        url: '/filter-donasi',
        method: 'GET',
        data:{
            bulan:bulan
        },
        success: function(response) {
         $('#total-donasi').text('Rp'+response.total_donasi)
         $('#paid').text(response.jumlah_settlement)
         $('#pending').text(response.jumlah_pending)
         $('#expire').text(response.jumlah_expired)
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });
  }