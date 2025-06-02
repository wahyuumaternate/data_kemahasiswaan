<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $bem->nama ?? '') }}" required>
</div>
<div class="mb-3">
    <label>NPM</label>
    <input type="text" name="npm" class="form-control" value="{{ old('npm', $bem->npm ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Program Studi</label>
    <input type="text" name="program_studi" class="form-control"
        value="{{ old('program_studi', $bem->program_studi ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Jurusan</label>
    <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan', $bem->jurusan ?? '') }}"
        required>
</div>
<div class="mb-3">
    <label>Angkatan</label>
    <input type="text" name="angkatan" class="form-control" value="{{ old('angkatan', $bem->angkatan ?? '') }}"
        required>
</div>
<div class="mb-3">
    <label>Departemen yang dipilih</label>
    <input type="text" name="departemen" class="form-control" value="{{ old('departemen', $bem->departemen ?? '') }}"
        required>
</div>
<div class="mb-3">
    <label>Alamat</label>
    <textarea name="alamat" class="form-control" required>{{ old('alamat', $bem->alamat ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label>Upload KTM</label>
    <input type="file" name="ktm" class="form-control" {{ isset($bem) ? '' : 'required' }}>
    @if (isset($bem) && $bem->ktm)
        <div class="mt-2">
            <img src="{{ asset('storage/' . $bem->ktm) }}" alt="Foto" class="img-thumbnail" width="100">
            <br>
            <a href="{{ asset('storage/' . $bem->ktm) }}" target="_blank" class="btn btn-sm btn-outline-info">
                Lihat KTM
            </a>
        </div>
    @endif
</div>

<div class="mb-3">
    <label>Upload Foto</label>
    <input type="file" name="foto" class="form-control" {{ isset($bem) ? '' : 'required' }}>
    @if (isset($bem) && $bem->foto)
        <div class="mt-2">
            <img src="{{ asset('storage/' . $bem->foto) }}" alt="Foto" class="img-thumbnail" width="100">
            <br>
            <a href="{{ asset('storage/' . $bem->foto) }}" target="_blank" class="btn btn-sm btn-outline-info mt-1">
                Lihat Ukuran Asli
            </a>
        </div>
    @endif
</div>

<div class="mb-3">
    <label>Alasan</label>
    <textarea name="alasan" class="form-control" required>{{ old('alasan', $bem->alasan ?? '') }}</textarea>
</div>
