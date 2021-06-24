@extends('layouts.app')

@section('title', 'Tambah Data Jadwa;')

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
                            <option value="">-- Pilih Dosen --</option>
                            @foreach ($dosen as $d)
                                <option value="{{ $d->nama_dosen }}">{{ $d->nama_dosen }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kelas</label>
                        <select name="nama_kelas" id="nama_dosen" class="form-control">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->nama_kelas }}">{{ $k->nama_kelas }}</option>
                            @endforeach
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
