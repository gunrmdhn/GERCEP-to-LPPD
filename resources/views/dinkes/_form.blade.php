<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Kode</label>
            <input type="text" class="form-control bg-white" name="kode" value="{{ $kode }}" readonly />
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Sumber Data</label>
            <input type="text" class="form-control bg-white" name="sumber_data" value="{{ $sumber_data }}" readonly />
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Berkas</label>
            <input autofocus type="file" class="form-control @error('berkas') is-invalid @enderror" name="berkas" />
            @error('berkas')
            <div class=" invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Bukti</label>
            <input type="file" class="form-control @error('bukti') is-invalid @enderror" name="bukti" />
            @error('bukti')
            <div class=" invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                value="{{ old('keterangan', $dinkes->keterangan) }}" />
            @error('keterangan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>
@if (Str::of(Route::currentRouteName())->after('.')=='create')
<button type="submit" class="btn btn-primary btn-block mb-3">Tambah</button>
@elseif (Str::of(Route::currentRouteName())->after('.') == 'edit')
<button type="submit" class="btn btn-warning btn-block text-white mb-3">Ubah</button>
@endif
<a class="btn btn-secondary col-12" href="{{ route('dinkes.index') }}">
    Kembali
</a>