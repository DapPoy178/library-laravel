<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\RentLogs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class BookRentController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $user = User::where('role_id', 2)->where('status', 'active')->get();

        return view('book-rent', ['books' => $books, 'user' => $user]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        $book = Book::findOrFail($request->book_id)->only('status');

        if ($book['status'] != 'In Stock') {
            Session::flash('message', 'The Book is Unvailable');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-rent');
        } else {
            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if ($count >= 3) {
                Session::flash('message', 'The User has reach the limit ');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            } else {
                try {
                    DB::beginTransaction();
                    //inserting data to db
                    RentLogs::create($request->all());
                    //updating to table
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'Not Available';
                    $book->save();
                    DB::commit();

                    Session::flash('message', 'Rent Book Successfuly');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('book-rent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                    dd($th);
                }
            }
        }
    }

    public function bookReturnShow()
    {
        $books = Book::all();
        $user = User::where('role_id', 2)->where('status', 'active')->get();

        return view('book-return', ['books' => $books, 'user' => $user]);
    }

    public function bookReturn(Request $request)
    {
        $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();

        if($countData == 1) {
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            Session::flash('message', 'The Book is returned successfuly');
            Session::flash('alert-class', 'alert-success');
            return redirect('book-return');
        }
        else {
            Session::flash('message', 'wong');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-return');
        }
    }
}
