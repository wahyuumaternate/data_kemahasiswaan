@php
    $data = isset($pengurus) ? $pengurus : null;
@endphp

<div class="mb-3">
    <label class="form-label">Jabatan</label>
    <input type="text" class="form-control" name="jabatan" value="{{ $data->jabatan ?? '' }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" class="form-control" name="nama" value="{{ $data->nama ?? '' }}">
</div>
<div class="mb-3">
    <label class="form-label">NPM</label>
    <input type="text" class="form-control" name="npm" value="{{ $data->npm ?? '' }}">
</div>
<div class="mb-3">
    <label class="form-label">Angkatan</label>
    <input type="text" class="form-control" name="angkatan" value="{{ $data->angkatan ?? '' }}">
</div>
<div class="mb-3">
    <label class="form-label">Departemen</label>
    <input type="text" class="form-control" name="departemen" value="{{ $data->departemen ?? '' }}">
</div>
<div class="mb-3">
    <label class="form-label">Urutan</label>
    <input type="number" class="form-control" name="urutan" value="{{ $data->urutan ?? 0 }}">
</div>
