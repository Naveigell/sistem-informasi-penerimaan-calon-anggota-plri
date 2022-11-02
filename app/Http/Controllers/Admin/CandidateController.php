<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $candidates = Candidate::with('candidateParents', 'education', 'polres', 'polda')->latest()->paginate(10);

        return view('admin.pages.candidate.index', compact('candidates'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Candidate $candidate)
    {
        $candidate->load('polda', 'polres', 'education', 'candidateParents');

        return view('admin.pages.candidate.form', compact('candidate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Candidate $candidate
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();

        return redirect(route('admins.candidates.index'))->with('success', 'Peserta Berhasil Dihapus');
    }
}
