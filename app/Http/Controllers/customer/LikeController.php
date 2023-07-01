<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Like;
use Illuminate\Http\JsonResponse;

class LikeController extends Controller
{
    public function like($book_id): JsonResponse
    {
        $book = Book::find($book_id);

        if (!$book || !auth()->user()) {
            return response()->json([
                'failed',
            ], 403);
        }

        $like = Like::where('user_id', auth()->user()->id)
            ->where('book_id', $book->id)->first();

        if (isset($like)) {
            $like->delete();
            $book->likes_count -= 1;
            $book->save();

            return response()->json([
                'likes_count' => $book->likes_count,
                'state' => 'unliked',
            ]);
        } else {
            Like::create([
                'book_id' => $book->id,
                'user_id' => auth()->user()->id,
            ]);
            $book->likes_count += 1;
            $book->save();

            return response()->json([
                'likes_count' => $book->likes_count,
                'state' => 'liked',
            ]);
        }
    }
}
