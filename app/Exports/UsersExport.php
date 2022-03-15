<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Enquiry;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

        protected $fromDate;
        protected $toDate;

        function __construct($fromDate,$toDate) {
            $this->fromDate = $fromDate;
            $this->toDate = $toDate;
    }


    public function collection()
    {
           $query = Enquiry::select("*")->whereBetween('created_at', [$this->fromDate, $this->toDate])->get();
        return $query;
    }


    public function headings(): array
    {
        return ['Id','Name','Location','Phone','Email','Vechile/Service','Purpose', 'Created At'];
    }
}
