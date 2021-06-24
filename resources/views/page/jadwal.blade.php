@extends('layouts.app')

@section('title', 'Manajemen Data Jadwal')

@section('main')
    <div class="col-12">
        @if (Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="card text-dark bg-light mb-3">
            <div class="card-header">List Data Jadwal</div>
            <div class="card-body">
                <a href="{{ route('tambah-jadwal') }}"><button type="button" class="btn btn-primary mb-4">Tambah Data
                        Jadwal</button></a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Dosen</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Jadwal</th>
                                <th scope="col">Mata Kuliah</th>
                                <th scope="col">Fitur</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($jadwal as $k)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $k->nama_dosen }}</td>
                                    <td>{{ $k->nama_kelas }}</td>
                                    <td>{{ $k->jadwal }}</td>
                                    <td>{{ $k->matkul }}</td>
                                    <td>
                                        <form action="{{ route('show-jadwal', [$k->id]) }}" method="POST">
                                            @csrf
                                            <button class="btn-warning btn">Ubah</button>
                                        </form>
                                        <form action="{{ route('hapus-jadwal', [$k->id]) }}" method="POST">
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
