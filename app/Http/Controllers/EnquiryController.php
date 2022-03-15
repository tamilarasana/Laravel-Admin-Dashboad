<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $enquirys=   Enquiry::orderBy('id', 'DESC')->simplepaginate(15);

        $enquirys = Enquiry::all();
        return view('enquiry.index',compact('enquirys'));
    }


    public function export(Request $request)
    {
        $fromDate = $request->input('from');
        $toDate = $request->input('to');
        return Excel::download(new UsersExport($fromDate,$toDate), 'enquiry.xls');
    }
}
