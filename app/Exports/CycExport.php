<?php

namespace App\Exports;

use App\Models\Purchasecyc;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CycExport implements FromCollection, WithHeadings
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
            return Purchasecyc::select('email', 'price', 'transaction_ref', 'payment_status', 'created_at')->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))->get();
        } else {
            return Purchasecyc::select('email', 'price', 'transaction_ref', 'payment_status', 'created_at')->get();
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
