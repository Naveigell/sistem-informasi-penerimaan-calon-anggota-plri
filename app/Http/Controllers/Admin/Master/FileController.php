<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Master\FileRequest;
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
        $files = File::paginate(10);

        return view('admin.pages.master.file.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.pages.master.file.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FileRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(FileRequest $request)
    {
        File::create($request->validated());

        return redirect(route('admins.master.files.index'))->with('success', 'Berkas wajib berhasil ditambah');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(File $file)
    {
        return view('admin.pages.master.file.form', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FileRequest $request
     * @param \App\Models\File $file
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(FileRequest $request, File $file)
    {
        $file->update($request->validated());

        return redirect(route('admins.master.files.index'))->with('success', 'Berkas wajib berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(File $file)
    {
        $file->delete();

        return redirect(route('admins.master.files.index'))->with('success', 'Berkas wajib berhasil dihapus');
    }
}
