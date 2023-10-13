<?php

namespace App\Http\Controllers\Api\V23;

use App\Models\Book;
use App\Models\User;
use App\Models\Study;
use App\Models\Purchasecyc;
use App\Models\purchasedbcp;
use Illuminate\Http\Request;
use App\Models\PurchasedBook;
use App\Models\Purchasedstudy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    //subscribeBook
    public function subscribeBook(Request $request, $user_id, $book_id) {
        //make sure user exits
        $user = User::find($user_id);
        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ], 404);
        }
        $userEmail = $user->email;

        //make sure book exits
        $book = Book::find($book_id);
        if(!$book) {
            return response()->json([
                'status' => false,
                'message' => 'Book not found',
            ], 404);
        }

        //validate request
        $validate = Validator::make($request->all(), [
            'transaction_ref' => 'required',
        ]);

        if($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validate->errors()
            ], 400);
        }

        //check if userEmail exists with book_id in purchased_books table
        $purchasedBook = PurchasedBook::where('email', $userEmail)->where('book_id', $book_id)->first();

        if($purchasedBook) {
            //check if book_id exists in purchased_books table
            $purchasedBook = PurchasedBook::where('book_id', $book_id)->where('email', $userEmail)->first();
            if($purchasedBook) {
                return response()->json([
                    'status' => false,
                    'message' => 'Book already purchased',
                ], 404);
            } else {
                //add book_id to purchased_books table
                $purchasedBook = new PurchasedBook();
                $purchasedBook->email = $userEmail;
                $purchasedBook->book_id = $book_id;
                $purchasedBook->price = $book->price;
                $purchasedBook->transaction_ref = $request->transaction_ref;
                $purchasedBook->transaction_status = 'success';
                $purchasedBook->book_title = $book->title;
                $purchasedBook->save();

                return response()->json([
                    'status' => true,
                    'message' => 'Book purchased successfully',
                ], 200);
            }
        } else {
            //add userEmail and book_id to purchased_books table
            $purchasedBook = new PurchasedBook();
            $purchasedBook->email = $userEmail;
            $purchasedBook->book_id = $book_id;
            $purchasedBook->price = $book->price;
            $purchasedBook->transaction_ref = $request->transaction_ref;
            $purchasedBook->transaction_status = 'success';
            $purchasedBook->book_title = $book->title;
            $purchasedBook->save();

            return response()->json([
                'status' => true,
                'message' => 'Book purchased successfully',
            ], 200);
            }

    }

    //subscribeStudy
    public function subscribeStudy(Request $request, $user_id) {
        //validate request
        $validate = Validator::make($request->all(), [
            'transaction_ref' => 'required',
            'year' => 'required',
            'study_id' => 'required', // 1 = Daily Fountain 2 = Bible Study 3 = Daily Dynamite
        ]);

        if($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validate->errors()
            ], 400);
        }

        //make sure user exits
        $user = User::find($user_id);
        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ], 404);
        }

        // 1 = Daily Fountain 2 = Bible Study 3 = Daily Dynamite
        switch($request->study_id) {
            case 1:
                $study = "Daily Fountain";
                break;
            case 2:
                $study = "Bible Study";
                break;
            case 3:
                $study = "Daily Dynamite";
                break;
            default:
                return response()->json([
                    'status' => false,
                    'message' => 'Study not found',
                ], 404);
        }

        //check if $user-email exists with study_id in purchased_studies table
        $purchasedStudy = new Purchasedstudy();
        $purchasedStudy->email = $user->email;
        $purchasedStudy->study_id = $request->study_id;
        $purchasedStudy->study_title = $study;
        $purchasedStudy->price = '500';
        $purchasedStudy->transaction_ref = $request->transaction_ref;
        $purchasedStudy->transaction_status = 'success';
        $purchasedStudy->valid_year = $request->year;
        $purchasedStudy->save();

        return response()->json([
            'status' => true,
            'message' => 'Subscribed successfully',
        ], 200);
    }

    //subscribeBcp
    public function subscribeBcp(Request $request, $user_id) {
        //validate request
        $validate = Validator::make($request->all(), [
            'transaction_ref' => 'required',
            'price' => 'required',
        ]);

        if($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validate->errors()
            ], 400);
        }

        //make sure user exits
        $user = User::find($user_id);
        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ], 404);
        }

        //check if $user-email exists with bcp_id in purchased_bcps table
        $purchasedBcp = new Purchasedbcp(); //If an error happens just recreate another model for this.
        $purchasedBcp->email = $user->email;
        $purchasedBcp->price = $request->price;
        $purchasedBcp->transaction_ref = $request->transaction_ref;
        $purchasedBcp->transaction_status = 'success';
        $purchasedBcp->save();

        return response()->json([
            'status' => true,
            'message' => 'Subscribed successfully',
        ], 200);
    }

    //subscribeCyc
    public function subscribeCyc(Request $request, $user_id) {
        //validate request
        $validate = Validator::make($request->all(), [
            'transaction_ref' => 'required',
            'price' => 'required',
        ]);

        if($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validate->errors()
            ], 400);
        }

        //make sure user exits
        $user = User::find($user_id);
        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ], 404);
        }

        //check if $user-email exists with cyc_id in purchased_cycs table
        $purchasedCyc = new Purchasecyc();
        $purchasedCyc->email = $user->email;
        $purchasedCyc->price = $request->price;
        $purchasedCyc->transaction_ref = $request->transaction_ref;
        $purchasedCyc->payment_status = 'success';
        $purchasedCyc->cyc_id = 'nil'; //not needed
        $purchasedCyc->cyc_title = 'nil'; //not needed
        $purchasedCyc->cyc_year = 'nil'; //not needed
        $purchasedCyc->save();

        return response()->json([
            'status' => true,
            'message' => 'Subscribed successfully',
        ], 200);
    }

    //check if user is subscribed to a book
    public function checkBookSubscription($user_id, $book_id) {
        //make sure user exits
        $user = User::find($user_id);
        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ], 404);
        }
        $userEmail = $user->email;

        //make sure book exits
        $book = Book::find($book_id);
        if(!$book) {
            return response()->json([
                'status' => false,
                'message' => 'Book not found',
            ], 404);
        }

        //check if userEmail exists with book_id in purchased_books table
        $purchasedBook = PurchasedBook::where('email', $userEmail)->where('book_id', $book_id)->first();

        if($purchasedBook) {
            //check if book_id exists in purchased_books table
            $purchasedBook = PurchasedBook::where('book_id', $book_id)->where('email', $userEmail)->first();
            if($purchasedBook) {
                return response()->json([
                    'status' => true,
                    'message' => 'Book purchased',
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Book not purchased',
                ], 404);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Book not purchased',
            ], 404);
        }
    }

    //check if user is subscribed to a study
    public function checkStudySubscription(Request $request, $user_id) {
        //validate request
        $validate = Validator::make($request->all(), [
            'year' => 'required',
            'study_id' => 'required', // 1 = Daily Fountain 2 = Bible Study 3 = Daily Dynamite
        ]);

        //make sure user exits
        $user = User::find($user_id);
        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ], 404);
        }

        //check user->email where study_id = $request->study_id and valid_year = $request->year
        $status = Purchasedstudy::where('email', $user->email)->where('study_id', $request->study_id)->where('valid_year', $request->year)->first();

        if($status) {
            return response()->json([
                'status' => true,
                'message' => 'Subscribed',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Not subscribed',
            ], 404);
        }


    }

    //check if user is subscribed to a bcp
    public function checkBcpSubscription(Request $request, $user_id) {
        //make sure user exits
        $user = User::find($user_id);
        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ], 404);
        }

        //check user->email where purchased_bcps->email = $user->email
        $status = Purchasedbcp::where('email', $user->email)->first();
        if($status) {
            return response()->json([
                'status' => true,
                'message' => 'Subscribed',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Not subscribed',
            ], 404);
        }
    }

    //check if user is subscribed to cyc
    public function checkCycSubscription(Request $request, $user_id) {
        //make sure user exits
        $user = User::find($user_id);
        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ], 404);
        }

        //check user->email where purchased_cycs->email = $user->email
        $status = Purchasecyc::where('email', $user->email)->first();
        if($status) {
            return response()->json([
                'status' => true,
                'message' => 'Subscribed',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Not subscribed',
            ], 404);
        }
    }
}
