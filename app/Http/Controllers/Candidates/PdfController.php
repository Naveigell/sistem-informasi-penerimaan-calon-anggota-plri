<?php

namespace App\Http\Controllers\Candidates;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function onlineRegistration()
    {
        $candidate = auth('candidate')->user()->load('polres', 'polda');

        $pdf = Pdf::loadView('candidate.pages.pdf.registration', compact('candidate'));
        $pdf->setPaper('A4');

        return $pdf->stream();
    }

    public function testNumber()
    {
        $candidate = auth('candidate')->user()->load('polres', 'polda');

        $pdf = Pdf::loadView('candidate.pages.pdf.test_number', compact('candidate'));
        $pdf->setPaper('A4');

        return $pdf->stream();
    }

    public function nametag()
    {
        $candidate = auth('candidate')->user()->load('polres', 'polda');

        $pdf = Pdf::loadView('candidate.pages.pdf.nametag', compact('candidate'));
        $pdf->setPaper('A5', 'landscape');

        return $pdf->stream();
    }
}
