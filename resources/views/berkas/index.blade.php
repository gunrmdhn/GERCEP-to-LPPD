@extends('template/index')
@section('title', $title)
@section('slot')
@if (Str::of(Route::currentRouteName())->after('.') == 'index')
<a href="{{ route('berkas.create') }}" class="btn btn-primary mb-3 col-12">Tambah</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Kode</th>
            <th>Kategori</th>
            <th>Berkas</th>
            <th>Ubah</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $item->kode }}</td>
            <td class="align-middle">{{ $item->kategori }}</td>
            <td class="align-middle">
                <a class="btn btn-info col" href="{{ asset('storage/'.$item->berkas) }}" target="_blank">
                    Lihat
                </a>
            </td>
            <td class="align-middle">
                <a href="{{ route('berkas.edit', $item->kode)  }}">
                    <button type="button" class="btn btn-warning text-white col">Ubah</button>
                </a>
            </td>
            <td class="align-middle">
                <form method="post" action="{{ route('berkas.destroy', $item->kode) }}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger col"
                        onclick="return confirm('Data {{ $item->kode }} akan dihapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@elseif (Str::of(Route::currentRouteName())->after('.') == 'create')
<form method="post" action="{{ route('berkas.store') }}" enctype="multipart/form-data">
    @csrf
    @include('berkas/_form')
</form>
@elseif (Str::of(Route::currentRouteName())->after('.') == 'edit')
<form method="post" action="{{ route('berkas.update', $berkas->kode) }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    @include('berkas/_form')
</form>
@endif
@endsection