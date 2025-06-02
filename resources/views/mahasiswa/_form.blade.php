<div class="mb-3">
    <label for="nim" class="form-label">NIM</label>
    <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim ?? '') }}"
        required>
</div>
<div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" name="nama" id="nama" class="form-control"
        value="{{ old('nama', $mahasiswa->nama ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="jurusan" class="form-label">Jurusan</label>
    <input type="text" name="jurusan" id="jurusan" class="form-control"
        value="{{ old('jurusan', $mahasiswa->jurusan ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="angkatan" class="form-label">Angkatan</label>
    <input type="number" name="angkatan" id="angkatan" class="form-control"
        value="{{ old('angkatan', $mahasiswa->angkatan ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" id="email" class="form-control"
        value="{{ old('email', $mahasiswa->email ?? '') }}">
</div>
<div class="mb-3">
    <label for="no_hp" class="form-label">No HP</label>
    <input type="text" name="no_hp" id="no_hp" class="form-control"
        value="{{ old('no_hp', $mahasiswa->no_hp ?? '') }}">
</div>
<div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea name="alamat" id="alamat" class="form-control" rows="2">{{ old('alamat', $mahasiswa->alamat ?? '') }}</textarea>
</div>
