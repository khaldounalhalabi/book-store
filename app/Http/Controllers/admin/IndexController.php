<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Message;
use App\Models\SiteContent;
use App\Models\User;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index()
    {
        $recieved_emails_today = Message::whereDate('created_at', Carbon::today())->count();
        $popularBooks = visits(Book::class)->top(5)->sortBy('likes_count', SORT_DESC, true);
        $booksCount = Book::all()->count();
        $usersCount = User::all()->count();
        $siteVisitors = SiteContent::first()->visits()->count();

        return view('admin.index', compact(
            'recieved_emails_today',
            'popularBooks',
            'booksCount',
            'usersCount',
            'siteVisitors'
        ));
    }
}
