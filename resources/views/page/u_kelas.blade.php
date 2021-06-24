@extends('layouts.app')

@section('title', 'Ubah Data Kelas')

@section('main')
    <div class="col-6">
        <div class="card text-dark bg-light mb-3">
            <div class="card-header">Ubah Data Dosen</div>
            <div class="card-body">
                <form action="{{ route('proses-edit-kelas') }}" method="POST">
                    @csrf
                    @method('patch')
                    <input type="hidden" value="{{ $kelas->id }}" name="id_kelas">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kelas</label>
                        <input required type="text" value="{{ $kelas->nama_kelas }}" class="form-control" id="nama" name="nama_kelas" placeholder="nama kelas">
                    </div>
                    <div class="mb-3">
                        <label for="prodi" class="form-label">Prodi Kelas</label>
                        <input required type="text" value="{{ $kelas->prodi }}" class="form-control" id="prodi" name="prodi_kelas" placeholder="prodi kelas">
                    </div>
                    <div class="mb-3">
                        <label for="fakultas" class="form-label">Fakultas Kelas</label>
                        <input required type="text" value="{{ $kelas->fakultas }}" class="form-control" id="fakultas" name="fakultas_kelas" placeholder="fakultas kelas">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data Kelas</button>
                </form>
            </div>
        </div>
    </div>
@endsection
