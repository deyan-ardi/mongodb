@extends('layouts.app')

@section('title', 'Manajemen Data Dosen')

@section('main')
    <div class="col-12">
        @if (Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="card text-dark bg-light mb-3">
            <div class="card-header">List Data Dosen</div>
            <div class="card-body">
                <a href="{{ route('tambah-dosen') }}"><button type="button" class="btn btn-primary mb-4">Tambah Data
                        Dosen</button></a>
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
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($dosen as $d)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $d->nip_dosen }}</td>
                                    <td>{{ $d->nama_dosen }}</td>
                                    <td>{{ $d->prodi }}</td>
                                    <td>{{ $d->fakultas }}</td>
                                    <td>
                                        <form action="{{ route('show-dosen',[$d->id]) }}" method="POST">
                                            @csrf
                                            <button class="btn-warning btn">Ubah</button>
                                        </form>
                                        <form action="{{ route('hapus-dosen',[$d->id]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn-danger btn mt-2">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
