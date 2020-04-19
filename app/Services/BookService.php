<?php

namespace App\Services;
use App\Book as BookEloquent;


class BookService extends BaseService
{
    public function add($request)
    {
        

        $barcode = barcode_code($request->category, $request->callnum);

        $book = BookEloquent::create([
            'donor_id' => $request->donor_id,
            'barcode' => $barcode,
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
        $rbook = [$book->id,$barcode];

        return $rbook;
    }
    
    public function getLastUpdatedID()
    {
        $book = BookEloquent::orderBy('id', 'DESC')->first();
        if(!empty($user)){
            return $book->id;
        }
        return 0;
    }


    public function barcode_code($cate, $callnum)
    {
        $book_id = getLastUpdatedID()+1;

        if($cate == 10){
            $cate = 2;
        }elseif($cate == 11){
            $cate = 3;
        }elseif($cate >= 0 and $cate <= 9){
            $cate = 1;
        }else{
            return "Category number error.";
        }

        if($callnum < 0 or $callnum > 999)
            return "Call number error.";
        
        if($book_id > 10000000){
            return "Book id out of range.";
        }else{
            $book_id = str_pad($book_id,9,"0",STR_PAD_LEFT);
        }
        
        $code = $cate.$callnum.$book_id;

        if(strlen($code) != 13){
            return "Some undefined errors happened.";
        }else{
            return $code;
        }
    }

    
    public function getList()
    {
        $books = BookEloquent::get();
        return $books;
    }

    public function getOne($id)
    {
        $book = BookEloquent::findOrFail($id);
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