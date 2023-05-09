<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreUpdateBookRequest;
use App\Models\Book;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function data(): \Illuminate\Http\JsonResponse
    {
        $books = Book::query()->orderBy('name');

        return DataTables::eloquent($books)
            ->addColumn('name', function ($book) {
                return $book->name;
            })
            ->filterColumn('name', function ($query, $keyword) {
                $query->where('name', 'like', "%$keyword%");
            })
            ->addColumn('is_original', function ($book) {
                return $book->is_original ? 'Original' : 'Not Original';
            })
            ->addColumn('author_name', function ($book) {
                return $book->author_name;
            })
            ->filterColumn('author_name', function ($query, $keyword) {
                $query->where('author_name', 'like', "%$keyword%");
            })
            ->addColumn('publisher', function ($book) {
                return $book->publisher;
            })
            ->filterColumn('publisher', function ($query, $keyword) {
                $query->where('publisher', 'like', "%$keyword%");
            })
            ->addColumn('price', function ($book) {
                return $book->price;
            })
            ->addColumn('action', function ($book) {
                return "
                    <div class='d-flex'>
                        <a href='".route('admin.books.show', $book->id)."' class='btn btn-xs btn-info'>
                            <i class='bi bi-chevron-bar-right'></i>
                        </a>
                        <button type='button' class='btn btn-xs btn-danger remove-item-from-table-btn'
                                data-deleteurl ='".route('admin.books.destroy', $book->id)."' >
                            <i class='bi bi-trash3-fill'></i>
                        </button>
                    </div>";
            })
            ->toJson();
    }

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.books.books-table');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateBookRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $book = Book::create($data);
        if ($request->hasFile('face_image') != null) {
            $this->handleImage($request, $book);
        }

        return redirect()->route('admin.books.show', $book->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $book = Book::findOrFail($id);

        return \view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $book = Book::findOrFail($id);

        return view('admin.books.update', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateBookRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $book = Book::findOrFail($id);
        $data = $request->validated();
        unset($data['face_image']);
        $book->update($data);
        if ($request->hasFile('face_image') != null) {
            Storage::disk('public')->delete($book->face_image);
            $this->handleImage($request, $book);
        }

        return redirect()->route('admin.books.show', $book->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json(['message' => 'deleted successfully']);
    }

    public function handleImage(StoreUpdateBookRequest $request, $book): void
    {
        $destenation_path = 'books/images';
        $image_name = time().'_'.$request->file('face_image')->getClientOriginalName();
        $book->face_image = $destenation_path.'/'.$image_name;
        $book->save();
        $request->file('face_image')->storeAs('public/'.$destenation_path, $image_name);
        $path = storage_path('app/public/'.$book->face_image);
        $img = Image::make($path);
        $img->resize(413, 602, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path);
    }
}
