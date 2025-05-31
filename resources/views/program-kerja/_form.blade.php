<div class="mb-3">
    <label for="departemen" class="form-label">Departemen</label>
    <select name="departemen" id="departemen" class="form-select" required>
        <option value="">-- Pilih Departemen --</option>
        @php
            $departemenList = ['Sumberdaya manusia', 'Sosial dan hubungan masyarakat', 'Minat dan bakat', 'Keagamaan'];
        @endphp
        @foreach ($departemenList as $item)
            <option value="{{ $item }}"
                {{ old('departemen', $programKerja->departemen ?? '') === $item ? 'selected' : '' }}>
                {{ $item }}
            </option>
        @endforeach
    </select>
</div>


<div class="mb-3">
    <label for="program_kerja" class="form-label">Program Kerja</label>
    <input type="text" name="program_kerja" id="program_kerja" class="form-control"
        value="{{ old('program_kerja', $programKerja->program_kerja ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="keterangan" class="form-label">Keterangan</label>
    <textarea name="keterangan" id="keterangan" rows="3" class="form-control" required>{{ old('keterangan', $programKerja->keterangan ?? '') }}</textarea>
</div>

<input type="hidden" name="urutan" id="urutan" value="1">
