<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RegistrationProcedureRequest;
use App\Models\RegistrationProcedure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegistrationProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $procedure = RegistrationProcedure::first();

        return view('admin.pages.registration_procedure.form', compact('procedure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RegistrationProcedureRequest $request
     * @param RegistrationProcedure $registrationProcedure
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(RegistrationProcedureRequest $request, RegistrationProcedure $registrationProcedure)
    {
        $registrationProcedure->update($request->validated());

        return redirect(route('admins.registration-procedures.index'))->with('success', 'Tata cara pendaftaran berhasil diubah');
    }
}
