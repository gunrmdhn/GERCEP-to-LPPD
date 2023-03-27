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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endforeach
@endsection