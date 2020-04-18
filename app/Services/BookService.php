<?php

namespace App\Services;
use App\Book as BookEloquent;


class BookService extends BaseService
{
    public function add($request)
    {
        $book = BookEloquent::create([
            'donor_id' => $request->donor_id,
            'barcode' => $request->barcode,
            'callnum' => $request->callnum,
            'category' => $request->category,
            'status' => $request->status,
            'title' => $request->title,
            'subtitle' => $request->subtitle,

            'author' => $request->author,
            'translator' => $request->translator,
            'publisher' => $request->publisher,
            'edition' => $request->edition,
            'cover_image' => $request->cover_image,
            'ISBN' => $request->ISBN,

            'published_date' => $request->published_date,
            'price' => $request->price,
            'content' => $request->content,
            'count' => $request->count,

        ]);
        return $book->id;
    }

    public function getList()
    {
        $books = BookEloquent::withTrashed()->get();
        return $books;
    }

    public function getOne($id)
    {
        $book = BookEloquent::withTrashed()->findOrFail($id);
        return $book;
    }

    public function update($request, $id)
    {
        $book = $this->getOne($id);
        $book->update([
            'donor_id' => $request->donor_id,
            'barcode' => $request->barcode,
            'callnum' => $request->callnum,
            'category' => $request->category,
            'status' => $request->status,
            'title' => $request->title,
            'subtitle' => $request->subtitle,

            'author' => $request->author,
            'translator' => $request->translator,
            'publisher' => $request->publisher,
            'edition' => $request->edition,
            'cover_image' => $request->cover_image,
            'ISBN' => $request->ISBN,

            'published_date' => $request->published_date,
            'price' => $request->price,
            'content' => $request->content,
            'count' => $request->count,
        ]);

        return $book->id;
    }

    public function delete($id)
    {
        $book = $this->getOne($id);
        $book->delete();
    }
}