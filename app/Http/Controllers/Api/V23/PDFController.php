<?php

namespace App\Http\Controllers\Api\V23;

use App\Models\Pdf;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PurchasedBook;
use App\Http\Controllers\Controller;
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
        $pdfs = Book::where('tag', "others")
                    ->where('type', 0)->get();

        return response()->json([
            'status' => true,
            'message' => 'List of pdfs',
            'data' => $pdfs
        ], 200);
    }

    //list pdfs by tag
    public function indexByTag(Request $request, $user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => "User not found",
            ], 400);
        }
        $userEmail = $user->email;

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

        $books = Book::where('tag', $request->tag)
                    ->where('type', 1)
                    ->get();

        $bookData = [];
        foreach ($books as $book) {
            $purchasedBook = PurchasedBook::where('email', $userEmail)->where('book_id', $book->id)->first();
            // Check if the book is purchased
            $access = $purchasedBook ? true : false;

            // Add book data along with the access status to an array
            $bookData[] = [
                'access' => $access,
                'id' => $book->id,
                'title' => $book->title,
                'description' => $book->description,
                'image' => $book->image,
                'file' => $book->file,
                'price' => $book->price,
                'tag' => $book->tag,
            ];
        }

        return response()->json([
            'status' => true,
            'message' => "List of $request->tag",
            'data' => $bookData
        ], 200);
    }
}
