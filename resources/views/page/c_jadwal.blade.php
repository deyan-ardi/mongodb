@extends('layouts.app')

@section('title', 'Tambah Data Jadwa;')
@section('footer')
    <script>
        // Get Data Dosen
        firebase.database().ref('Dosen/').on('value', function(snapshot) {
            var value = snapshot.val();
            var htmls = ['<option value="">-- Pilih Dosen --</option>'];
            $.each(value, function(index, value) {
                if (value) {
                    htmls.push('<option value="' + value.nama_dosen + '">' + value.nama_dosen +
                    '</option>');
                }
                lastIndex = index;
            });
            $('#nama_dosen').html(htmls);
        });
        // Get Data Kelas
        firebase.database().ref('Kelas/').on('value', function(snapshot) {
            var value = snapshot.val();
            var htmls = ['<option value="">-- Pilih Kelas --</option>'];
            $.each(value, function(index, value) {
                if (value) {
                    htmls.push('<option value="' + value.nama_kelas + '">' + value.nama_kelas +
                    '</option>');
                }
                lastIndex = index;
            });
            $('#nama_kelas').html(htmls);
        });
    </script>
@endsection
@section('main')
    <div class="col-6">
        <div class="card text-dark bg-light mb-3">
            <div class="card-header">Tambah Data Jadwal</div>
            <div class="card-body">
                <form action="{{ route('proses-tambah-jadwal') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Dosen</label>
                        <select name="nama_dosen" id="nama_dosen" class="form-control">

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kelas</label>
                        <select name="nama_kelas" id="nama_kelas" class="form-control">
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jadwal" class="form-label">Jadwal</label>
                        <input required type="date" class="form-control" id="jadwal" name="jadwal_kelas"
                            placeholder="jadwal kelas">
                    </div>
                    <div class="mb-3">
                        <label for="matkul" class="form-label">Mata Kuliah</label>
                        <input required type="text" class="form-control" id="matkul" name="matkul_kelas"
                            placeholder="matkul kelas">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data Jadwal</button>
                </form>
            </div>
        </div>
    </div>
@endsection
