<h4 class="mb-4">1. SD</h4>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Nama SD</label>
            <input type="text" value="{{ $candidate->education->primary_school_name }}" name="primary_school_name" class="form-control" readonly>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Tahun Lulus</label>
            <input type="number" value="{{ $candidate->education->primary_school_graduated_year }}" name="primary_school_graduated_year" class="form-control" min="1" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Kota Asal</label>
            <input type="text" value="{{ $candidate->education->primary_school_city }}" name="primary_school_city" class="form-control" readonly>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Provinsi</label>
            <input type="text" value="{{ $candidate->education->primary_school_province }}" name="primary_school_province" class="form-control" min="1" readonly>
        </div>
    </div>
</div>
<h4 class="my-4">2. SMP</h4>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Nama SD</label>
            <input type="text" value="{{ $candidate->education->junior_high_school_name }}" name="junior_high_school_name" class="form-control" readonly>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Tahun Lulus</label>
            <input type="number" value="{{ $candidate->education->junior_high_school_graduated_year }}" name="junior_high_school_graduated_year" class="form-control" min="1" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Kota Asal</label>
            <input type="text" value="{{ $candidate->education->junior_high_school_city }}" name="junior_high_school_city" class="form-control" readonly>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Provinsi</label>
            <input type="text" value="{{ $candidate->education->junior_high_school_province }}" name="junior_high_school_province" class="form-control" min="1" readonly>
        </div>
    </div>
</div>
<h4 class="my-4">3. SMA/MA/SMK</h4>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Nama SD</label>
            <input type="text" value="{{ $candidate->education->senior_high_school_name }}" name="senior_high_school_name" class="form-control" readonly>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Tahun Lulus</label>
            <input type="number" value="{{ $candidate->education->senior_high_school_graduated_year }}" name="senior_high_school_graduated_year" class="form-control" min="1" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Kota Asal</label>
            <input type="text" value="{{ $candidate->education->senior_high_school_city }}" name="senior_high_school_city" class="form-control" readonly>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Provinsi</label>
            <input type="text" value="{{ $candidate->education->senior_high_school_province }}" name="senior_high_school_province" class="form-control" min="1" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-5">
        <div class="form-group">
            <label>Jurusan SMA/SMK</label>
            <input type="text" value="{{ $candidate->education->senior_high_school_department }}" name="senior_high_school_department" class="form-control" readonly>
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            <label>NEM/Nilai UAN</label>
            <input type="number" value="{{ $candidate->education->senior_high_school_exam_score }}" name="senior_high_school_exam_score" class="form-control" min="1" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-5">
        <div class="form-group">
            <label class="d-block">Menggunakan Ijazah</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" disabled name="senior_high_school_certificate" id="certificate1" @if ($candidate->education->senior_high_school_certificate == 'sma') checked @endif value="sma">
                <label class="form-check-label" for="certificate1">SMA</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" disabled name="senior_high_school_certificate" id="certificate2" @if ($candidate->education->senior_high_school_certificate == 'ma') checked @endif value="ma">
                <label class="form-check-label" for="certificate2">MA</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" disabled name="senior_high_school_certificate" id="certificate3" @if ($candidate->education->senior_high_school_certificate == 'smk') checked @endif value="smk">
                <label class="form-check-label" for="certificate3">SMK</label>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            <label>Raport</label>
            <input type="number" value="{{ $candidate->education->senior_high_school_report }}" name="senior_high_school_report" class="form-control" min="1" readonly>
        </div>
    </div>
</div>
