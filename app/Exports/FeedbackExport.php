<?php

namespace App\Exports;

use App\Models\Feedback;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FeedbackExport implements FromCollection, WithHeadings
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
            return Feedback::select('feedback_type', 'user_fullname', 'user_email', 'feedback_msg', 'created_at')->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))->get();
        } else {
            return Feedback::select('feedback_type', 'user_fullname', 'user_email', 'feedback_msg', 'created_at')->get();
        }
    }

    public function headings(): array
    {
        return [
            'Subject',
            'Fullname',
            'Email',
            'Message',
            'Date submitted',
        ];
    }
}
