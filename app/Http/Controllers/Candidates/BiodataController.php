<?php

namespace App\Http\Controllers\Candidates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $candidate = auth('candidate')->user();
        $candidate->load('polda', 'polres', 'education', 'candidateParents');

        return view('candidate.pages.biodata.index', compact('candidate'));
    }
}
