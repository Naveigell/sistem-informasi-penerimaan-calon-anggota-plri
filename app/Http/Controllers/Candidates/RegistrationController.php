<?php

namespace App\Http\Controllers\Candidates;

use App\Http\Controllers\Controller;
use App\Http\Requests\Candidate\RegistrationRequest;
use App\Models\Candidate;
use App\Models\CandidateParent;
use App\Models\Education;
use App\Models\Polda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Throwable
     */
    public function create(Request $request)
    {
        abort_if(
            !in_array($request->route('type'), [Candidate::REGISTRATION_AKPOL, Candidate::REGISTRATION_SIPSS, Candidate::REGISTRATION_BINTARA, Candidate::REGISTRATION_TAMTAMA]), 404
        );

        $poldas = Polda::all();

        return view('candidate.pages.registration.form', compact('poldas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(RegistrationRequest $request)
    {
        DB::transaction(function () use ($request) {
            $candidate = Candidate::create($request->validated());

            $education = new Education($request->validated());
            $education->candidate()->associate($candidate)->save();

            $parents = [
                "father" => $request->get('father') + ["candidate_id" => $candidate->id, "parent_type" => CandidateParent::TYPE_FATHER],
                "mother" => $request->get('mother') + ["candidate_id" => $candidate->id, "parent_type" => CandidateParent::TYPE_MOTHER],
            ];

            if ($this->allBasicFieldIsFilled($request)) {
                $parents['guidance'] = $request->get('guidance') + ["candidate_id" => $candidate->id, "parent_type" => CandidateParent::TYPE_GUIDANCE];
            }

            $candidate->candidateParents()->createMany($parents);
        });

        return redirect(route('home'))->with('success', 'Terimakasih, pendaftaran berhasil dilakukan');
    }

    private function allBasicFieldIsFilled(RegistrationRequest $request)
    {
        $fields = [
            'guidance.name', 'guidance.religion', 'guidance.age', 'guidance.phone', 'guidance.address',
        ];

        foreach ($fields as $field) {
            if (!$request->filled($field)) {
                return false;
            }
        }

        return true;
    }
}
