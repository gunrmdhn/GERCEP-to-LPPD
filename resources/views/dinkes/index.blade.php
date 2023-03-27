@extends('template/index')
@section('title', $title)
@section('slot')
@if (Str::of(Route::currentRouteName())->after('.') == 'index')
@if (count($berkas) != 0)
<button type="button" class="btn btn-secondary mb-3 col-12" data-toggle="modal" data-target="#berkas">Unduh
    Berkas
</button>
@endif
<a href="{{ route('dinkes.create') }}" class="btn btn-primary mb-3 col-12">Tambah</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Cek</th>
            <th>Nomor</th>
            <th>Kode</th>
            <th>Sumber Data</th>
            <th>Berkas</th>
            <th>Bukti</th>
            <th>Keterangan</th>
            <th>Ubah</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td class="align-middle">
                @if ($item->cek)
                <span class="badge badge-success d-flex justify-content-center">Sesuai</span>
                @else
                <span class="badge badge-danger d-flex justify-content-center">Tidak Sesuai</span>
                @endif
            </td>
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $item->kode }}</td>
            <td class="align-middle">{{ $item->sumber_data }}</td>
            <td class="align-middle">
                <a class="btn btn-info col" href="{{ asset('storage/'.$item->berkas) }}" target="_blank">
                    Lihat
                </a>
            </td>
            <td class="align-middle">
                <a class="btn btn-info col" href="{{ asset('storage/'.$item->bukti) }}" target="_blank">
                    Lihat
                </a>
            </td>
            <td class="align-middle">
                <button type="button" class="btn btn-warning text-white col" data-toggle="modal"
                    data-target="#cek-{{ $item->kode }}">Cek</button>
            </td>
            <td class="align-middle">
                <a href="{{ route('dinkes.edit', $item->kode)  }}">
                    <button type="button" class="btn btn-warning text-white col">Ubah</button>
                </a>
            </td>
            <td class="align-middle">
                <form method="post" action="{{ route('dinkes.destroy', $item->kode) }}">
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
@foreach ($data as $item)
<div class="modal fade" id="cek-{{ $item->kode }}" role="dialog">
    <div class="modal-dialog modal-lg p-3" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <h4 class="text-center">{{ $item->kode }}</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Keterangan</strong><br>
                        <p class="font-italic">{{ $item->keterangan }}</p>
                    </li>
                    <li class="list-group-item">
                        <strong>Keterangan Kabag</strong><br>
                        <p class="font-italic">{{ $item->keterangan_kabag }}</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endforeach
@if (count($berkas) != 0)
<div class="modal fade" id="berkas" role="dialog">
    <div class="modal-dialog p-3" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                @foreach ($berkas as $item)
                <a class="btn btn-info col mb-3" href="{{ asset('storage/'.$item->berkas) }}" download="">
                    {{ $item->kode }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
@elseif (Str::of(Route::currentRouteName())->after('.') == 'create')
<form method="post" action="{{ route('dinkes.store') }}" enctype="multipart/form-data">
    @csrf
    @include('dinkes/_form')
</form>
@elseif (Str::of(Route::currentRouteName())->after('.') == 'edit')
<form method="post" action="{{ route('dinkes.update', $dinkes->kode) }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    @include('dinkes/_form')
</form>
@endif
@endsection