<h4 class="my-4">{{ $title }}</h4>
<div class="form-group">
    <label>* Nama</label>
    <input type="text" name="{{ $type }}[name]" value="{{ $parent->name }}" class="form-control" readonly>
</div>

<div class="row">
    <div class="col-5">
        <div class="form-group">
            <label>* Agama</label>
            <select name="{{ $type }}[religion]" id="" class="form-control" readonly>
                <x-forms.option-placeholder></x-forms.option-placeholder>
                <option value="" selected>{{ config('static.religion.' . $parent->religion) }}</option>
            </select>
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            <label>* Umur</label>
            <input type="number" min="1" name="{{ $type }}[age]" value="{{ $parent->age }}" class="form-control" readonly>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-5">
        <div class="form-group">
            <label>* No Hp</label>
            <input type="tel" name="{{ $type }}[phone]" value="{{ $parent->phone }}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            <label>Telp Rumah</label>
            <input type="tel" name="{{ $type }}[landline_phone]" value="{{ $parent->landline_phone }}" class="form-control" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label>* Alamat</label>
    <textarea name="{{ $type }}[address]" id="" cols="30" rows="40" class="form-control" style="resize: none; min-height: 150px;" readonly>{{ $parent->address }}</textarea>
</div>
<div class="form-group">
    <label>Kelompok Pekerjaan</label>
    <input type="text" name="{{ $type }}[work_group]" value="{{ $parent->work_group }}" class="form-control" readonly>
</div>
<div class="form-group">
    <label>Jenis Pekerjaan</label>
    <input type="text" name="{{ $type }}[type_of_work]" value="{{ $parent->type_of_work }}" class="form-control" readonly>
</div>
<div class="form-group">
    <label>Pangkat / Golongan</label>
    <input type="text" name="{{ $type }}[grade]" value="{{ $parent->grade ?? '-' }}" class="form-control" readonly>
</div>
<div class="form-group">
    <label>Jabatan</label>
    <input type="text" name="{{ $type }}[position]" value="{{ $parent->position ?? '-' }}" class="form-control" readonly>
</div>

<div class="row">
    <div class="col-5">
        <div class="form-group">
            <label>Nama Kantor</label>
            <input type="text" name="{{ $type }}[office_name]" value="{{ $parent->office_name ?? '-' }}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            <label>Telp Kantor</label>
            <input type="text" name="{{ $type }}[office_phone]" value="{{ $parent->office_phone ?? '-' }}" class="form-control" readonly>
        </div>
    </div>
</div>

<div class="form-group">
    <label>Alamat Kantor</label>
    <textarea name="{{ $type }}[office_address]" id="" cols="30" rows="40" class="form-control" style="resize: none; min-height: 150px;" readonly>{{ $parent->office_address ?? '-' }}</textarea>
</div>
