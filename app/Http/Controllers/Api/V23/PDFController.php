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
                    ->where('type', 1)->get();

        return response()->json([
            'status' => true,
            'message' => 'List of pdfs',
            'data' => $pdfs
        ], 200);
    }

    public function indexFree() {
        $pdfs = Book::where('tag', null)
                    ->where('type', 0)->get();

        return response()->json([
            'status' => true,
            'message' => 'List of pdfs',
            'data' => $pdfs
        ], 200);
    }

    //list pdfs by tag
    public function indexByTag(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tag' => 'required',
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "specify: anglicanism, teachers, workbook, others",
            ], 400);
        }

        $pdfs = Book::where('tag', $request->tag)->get();

        return response()->json([
            'status' => true,
            'message' => 'List of pdfs',
            'data' => $pdfs
        ], 200);
    }
}
