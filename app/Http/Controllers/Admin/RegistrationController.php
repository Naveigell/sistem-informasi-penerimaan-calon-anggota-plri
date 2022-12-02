<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RegistrationRequest;
use App\Models\Registration;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class RegistrationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $registrations = Registration::all();

        return view('admin.pages.registration.index', compact('registrations'));
    }

    /**
     * @param RegistrationRequest $request
     * @param Registration $registration
     * @return Application|RedirectResponse|Redirector
     */
    public function update(RegistrationRequest $request, Registration $registration)
    {
        $registration->update($request->validated());

        return redirect(route('admins.registrations.index'))->with('success', 'Registration berhasil di ' . ($request->is_active == 1 ? 'aktifkan' : 'nonaktifkan'));
    }
}
