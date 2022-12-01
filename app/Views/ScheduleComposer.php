<?php

namespace App\Views;

use App\Models\Schedule;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class ScheduleComposer
{
    /**
     * @var Collection<Schedule>
     */
    private $schedules;

    public function compose(View $view)
    {
        if (!$this->schedules) {
            $this->schedules = Schedule::all();
        }

        $view->with('schedules', $this->schedules);
    }
}
