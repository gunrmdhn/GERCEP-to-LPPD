<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label>Nama Pengguna</label>
            <input type="text" class="form-control @error('nama_pengguna') is-invalid @enderror" name="nama_pengguna"
                value="{{ old('nama_pengguna') }}" />
            @error('nama_pengguna')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label>Kata Sandi</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                value="{{ old('password') }}" />
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>
<button type="submit" class="btn btn-az-primary btn-block">Masuk</button>