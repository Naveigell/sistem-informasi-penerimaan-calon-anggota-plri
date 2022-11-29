<?php

namespace App\Imports;

use App\Models\Schedule;
use App\Models\SelectionResult;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class SelectionResultImport implements ToCollection, ToModel
{
    /**
     * @var Schedule $schedule
     */
    private $schedule;

    /**
     * @var string
     */
    private $filename;

    /**
     * Determine current row index
     *
     * @var int
     */
    private $index = 0;

    public function __construct(Schedule $schedule, $filename)
    {
        $this->schedule = $schedule;
        $this->filename = $filename;
    }

    /**
     * @param Collection $collection
     * @return Collection
     */
    public function collection(Collection $collection)
    {
        return $collection;
    }

    public function model(array $row)
    {
        $this->index++;

        if ($this->index == 2) {

            return new SelectionResult([
                "schedule_id"  => $this->schedule->id,
                "candidate_id" => auth('candidate')->id(),
                "filename"     => $this->filename,
                "value"        => $row[3]
            ]);
        }

        return null;
    }
}
