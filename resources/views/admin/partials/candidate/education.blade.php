<h4 class="mb-4">1. SD</h4>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Nama SD</label>
            <input type="text" disabled value="{{ old('primary_school_name', $candidate->education->primary_school_name) }}" name="primary_school_name" class="form-control @error("primary_school_name") is-invalid @enderror">
            @error("primary_school_name")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Tahun Lulus</label>
            <input type="number" disabled value="{{ old('primary_school_graduated_year', $candidate->education->primary_school_graduated_year) }}" name="primary_school_graduated_year" class="form-control @error("primary_school_graduated_year") is-invalid @enderror" min="1">
            @error("primary_school_graduated_year")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Kota Asal</label>
            <input type="text" disabled value="{{ old('primary_school_city', $candidate->education->primary_school_city) }}" name="primary_school_city" class="form-control @error("primary_school_city") is-invalid @enderror">
            @error("primary_school_city")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Provinsi</label>
            <input type="text" disabled value="{{ old('primary_school_province', $candidate->education->primary_school_province) }}" name="primary_school_province" class="form-control @error("primary_school_province") is-invalid @enderror" min="1">
            @error("primary_school_province")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<h4 class="my-4">2. SMP</h4>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Nama SD</label>
            <input type="text" disabled value="{{ old('junior_high_school_name', $candidate->education->junior_high_school_name) }}" name="junior_high_school_name" class="form-control @error("junior_high_school_name") is-invalid @enderror">
            @error("junior_high_school_name")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Tahun Lulus</label>
            <input type="number" disabled value="{{ old('junior_high_school_graduated_year', $candidate->education->junior_high_school_graduated_year) }}" name="junior_high_school_graduated_year" class="form-control @error("junior_high_school_graduated_year") is-invalid @enderror" min="1">
            @error("junior_high_school_graduated_year")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Kota Asal</label>
            <input type="text" disabled value="{{ old('junior_high_school_city', $candidate->education->junior_high_school_city) }}" name="junior_high_school_city" class="form-control @error("junior_high_school_city") is-invalid @enderror">
            @error("junior_high_school_city")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Provinsi</label>
            <input type="text" disabled value="{{ old('junior_high_school_province', $candidate->education->junior_high_school_province) }}" name="junior_high_school_province" class="form-control @error("junior_high_school_province") is-invalid @enderror" min="1">
            @error("junior_high_school_province")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<h4 class="my-4">3. SMA/MA/SMK</h4>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Nama SD</label>
            <input type="text" disabled value="{{ old('senior_high_school_name', $candidate->education->senior_high_school_name) }}" name="senior_high_school_name" class="form-control @error("senior_high_school_name") is-invalid @enderror">
            @error("senior_high_school_name")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Tahun Lulus</label>
            <input type="number" disabled value="{{ old('senior_high_school_graduated_year', $candidate->education->senior_high_school_graduated_year) }}" name="senior_high_school_graduated_year" class="form-control @error("senior_high_school_graduated_year") is-invalid @enderror" min="1">
            @error("senior_high_school_graduated_year")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Kota Asal</label>
            <input type="text" disabled value="{{ old('senior_high_school_city', $candidate->education->senior_high_school_city) }}" name="senior_high_school_city" class="form-control @error("senior_high_school_city") is-invalid @enderror">
            @error("senior_high_school_city")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Provinsi</label>
            <input type="text" disabled value="{{ old('senior_high_school_province', $candidate->education->senior_high_school_province) }}" name="senior_high_school_province" class="form-control @error("senior_high_school_province") is-invalid @enderror" min="1">
            @error("senior_high_school_province")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Jurusan SMA/SMK</label>
            <input type="text" disabled value="{{ old('senior_high_school_department', $candidate->education->senior_high_school_department) }}" name="senior_high_school_department" class="form-control @error("senior_high_school_department") is-invalid @enderror">
            @error("senior_high_school_department")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>NEM/Nilai UAN</label>
            <input type="number" disabled value="{{ old('senior_high_school_exam_score', $candidate->education->senior_high_school_exam_score) }}" name="senior_high_school_exam_score" class="form-control @error("senior_high_school_exam_score") is-invalid @enderror" min="1">
            @error("senior_high_school_exam_score")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label class="d-block">Menggunakan Ijazah</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" disabled type="radio" name="senior_high_school_certificate" id="certificate1" @if (old('senior_high_school_certificate', $candidate->education->senior_high_school_certificate) == 'sma') checked @endif value="sma">
                <label class="form-check-label" for="certificate1">SMA</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" disabled type="radio" name="senior_high_school_certificate" id="certificate2" @if (old('senior_high_school_certificate', $candidate->education->senior_high_school_certificate) == 'ma') checked @endif value="ma">
                <label class="form-check-label" for="certificate2">MA</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" disabled type="radio" name="senior_high_school_certificate" id="certificate3" @if (old('senior_high_school_certificate', $candidate->education->senior_high_school_certificate) == 'smk') checked @endif value="smk">
                <label class="form-check-label" for="certificate3">SMK</label>
            </div>
            @error("senior_high_school_certificate")
                <input type="hidden" class="form-control @error("senior_high_school_certificate") is-invalid @enderror">
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Raport</label>
            <input type="number" disabled value="{{ old('senior_high_school_report', $candidate->education->senior_high_school_report) }}" name="senior_high_school_report" class="form-control @error("senior_high_school_report") is-invalid @enderror" min="1">
            @if($errors->has('senior_high_school_report'))
                <div class="invalid-feedback">{{ $errors->first('senior_high_school_report') }}</div>
            @else
                <small class="text text-muted">* Rata rata nilai raport kelas 3 semester 1</small>
            @endif
        </div>
    </div>
</div>
