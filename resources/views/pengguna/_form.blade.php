<div class="row">
    <div class="col-sm-12">
        <input type="hidden" class="form-control" name="id" value="{{ $pengguna->id }}" />
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label>Peran</label>
            <select class="form-control @error('peran') is-invalid @enderror" name="peran">
                @foreach ( $peran as $key => $item )
                <option @selected( old('peran', $pengguna->peran)==$item ) value="{{
                    $item}}">{{ $item }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label>Nama Pengguna</label>
            <input type="text" class="form-control @error('nama_pengguna') is-invalid @enderror" name="nama_pengguna"
                value="{{ old('nama_pengguna', $pengguna->nama_pengguna) }}" />
            @error('nama_pengguna')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Kata Sandi</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" />
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Konfirmas Kata Sandi</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                name="password_confirmation" />
            @error('password_confirmation')
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
@if (auth()->user()->peran == 'KEPALA BIDANG')
<a class="btn btn-secondary col-12" href="{{ route('pengguna.index') }}">
    Kembali
</a>
@else
<a class="btn btn-secondary col-12" href="{{ route('index') }}">
    Kembali
</a>
@endif