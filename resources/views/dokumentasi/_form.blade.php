<div class="mb-3">
    <label for="judul" class="form-label">Judul</label>
    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror"
        value="{{ old('judul', $dokumentasi->judul ?? '') }}" required>
    @error('judul')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi', $dokumentasi->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="file" class="form-label">File (pdf, jpg, png)</label>
    <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror"
        accept=".pdf,.jpg,.png">
    @error('file')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    @if (!empty($dokumentasi->file_path))
        <small class="text-muted">File saat ini: <a href="{{ asset('storage/' . $dokumentasi->file_path) }}"
                target="_blank">Lihat File</a></small>
    @endif
</div>
