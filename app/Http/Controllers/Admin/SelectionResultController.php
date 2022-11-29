<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SelectionResultRequest;
use App\Models\Candidate;
use App\Models\Schedule;
use App\Models\SelectionResult;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;

class SelectionResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Candidate $candidate)
    {
        $schedules = Schedule::with(['selectionResult' => function ($query) use($candidate) {
            $query->where('candidate_id', $candidate->id);
        }])->get();

        return view('admin.pages.selection_result.index', compact('candidate', 'schedules'));
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
     * @param SelectionResultRequest $request
     * @param Candidate $candidate
     * @return Application|RedirectResponse|Redirector
     */
    public function store(SelectionResultRequest $request, Candidate $candidate)
    {
        DB::transaction(function () use ($request, $candidate) {
            SelectionResult::query()->where('candidate_id', $candidate->id)->delete();

            $candidate->selectionResults()->createMany($request->input('results'));
        });

        return redirect(route('admins.candidates.selection-results.index', compact('candidate')))->with('success', 'Berhasil mengubah nilai perserta');
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
