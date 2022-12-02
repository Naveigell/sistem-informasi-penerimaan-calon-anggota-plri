<?php

namespace App\Views;

use App\Models\ClothingInstruction;
use Illuminate\View\View;

class ClothingInstructionComposer
{
    public function compose(View $view)
    {
        $clothing = ClothingInstruction::first();

        $view->with('clothing', $clothing);
    }
}
