@extends('layouts.app')

@section('title', 'Ubah Data Dosen')

@section('main')
    <div class="col-6">
        <div class="card text-dark bg-light mb-3">
            <div class="card-header">Ubah Data Dosen</div>
            <div class="card-body">
                <form action="{{ route('proses-edit-dosen') }}" method="POST">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id_dosen" value="{{ $dosen->id }}">
                    <div class="mb-3">
                        <label for="nip" class="form-label">Nip Dosen</label>
                        <input required type="number" min="0" value="{{ $dosen->nip_dosen }}" class="form-control" id="nip" name="nip_dosen" placeholder="nip dosen">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Dosen</label>
                        <input required type="text" class="form-control" id="nama"  value="{{ $dosen->nama_dosen }}"  name="nama_dosen" placeholder="nama dosen">
                    </div>
                    <div class="mb-3">
                        <label for="prodi" class="form-label">Prodi Dosen</label>
                        <input required type="text" class="form-control" id="prodi"  value="{{ $dosen->prodi }}"  name="prodi_dosen" placeholder="prodi dosen">
                    </div>
                    <div class="mb-3">
                        <label for="fakultas" class="form-label">Fakultas Dosen</label>
                        <input required type="text" class="form-control" id="fakultas"  value="{{ $dosen->fakultas }}"  name="fakultas_dosen" placeholder="fakultas dosen">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah Data Dosen</button>
                </form>
            </div>
        </div>
    </div>
@endsection
