<div class="form-group">
    <label>Nama Lengkap</label>
    <input type="text" disabled value="{{ old('name', $candidate->name) }}" name="name" class="form-control @error("name") is-invalid @enderror">
    @error("name")
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" disabled value="{{ old('email', $candidate->email) }}" name="email" class="form-control @error("email") is-invalid @enderror">
    @error("email")
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Tinggi (cm)</label>
            <input type="number" min="1" disabled value="{{ old('height', $candidate->height) }}" name="height" class="form-control @error("height") is-invalid @enderror">
            @error("height")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Berat (kg)</label>
            <input type="number" min="1" disabled value="{{ old('weight', $candidate->weight) }}" name="weight" class="form-control @error("weight") is-invalid @enderror">
            @error("weight")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" disabled value="{{ old('birth_place', $candidate->birth_place) }}" name="birth_place" class="form-control @error("birth_place") is-invalid @enderror">
            @error("birth_place")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" disabled value="{{ old('birth_date', $candidate->birth_date->format('Y-m-d')) }}" name="birth_date" class="form-control @error("birth_date") is-invalid @enderror">
            @error("birth_date")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Agama</label>
            <select disabled name="religion" id="" class="form-control @error("religion") is-invalid @enderror">
                <x-forms.option-placeholder></x-forms.option-placeholder>
                @foreach(config('static.religion') as $index => $religion)
                    <option @if ($index == old("religion", $candidate->religion)) selected @endif value="{{ $index }}">{{ ucwords($religion) }}</option>
                @endforeach
            </select>
            @error("religion")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Suku</label>
            <input disabled value="{{ old('ethnic', $candidate->ethnic) }}" type="text" name="ethnic" class="form-control @error("ethnic") is-invalid @enderror">
            @error("weight")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="form-group">
    <label>Jenis Kelamin</label>
    <select disabled name="gender" id="" class="form-control @error("gender") is-invalid @enderror">
        <x-forms.option-placeholder></x-forms.option-placeholder>
        <option @if (old('gender', $candidate->gender) == 'male') selected @endif value="male">Laki - laki</option>
        <option @if (old('gender', $candidate->gender) == 'female') selected @endif value="female">Perempuan</option>
    </select>
    @error("gender")
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Alamat</label>
    <textarea disabled name="address" id="" cols="30" rows="40" class="form-control @error("address") is-invalid @enderror" style="resize: none; min-height: 150px;">{{ old('address', $candidate->address) }}</textarea>
    @if($errors->has('address'))
        <div class="invalid-feedback">{{ $errors->first('address') }}</div>
    @else
{{--        <small class="text text-muted">* Isian alamat harap tidak menekan tombol "Enter", cukup tombol "Space" jika isian alamat panjang</small>--}}
    @endif
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Kabupaten/Kota</label>
            <input disabled type="text" value="{{ old('city', $candidate->city) }}" name="city" class="form-control @error("city") is-invalid @enderror">
            @error("city")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Telepon</label>
            <input disabled type="tel" value="{{ old('phone', $candidate->phone) }}" name="phone" class="form-control @error("phone") is-invalid @enderror">
            @error("phone")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label>No KTP / NIK</label>
            <input disabled type="text" value="{{ old('identity_card', $candidate->identity_card) }}" name="identity_card" class="form-control @error("identity_card") is-invalid @enderror">
            @error("identity_card")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Tanggal Pembuatan KTP</label>
            <input disabled type="date" value="{{ old('identity_card_creation_date', $candidate->identity_card_creation_date) }}" name="identity_card_creation_date" class="form-control @error("identity_card_creation_date") is-invalid @enderror">
            @error("identity_card_creation_date")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
