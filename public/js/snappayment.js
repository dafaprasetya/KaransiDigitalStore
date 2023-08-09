$(document).ready(function () {
    $("#success").css('display','none')

    $('#bayar').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: $(this).data('href'),
            data: {
                namaD : $('#namaD').val(),
                namaB : $('#namaB').val(),
                email : $('#email').val(),
                tujuan : $('#tujuan').val(),
            },
            success: function (response) {
                console.log('waiting for snap');
                window.snap.pay(response.snapToken, {
                    onSuccess: function(result){
                        /* You may add your own implementation here */
                        $('#berhasill').css('display', 'block')
                        $('#lanjutkan').val('Pembayaran berhasil, transaction id : ' + result.transaction_id);
                        $('#lanjutkan').click(function(){
                            navigator.clipboard.writeText(result.transaction_id);
                            alert("Transaction ID disalin ke clipboard")
                            this.disabled = true;
                        });


                        $.ajax({
                            type: "POST",
                            url: $('#kirim').data('href'),
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: {
                                namaD : response.first_name,
                                namaB : response.last_name,
                                email : response.email,
                                harga : response.harga,
                                status : 'berhasil',
                                tujuan : response.tujuan,
                                tr_id : result.transaction_id,
                            },
                            dataType: "dataType",
                            success: function (response2) {
                                console.log('mengirim ke database');
                            }
                        });


                    },
                    onPending: function(result){
                        /* You may add your own implementation here */
                        window.onbeforeunload = function() {
                            return "Are you sure you want to leave?";
                        }
                        $.ajax({
                            type: "POST",
                            url: $('#kirim').data('href'),
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: {
                                namaD : response.first_name,
                                namaB : response.last_name,
                                email : response.email,
                                harga : response.harga,
                                status : 'pending',
                                tujuan : response.tujuan,
                                tr_id : result.transaction_id,
                            },
                            dataType: "dataType",
                            success: function (response2) {
                                console.log('mengirim ke database');
                            }
                        });

                        $("#sulit").css('display', 'block');


                        var qr = result.transaction_id;
                        $('#trid').text(qr);
                        console.log(qr);
                        $('#lanjutkan').val('menunggu proses pembayaran. Qris');

                        $("#qrcodee").css('display', 'block')
                        $("#kris").attr('src','https://api.midtrans.com/v2/qris/'+qr+'/qr-code')

                        $('#lanjutkan').val('Menunggu proses pembayaran');
                        $('#lanjutkan').attr('disabled', 'disabled');

                        console.log('Menunggu proses pembayaran');
                        var bank = result.va_numbers[0].bank;
                        var va_numbers = result.va_numbers[0].va_number;
                        $('#bankva').text('menunggu proses pembayaran.Bank : '+bank+', VA : '+va_numbers);

                        $('#lanjutkan').click(function(){
                            navigator.clipboard.writeText(va_numbers);
                            alert("VA disalin ke clipboard")
                            this.disabled = true;
                        });

                        $('#lanjutkan').val('Menunggu proses pembayaran');
                        $('#lanjutkan').attr('disabled', 'disabled');
                        return result;


                    },
                    onError: function(result){
                        /* You may add your own implementation here */
                        $.ajax({
                            type: "POST",
                            url: $('#kirim').data('href'),
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: {
                                namaD : response.first_name,
                                namaB : response.last_name,
                                email : response.email,
                                harga : response.harga,
                                status : 'gagal',
                                tujuan : response.tujuan,
                                tr_id : result.transaction_id,
                            },
                            dataType: "dataType",
                            success: function (response2) {
                                console.log('mengirim ke database');
                            }
                        });
                        alert("payment failed!"); console.log(result);
                        $("#sulit").css('display', 'block');

                        $("#onpend").text("Pembayaran gagal, Transaction ID :");
                        $("#trid").text(result.transaction_id);
                    },
                    onClose: function(){
                        /* You may add your own implementation here */
                        $('#lanjutkan').val('Buka kembali pembayaran');

                    }
                })
            }
        });

    });
});
