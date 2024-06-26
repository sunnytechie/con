<?php

namespace App\Exports;

use App\Models\Testimony;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TestimonyExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $exportMethod;

    public function __construct($exportMethod)
    {
        $this->exportMethod = $exportMethod;
    }
    public function collection()
    {
        if ($this->exportMethod == "thismonth") {
            return Testimony::select('email', 'fullname', 'title', 'body', 'created_at')->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))->get();
        } else {
            return Testimony::select('email', 'fullname', 'title', 'body', 'created_at')->get();
        }
    }

    public function headings(): array
    {
        return [
            'Email',
            'Fullname',
            'Subject',
            'Message',
            'Date created',
        ];
    }
}
