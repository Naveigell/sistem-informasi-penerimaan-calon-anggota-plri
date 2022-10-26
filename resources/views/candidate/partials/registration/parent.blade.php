<h4 class="my-4">{{ $title }}</h4>
<div class="form-group">
    <label>* Nama</label>
    <input type="text" name="{{ $type }}[name]" value="{{ old("{$type}.name") }}" class="form-control @error("{$type}.name") is-invalid @enderror">
    @error("{$type}.name")
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-5">
        <div class="form-group">
            <label>* Agama</label>
            <select name="{{ $type }}[religion]" id="" class="form-control @error("{$type}.religion") is-invalid @enderror">
                <x-forms.option-placeholder></x-forms.option-placeholder>
                @foreach(config('static.religion') as $index => $religion)
                    <option @if ($index == old("{$type}.religion")) selected @endif value="{{ $index }}">{{ ucwords($religion) }}</option>
                @endforeach
            </select>
            @error("{$type}.religion")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            <label>* Umur</label>
            <input type="number" min="1" name="{{ $type }}[age]" value="{{ old("{$type}.age") }}" class="form-control @error("{$type}.age") is-invalid @enderror">
            @error("{$type}.age")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-5">
        <div class="form-group">
            <label>* No Hp</label>
            <input type="text" name="{{ $type }}[phone]" value="{{ old("{$type}.phone") }}" class="form-control @error("{$type}.phone") is-invalid @enderror">
            @error("{$type}.phone")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            <label>Telp Rumah</label>
            <input type="text" name="{{ $type }}[landline_phone]" value="{{ old("{$type}.landline_phone") }}" class="form-control @error("{$type}.landline_phone") is-invalid @enderror">
            @error("{$type}.landline_phone")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label>* Alamat</label>
    <textarea name="{{ $type }}[address]" id="" cols="30" rows="40" class="form-control @error("{$type}.address") is-invalid @enderror" style="resize: none; min-height: 150px;">{{ old("{$type}.address") }}</textarea>
    @error("{$type}.address")
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Kelompok Pekerjaan</label>
    <input type="text" name="{{ $type }}[work_group]" value="{{ old("{$type}.work_group") }}" class="form-control @error("{$type}.work_group") is-invalid @enderror">
    @error("{$type}.work_group")
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Jenis Pekerjaan</label>
    <input type="text" name="{{ $type }}[type_of_work]" value="{{ old("{$type}.type_of_work") }}" class="form-control @error("{$type}.type_of_work") is-invalid @enderror">
    @error("{$type}.type_of_work")
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Pangkat / Golongan</label>
    <input type="text" name="{{ $type }}[grade]" value="{{ old("{$type}.grade") }}" class="form-control @error("{$type}.grade") is-invalid @enderror">
    @error("{$type}.grade")
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Jabatan</label>
    <input type="text" name="{{ $type }}[position]" value="{{ old("{$type}.position") }}" class="form-control @error("{$type}.position") is-invalid @enderror">
    @error("{$type}.position")
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-5">
        <div class="form-group">
            <label>Nama Kantor</label>
            <input type="text" name="{{ $type }}[office_name]" value="{{ old("{$type}.office_name") }}" class="form-control @error("{$type}.office_name") is-invalid @enderror">
            @error("{$type}.office_name")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            <label>Telp Kantor</label>
            <input type="text" name="{{ $type }}[office_phone]" value="{{ old("{$type}.office_phone") }}" class="form-control @error("{$type}.office_phone") is-invalid @enderror">
            @error("{$type}.office_phone")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label>Alamat Kantor</label>
    <textarea name="{{ $type }}[office_address]" id="" cols="30" rows="40" class="form-control @error("{$type}.office_address") is-invalid @enderror" style="resize: none; min-height: 150px;">{{ old("{$type}.office_address") }}</textarea>
    @error("{$type}.office_address")
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
