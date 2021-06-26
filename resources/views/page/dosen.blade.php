@extends('layouts.app')

@section('title', 'Manajemen Data Dosen')
@section('footer')
    <script>
        // Get Data
        firebase.database().ref('Dosen/').on('value', function(snapshot) {
            var value = snapshot.val();
            var htmls = [];
            $.each(value, function(index, value) {
                if (value) {
                    htmls.push('<tr>\
                    <td>' + index + '</td>\
                    <td>' + value.nip_dosen + '</td>\
                    <td>' + value.nama_dosen + '</td>\
                    <td>' + value.prodi + '</td>\
                    <td>' + value.fakultas +
                        '</td>\
                    <td><button data-toggle="modal" data-target="#update-modal" class="btn btn-warning updateData" data-id="' +
                        index + '">Ubah Data</button>\
                    <button data-toggle="modal" data-target="#remove-modal" class="btn btn-danger removeData" data-id="' +
                        index + '">Delete</button></td>\
                    </tr>');
                }
                lastIndex = index;
            });
            $('#tbody').html(htmls);
            $("#submitUser").removeClass('disabled');
        });
        // Add Data
        $('#submitUser').on('click', function() {
            var values = $("#addUser").serializeArray();
            var nip_dosen = values[0].value;
            var nama_dosen = values[1].value;
            var prodi = values[2].value;
            var fakultas = values[3].value;
            var userID = lastIndex + 1;
            console.log(values);
            firebase.database().ref('Dosen/' + userID).set({
                nip_dosen: nip_dosen,
                nama_dosen: nama_dosen,
                prodi: prodi,
                fakultas: fakultas,
            });
            // Reassign lastID value
            lastIndex = userID;
            $("#addUser input").val("");
        });

        // Update Data
        // Menampilkan data form update
        var updateID = 0;
        $('body').on('click', '.updateData', function() {
            updateID = $(this).attr('data-id');
            firebase.database().ref('Dosen/' + updateID).on('value', function(snapshot) {
                var values = snapshot.val();
                var updateData = '<div class="form-group">\
                <label for="nip_dosen" class="col-md-12 col-form-label">Nip Dosen</label>\
                <div class="col-md-12">\
                <input id="nip_dosen" type="text" class="form-control" name="nip_dosen" value="' + values.nip_dosen + '" required autofocus>\
                </div>\
                </div>\
                <div class="form-group">\
                <label for="nama_dosen" class="col-md-12 col-form-label">Nama Dosen</label>\
                <div class="col-md-12">\
                <input id="nama_dosen" type="text" class="form-control" name="nama_dosen" value="' + values.nama_dosen + '" required autofocus>\
                </div>\
                </div>\
                <div class="form-group">\
                <label for="prodi" class="col-md-12 col-form-label">Prodi</label>\
                <div class="col-md-12">\
                <input id="prodi" type="text" class="form-control" name="prodi" value="' + values.prodi + '" required autofocus>\
                </div>\
                </div>\
                <div class="form-group">\
                <label for="fakultas" class="col-md-12 col-form-label">Fakultas</label>\
                <div class="col-md-12">\
                <input id="fakultas" type="text" class="form-control" name="fakultas" value="' + values.fakultas + '" required autofocus>\
                </div>\
                </div>';
                $('#updateBody').html(updateData);
            });
        });
        // Eksekusi Update
        $('.updateUser').on('click', function() {
            var values = $(".users-update-record-model").serializeArray();
            var postData = {
                nip_dosen: values[0].value,
                nama_dosen: values[1].value,
                prodi: values[2].value,
                fakultas: values[3].value,
            };
            var updates = {};
            updates['/Dosen/' + updateID] = postData;
            firebase.database().ref().update(updates);
            $("#update-modal").modal('hide');
        });

        // Remove Data
        // Nampilin Modal
        $("body").on('click', '.removeData', function() {
            var id = $(this).attr('data-id');
            $('body').find('.users-remove-record-model').append('<input name="id" type="hidden" value="' + id +
                '">');
        });
        // Eksekusi Modal
        $('.deleteRecord').on('click', function() {
            var values = $(".users-remove-record-model").serializeArray();
            var id = values[0].value;
            firebase.database().ref('Dosen/' + id).remove();
            $('body').find('.users-remove-record-model').find("input").remove();
            $("#remove-modal").modal('hide');
        });
        $('.remove-data-from-delete-form').click(function() {
            $('body').find('.users-remove-record-model').find("input").remove();
        });
    </script>
@endsection
@section('main')

    <div class="col-12">
        <div class="card text-dark bg-light mb-3">
            <div class="card-header">Tambah Data Dosen</div>

            <div class="card-body">
                <form id="addUser" class="" method="POST" action="">
                    <div class="form-group mb-2">
                        <label for="nip" class="sr-only">Nip</label>
                        <input id="nip" type="text" class="form-control" name="nip_dosen" placeholder="Nip Dosen" required
                            autofocus>
                    </div>
                    <div class="form-group mb-2">
                        <label for="nama" class="sr-only">Nama Dosen</label>
                        <input id="nama" type="text" class="form-control" name="nama_dosen" placeholder="Nama Dosen"
                            required autofocus>
                    </div>
                    <div class="form-group mb-2">
                        <label for="prodi" class="sr-only">Prodi</label>
                        <input id="prodi" type="text" class="form-control" name="prodi" placeholder="Prodi" required
                            autofocus>
                    </div>
                    <div class="form-group mb-2">
                        <label for="fakultas" class="sr-only">Fakultas</label>
                        <input id="fakultas" type="text" class="form-control" name="fakultas" placeholder="Fakultas"
                            required autofocus>
                    </div>
                    <button id="submitUser" type="button" class="btn btn-primary mb-2">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card text-dark bg-light mb-3">
            <div class="card-header">List Data Dosen</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIP Dosen</th>
                                <th scope="col">Nama Dosen</th>
                                <th scope="col">Prodi</th>
                                <th scope="col">Fakultas</th>
                                <th scope="col">Fitur</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Update Model -->
    <form action="" method="POST" class="users-update-record-model form-horizontal">
        <div id="update-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="custom-width-modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                <div class="modal-content" style="overflow: hidden;">
                    <div class="modal-header">
                        <h4 class="modal-title" id="custom-width-modalLabel">Ubah Dosen</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                        </button>
                    </div>
                    <div class="modal-body" id="updateBody">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup
                        </button>
                        <button type="button" class="btn btn-success updateUser">Ubah Dosen
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Delete Model -->
    <form action="" method="POST" class="users-remove-record-model">
        <div id="remove-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="custom-width-modalLabel">Hapus Dosen</h4>
                        <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal"
                            aria-hidden="true">×
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda ingin menghapus data  dosen ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"
                            data-dismiss="modal">Tutup
                        </button>
                        <button type="button" class="btn btn-danger waves-effect waves-light deleteRecord">Yakin
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
