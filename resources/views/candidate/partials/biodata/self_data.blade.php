<div class="form-group">
    <div class="text text-center">
        <img src="{{ $candidate->avatar_url }}"
             alt=""
             width="200px"
             height="230px">
    </div>
    <div class="text text-center mt-2">
        <span class="">Foto Diri</span>
    </div>
</div>
<div class="form-group">
    <label>Nama Lengkap</label>
    <input type="text" value="{{ $candidate->name }}" name="name" class="form-control" readonly>
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" value="{{ $candidate->email }}" name="email" class="form-control" readonly>
</div>
<div class="row">
    <div class="col-5">
        <div class="form-group">
            <label>Tinggi (cm)</label>
            <input type="number" min="1" value="{{ $candidate->height }}" name="height" class="form-control" readonly>
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            <label>Berat (kg)</label>
            <input type="number" min="1" value="{{ $candidate->weight }}" name="weight" class="form-control" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-5">
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" value="{{ $candidate->birth_place }}" name="birth_place" class="form-control" readonly>
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" value="{{ $candidate->birth_date->format('Y-m-d') }}" name="birth_date" class="form-control" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-5">
        <div class="form-group">
            <label>Agama</label>
            <select name="religion" id="" class="form-control" readonly>
                <x-forms.option-placeholder></x-forms.option-placeholder>
                <option value="" selected>{{ config('static.religion.' . $candidate->religion) }}</option>
            </select>
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            <label>Suku</label>
            <input value="{{ $candidate->ethnic }}" type="text" name="ethnic" class="form-control" readonly>
        </div>
    </div>
</div>
<div class="form-group">
    <label>Jenis Kelamin</label>
    <select name="gender" id="" class="form-control" readonly>
        <x-forms.option-placeholder></x-forms.option-placeholder>
        <option value="" selected>{{ config('static.gender.' . $candidate->gender) }}</option>
    </select>
</div>
<div class="form-group">
    <label>Alamat</label>
    <textarea name="address" id="" cols="30" rows="40" class="form-control" style="resize: none; min-height: 150px;" readonly>{{ $candidate->address }}</textarea>
</div>
<div class="row">
    <div class="col-5">
        <div class="form-group">
            <label>Kabupaten/Kota</label>
            <input type="text" value="{{ $candidate->city }}" name="city" class="form-control" readonly>
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            <label>Telepon</label>
            <input type="tel" value="{{ $candidate->phone }}" name="phone" class="form-control" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-5">
        <div class="form-group">
            <label>No KTP / NIK</label>
            <input type="text" value="{{ $candidate->identity_card }}" name="identity_card" class="form-control" readonly>
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            <label>Tanggal Pembuatan KTP</label>
            <input type="date" value="{{ $candidate->identity_card_creation_date->format('Y-m-d') }}" name="identity_card_creation_date" class="form-control" readonly>
        </div>
    </div>
</div>
