@extends('layouts.app')

@section('title', 'Ubah Data Jadwa;')

@section('main')
    <div class="col-6">
        <div class="card text-dark bg-light mb-3">
            <div class="card-header">Ubah Data Jadwal</div>
            <div class="card-body">
                <form action="{{ route('proses-edit-jadwal') }}" method="POST">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id_jadwal" value="{{ $jadwal->id }}">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Dosen</label>
                        <select name="nama_dosen" id="nama_dosen" class="form-control">
                            <option value="">-- Pilih Dosen --</option>
                            @foreach ($dosen as $d)
                                @if ($jadwal->nama_dosen == $d->nama_dosen)
                                    <option value="{{ $d->nama_dosen }}" selected>{{ $d->nama_dosen }}</option>
                                @else
                                    <option value="{{ $d->nama_dosen }}">{{ $d->nama_dosen }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kelas</label>
                        <select name="nama_kelas" id="nama_dosen" class="form-control">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach ($kelas as $k)
                                @if ($jadwal->nama_kelas == $k->nama_kelas)
                                    <option value="{{ $k->nama_kelas }}" selected>{{ $k->nama_kelas }}</option>
                                @else
                                    <option value="{{ $k->nama_kelas }}">{{ $k->nama_kelas }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jadwal" class="form-label">Jadwal</label>
                        <input required type="date" class="form-control" value="{{ date($jadwal->jadwal) }}" id="jadwal" name="jadwal_kelas"
                            placeholder="jadwal kelas">
                    </div>
                    <div class="mb-3">
                        <label for="matkul" class="form-label">Mata Kuliah</label>
                        <input required type="text" class="form-control" value="{{ $jadwal->matkul }}" id="matkul" name="matkul_kelas"
                            placeholder="matkul kelas">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah Data Jadwal</button>
                </form>
            </div>
        </div>
    </div>
@endsection
