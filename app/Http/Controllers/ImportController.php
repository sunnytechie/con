<?php

namespace App\Http\Controllers;

use App\Imports\BookImport;
use App\Exports\UsersExport;
use App\Imports\MediaImport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Imports\CommentImport;
use App\Imports\PaymentImport;
use App\Exports\DonationExport;
use App\Imports\DonationImport;
use App\Exports\TestimonyExport;
use App\Imports\TestimonyImport;
use App\Exports\PurchasedBookExport;
use App\Imports\PurchasedBookImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{

    public function index()
    {
        return view('excel.index');
    }

    //Import users from Excel file
    public function userImport(Request $request) 
    {
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Users imported successfully.');
    }

    //Import media from Excel file
    public function mediaImport(Request $request) 
    {
        Excel::import(new MediaImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Media imported successfully.');
    }

    //Import books from Excel file
    public function bookImport(Request $request) 
    {
        Excel::import(new BookImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Books imported successfully.');
    }

    //Import comment from excel file
    public function commentImport(Request $request) 
    {
        Excel::import(new CommentImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Comments imported successfully.');
    }

    //Import testimony from excel file
    public function testimonyImport(Request $request) 
    {
        Excel::import(new TestimonyImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Testimonies imported successfully.');
    }

    //Import Donation from Excel file
    public function donationImport(Request $request) 
    {
        Excel::import(new DonationImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Donations imported successfully.');
    }

    //Import PurchasedBooks from Excel file
    public function PurchasedBookImport(Request $request) 
    {
        Excel::import(new PurchasedBookImport, $request->file('file')->store('temp'));
        return back()->with('success', 'PurchasedBooks imported successfully.');
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function userExport() 
    {
        return Excel::download(new UsersExport, 'users-collection.xlsx');
    }

    public function donationExport() 
    {
        return Excel::download(new DonationExport, 'donation-collection.xlsx');
    }

    public function purchasedbookExport() 
    {
        return Excel::download(new PurchasedBookExport, 'purchased-book-collection.xlsx');
    }

    public function testimonyExport(Request $request) 
    {
        return Excel::download(new TestimonyExport, 'testimony-collection.xlsx');
    }
}
