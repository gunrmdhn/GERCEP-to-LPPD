@extends('template/index')
@section('title', $title)
@section('slot')
<div class="btn-group mb-3 d-flex justify-content-center px-0" role="group" aria-label="Basic example">
    @foreach ($menu as $item)
    <button type="button" class="btn btn-secondary pd-x-25" data-toggle="collapse" data-target="#{{ $item['link'] }}">{{
        Str::upper($item['link']) }}</button>
    @endforeach
</div>
@foreach ($menu as $item)
<div class="collapse mb-3" id="{{ $item['link'] }}">
    <div class="card card-body p-4">
        <h4 class="card-title text-center">{{ $item['title'] }}</h4>
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
                </tr>
            </thead>
            <tbody>
                @foreach ($item['data'] as $item)
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endforeach
@foreach ($menu as $item)
@php
$link = $item['link'];
@endphp
@foreach ($item['data'] as $value)
<div class="modal fade" id="cek-{{ $value->kode }}" role="dialog">
    <div class="modal-dialog modal-xl p-3" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <h4 class="text-center">{{ $value->kode }}</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Keterangan</strong><br>
                        <p class="font-italic">{{ $value->keterangan }}</p>
                    </li>
                    <li class="list-group-item">
                        <form method="post" action="{{ route('update.'.$link, $value->kode) }}">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Keterangan Kabag</label>
                                        <input type="text"
                                            class="form-control @error('keterangan_kabag') is-invalid @enderror"
                                            name="keterangan_kabag"
                                            value="{{ old('keterangan_kabag', $value->keterangan_kabag) }}" />
                                        @error('keterangan_kabag')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Cek</label>
                                        <select class="form-control @error('cek') is-invalid @enderror" name="cek">
                                            @foreach ( $cek as $key => $item )
                                            <option @selected( old('cek', $value->cek)==$key ) value="{{
                                                $key}}">{{ $item }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning btn-block text-white mb-3">Simpan</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endforeach
@endforeach
@endsection