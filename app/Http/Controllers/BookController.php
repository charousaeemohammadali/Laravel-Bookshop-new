<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Tag;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $tag = [];
        if ($request->tag)
        {
            $tag = Tag::findOrFail($request->get('tag'));
            $books = $tag->books;
        }
        
        else
        {
            $books = Book::all();
        }
        return view('admin.books.list', compact('books' , 'tag'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('admin.books.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'author' => ['required'],
            'img' => ['required', 'mimes:jpeg,bmp,png'],
            'bookfile' => ['required', 'mimes:pdf'],
            'price' => ['required'],
            'text' => ['required'],
            'tag' => ['required'],
            'tag.*' => ['string']
        ]);
        $file = $this->uploadedFile($request);
        $book = Book::create([
            'book_name' => $request->name,
            'author_name' => $request->author,
            'img' => $file['img'],
            'book_file' => $file['pdf'],
            'price' => $request->price,
            'text' => $request->text,
        ]);
        $book->tags()->attach($request->tag);

        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        //
    }

    public function edit(Book $book)
    {
        $tags = Tag::all();
        $bookTags = $book->tags;
        return view('admin.books.edit', compact('book', 'tags', 'bookTags'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => ['required'],
            'author' => ['required'],
            'img' => ['nullable', 'mimes:jpeg,bmp,png'],
            'bookfile' => ['nullable', 'mimes:pdf'],
            'price' => ['required'],
            'text' => ['required'],
            'tag' => ['required'],
            'tag.*' => ['string']
        ]);
        $file = $this->uploadedFile($request);
        $book->update([
            'book_name' => $request->name,
            'author_name' => $request->author,
            'img' => $file['img'] ?? $book->img,
            'book_file' => $file['pdf'] ?? $book->book_file,
            'price' => $request->price,
            'text' => $request->text,
        ]);
        $book->tags()->sync($request->tag);
        alert()->success('کتاب با موفقیت ویرایش شد');
        return back();
    }

    public function destroy(Book $book)
    {
        $book->delete();
        alert()->warning('کتاب با موفقیت حذف گردید');
        return back();
    }

    public function home()
    {
        $books = Book::all();
        return view('index', compact('books'));
    }

    private function uploadedFile(Request $request)
    {
        if ($img = $request->file('img')) {
            $imgName = time() . $img->getClientOriginalName();
            $img->storeAs('/img', $imgName, ['disk' => 'public']);

        }
        if ($pdf = $request->file('bookfile')) {
            $pdfName = time() . $pdf->getClientOriginalName();
            $pdf->storeAs('/pdf', $pdfName, ['disk' => 'public']);
        }

        return [
            'pdf' => $pdfName ?? null,
            'img' => $imgName ?? null
        ];
    }
}