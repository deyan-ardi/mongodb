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
                <a href="{{ route('tambah-kelas') }}"><button type="button" class="btn btn-primary mb-4">Tambah Data Kelas</button></a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Prodi</th>
                                <th scope="col">Fakultas</th>
                                <th scope="col">Fitur</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($kelas as $k)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $k->nama_kelas }}</td>
                                    <td>{{ $k->prodi }}</td>
                                    <td>{{ $k->fakultas }}</td>
                                    <td>
                                       <form action="{{ route('show-kelas',[$k->id]) }}" method="POST">
                                            @csrf
                                            <button class="btn-warning btn">Ubah</button>
                                        </form>
                                        <form action="{{ route('hapus-kelas',[$k->id]) }}" method="POST">
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
