<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FileRequest;
use App\Models\Candidate;
use App\Models\CandidateFile;
use App\Models\File;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Candidate $candidate)
    {
        $candidate->load('candidateFiles.file');

        $files = File::all();

        return view('admin.pages.file.index', compact('candidate', 'files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FileRequest $request
     * @param Candidate $candidate
     * @param File $file
     * @return Application|RedirectResponse|Redirector
     */
    public function update(FileRequest $request, Candidate $candidate, File $file)
    {
        CandidateFile::updateOrCreate([
            "candidate_id" => $candidate->id,
            "file_id" => $file->id,
        ], [
            "status" => $request->route('status'),
            "description" => $request->description,
        ]);

        return redirect(route('admins.candidates.files.index', $candidate))->with('success', 'Berhasil mengubah status');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
