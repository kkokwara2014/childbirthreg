<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use App\Childreg;

class PdfController extends Controller
{
    public function print($id){
        $birthreg=Childreg::find($id);
        $pdf=PDF::loadView('admin.birthreg.cert',['birthreg'=>$birthreg])->setPaper('a4','portrait');
        $fileName=$birthreg->certnumber;

        return $pdf->stream($fileName.'.pdf');
    }
}
