<?php

namespace App\Exports;

use App\Models\Purchasedstudy;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DevotionalExport implements FromCollection, WithHeadings
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
            return Purchasedstudy::select('study_title', 'email', 'price', 'transaction_ref', 'payment_status', 'valid_year', 'created_at')->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))->get();
        } else {
            return Purchasedstudy::select('study_title', 'email', 'price', 'transaction_ref', 'payment_status', 'valid_year', 'created_at')->get();
        }
    }

    public function headings(): array
    {
        return [
            'Devotional',
            'Email',
            'Price',
            'TransactionRef',
            'PaymentStatus',
            'Validity',
            'DateCreated',
        ];
    }
}
