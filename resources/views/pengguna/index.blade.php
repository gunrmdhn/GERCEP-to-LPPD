@extends('template/index')
@section('title', $title)
@section('slot')
@if (Str::of(Route::currentRouteName())->after('.') == 'index')
<a href="{{ route('pengguna.create') }}" class="btn btn-primary mb-3 col-12">Tambah</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Peran</th>
            <th>Nama Pengguna</th>
            <th>Ubah</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $item->peran }}</td>
            <td class="align-middle">{{ $item->nama_pengguna }}</td>
            <td class="align-middle">
                <a href="{{ route('pengguna.edit', $item->nama_pengguna)  }}">
                    <button type="button" class="btn btn-warning text-white col">Ubah</button>
                </a>
            </td>
            <td class="align-middle">
                <form method="post" action="{{ route('pengguna.destroy', $item->nama_pengguna) }}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger col"
                        onclick="return confirm('Data {{ $item->nama_pengguna }} akan dihapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@elseif (Str::of(Route::currentRouteName())->after('.') == 'create')
<form method="post" action="{{ route('pengguna.store') }}" enctype="multipart/form-data">
    @csrf
    @include('pengguna/_form')
</form>
@elseif (Str::of(Route::currentRouteName())->after('.') == 'edit')
<form method="post" action="{{ route('pengguna.update', $pengguna->nama_pengguna) }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    @include('pengguna/_form')
</form>
@endif
@endsection