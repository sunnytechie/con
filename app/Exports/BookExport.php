<?php

namespace App\Exports;

use App\Models\PurchasedBook;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookExport implements FromCollection, WithHeadings
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
            return PurchasedBook::select('book_title', 'email', 'price', 'transaction_ref', 'payment_status', 'created_at')->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))->get();
        } else {
            return PurchasedBook::select('book_title', 'email', 'price', 'transaction_ref', 'payment_status', 'created_at')->get();
        }
    }

    public function headings(): array
    {
        return [
            'Title',
            'Email',
            'Price',
            'TransactionRef',
            'PaymentStatus',
            'DateCreated',
        ];
    }
}
