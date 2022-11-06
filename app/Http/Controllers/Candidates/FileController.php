<?php

namespace App\Http\Controllers\Candidates;

use App\Http\Controllers\Controller;
use App\Http\Requests\Candidate\FileRequest;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $files = File::with(["candidateFile" => function ($query) {
            $query->where('candidate_id', auth('candidate')->id());
        }])->get();

        return view('candidate.pages.file.index', compact('files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FileRequest $request
     * @param File $file
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(FileRequest $request, File $file)
    {
        $file->candidateFile()->create([
            "filename"     => $request->file("file_{$file->id}"),
            "candidate_id" => auth('candidate')->id(),
        ]);

        return redirect(route('candidates.files.index'))->with('success', 'Berhasil mengunggah berkas');
    }
}
