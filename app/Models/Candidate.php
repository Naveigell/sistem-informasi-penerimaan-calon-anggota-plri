<?php

namespace App\Models;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'polda_id', 'polres_id', 'registration_number', 'password', 'name', 'type', 'email', 'height',
        'weight', 'avatar', 'gender', 'birth_place', 'religion', 'address', 'birth_date', 'ethnic',
        'city', 'phone', 'identity_card', 'identity_card_creation_date',
    ];

    const REGISTRATION_AKPOL   = 'akpol';
    const REGISTRATION_SIPSS   = 'sipss';
    const REGISTRATION_BINTARA = 'bintara';
    const REGISTRATION_TAMTAMA = 'tamtama';

    protected $casts = [
        "birth_date" => "datetime",
    ];

    /**
     * @param string|UploadedFile $file
     * @return void
     */
    public function setAvatarAttribute($file)
    {
        if (is_string($file)) {
            $this->attributes['avatar'] = $file;
        } else if ($file instanceof UploadedFile) {
            $name = date('dmYHis') . uniqid() . '.' . $file->getClientOriginalExtension();

            Storage::putFileAs('public/images/candidates', $file, $name);

            $this->attributes['avatar'] = $name;
        }
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function (Candidate $candidate) {
            $candidate->createRegistrationNumber();
        });

        self::created(function (Candidate $candidate) {
            $candidate->createPdf();
        });
    }

    private function createRegistrationNumber()
    {
        $polda      = Polda::find($this->polda_id);
        $polres     = Polres::find($this->polres_id);
        $candidates = Candidate::latest('id')->where('polres_id', $this->polres_id)->get();
        $increment  = $candidates->count() + 1;

        $registrationNumber = $polda->number .  '' . config('static.candidate_type.' . $this->type) . $polres->number . str_pad((string) $increment, 5, '0', STR_PAD_LEFT);

        $this->password            = Hash::make(date('dmY', strtotime($this->birth_date)));
        $this->registration_number = $registrationNumber;
    }

    public function createPdf()
    {
        $name               = $this->name;
        $phone              = $this->phone;
        $email              = $this->email;
        $birthday           = $this->birth_date->format('d F Y');
        $polres             = Polres::find($this->polres_id)->name;
        $avatar             = public_path("storage/images/candidates/{$this->avatar}");
        $registrationNumber = $this->registration_number;

        $pdf      = Pdf::loadView('candidate.pages.registration.pdf', compact('registrationNumber', 'name', 'phone', 'email', 'birthday', 'polres', 'avatar'));
        $filename = Str::random(30) . uniqid() . date('dmYHis') . '.pdf';

        Storage::put("public/files/pdf/candidates/{$filename}", $pdf->output());

        session()->put('candidate-pdf-url', URL::temporarySignedRoute('candidate.pdf.download', now()->addDay(), ["candidate" => $this, "filename" => $filename]));
    }

    public function downloadPdf()
    {
        return response()->download(storage_path('app/public/files/pdf/candidates/' . request()->query('filename')));
    }

    public function candidateParents()
    {
        return $this->hasMany(CandidateParent::class);
    }
}
