<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClothingInstructionRequest;
use App\Models\ClothingInstruction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class ClothingInstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $clothing = ClothingInstruction::first();

        return view('admin.pages.clothing_instruction.form', compact('clothing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClothingInstructionRequest $request
     * @param ClothingInstruction $clothingInstruction
     * @return Application|RedirectResponse|Redirector
     */
    public function update(ClothingInstructionRequest $request, ClothingInstruction $clothingInstruction)
    {
        $clothingInstruction->update($request->validated());

        return redirect(route('admins.clothing-instructions.index'))->with('success', 'Petunjuk pakaian berhasil diubah');
    }
}
