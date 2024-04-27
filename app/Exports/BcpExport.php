<?php

namespace App\Exports;

use App\Models\Bcppurchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BcpExport implements FromCollection, WithHeadings
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
            return Bcppurchase::select('email', 'price', 'transaction_ref', 'transaction_status', 'created_at')->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))->get();
        } else {
            return Bcppurchase::select('email', 'price', 'transaction_ref', 'transaction_status', 'created_at')->get();
        }
    }

    public function headings(): array
    {
        return [
            'Email',
            'Price',
            'Transaction Ref',
            'Payment Status',
            'Date created',
        ];
    }
}
