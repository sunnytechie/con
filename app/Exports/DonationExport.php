<?php

namespace App\Exports;

use App\Models\Donation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DonationExport implements FromCollection, WithHeadings
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
            $donations = Donation::select('name', 'email', 'description', 'amount', 'method','currency', 'created_at', 'province_id', 'diocese_id')->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))->get();

            foreach ($donations as $donation) {
                $donation->province = $donation->province->name;
                $donation->diocese = $donation->diocese->name;
                $donation->makeHidden(['province_id', 'diocese_id']);
            }

            return $donations;
        } else {
            $donations = Donation::select('name', 'email', 'description', 'amount', 'method','currency', 'created_at', 'province_id', 'diocese_id')->get();

            foreach ($donations as $donation) {
                $donation->province = $donation->province->name;
                $donation->diocese = $donation->diocese->name;
                $donation->makeHidden(['province_id', 'diocese_id']);
            }

            return $donations;
        }
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Description',
            'Amount',
            'Method',
            'Currency',
            'DateCreated',
            'Province',
            'Diocese',
        ];
    }


}
