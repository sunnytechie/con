<?php

namespace App\Http\Controllers\Api\V23;

use App\Models\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class PDFController extends Controller
{
    //list pdfs
    public function indexPaid()
    {
        $pdfs = Book::where('tag', null)
                    ->where('type', 'Paid')->get();

        return response()->json([
            'success' => true,
            'message' => 'List of pdfs',
            'data' => $pdfs
        ], 200);
    }

    public function indexFree() {
        $pdfs = Book::where('tag', null)
                    ->where('type', 'Free')->get();

        return response()->json([
            'success' => true,
            'message' => 'List of pdfs',
            'data' => $pdfs
        ], 200);
    }

    //list pdfs by tag
    public function indexByTag()
    {
        $tag = "Anglicanism";
        $pdfs = Book::where('tag', $tag)->get();

        return response()->json([
            'success' => true,
            'message' => 'List of pdfs',
            'data' => $pdfs
        ], 200);
    }
}