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
    <label for="departemen" class="form-label">Departemen</label>
    <select name="departemen" id="departemen" class="form-select" required>
        <option value="">-- Pilih Departemen --</option>
        @php
            $departemenList = ['Sumberdaya manusia', 'Sosial dan hubungan masyarakat', 'Minat dan bakat', 'Keagamaan'];
        @endphp
        @foreach ($departemenList as $item)
            <option value="{{ $item }}"
                {{ old('departemen', $data->departemen ?? '') === $item ? 'selected' : '' }}>
                {{ $item }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Urutan</label>
    <input type="number" class="form-control" name="urutan" value="{{ $data->urutan ?? 0 }}">
</div>
