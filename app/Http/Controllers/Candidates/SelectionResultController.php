<?php

namespace App\Http\Controllers\Candidates;

use App\Exports\SelectionResultExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Candidate\SelectionResultRequest;
use App\Imports\SelectionResultImport;
use App\Models\Schedule;
use App\Models\SelectionResult;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;

class SelectionResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $schedules = Schedule::with(['selectionResult' => function ($query) {
            $query->where('candidate_id', auth('candidate')->id());
        }])->get();

        return view('candidate.pages.score.index', compact('schedules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SelectionResultRequest $request
     * @param Schedule $schedule
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SelectionResultRequest $request, Schedule $schedule)
    {
        $file = $request->getUploadedFile();
        $filename = $file->hashName();

        $file->storeAs('app/private/selection-results', $filename);

        SelectionResult::where([
            "schedule_id" => $schedule->id,
            "candidate_id" => auth('candidate')->id(),
        ])->delete();

        Excel::import(new SelectionResultImport($schedule, $filename), "app/private/selection-results/{$filename}");

        return redirect(route('candidates.selection-results.index'))->with('success', 'Berhasil mengupload file');
    }

    public function printTemplate()
    {
        return Excel::download(new SelectionResultExport(), "template.xlsx");
    }
}
