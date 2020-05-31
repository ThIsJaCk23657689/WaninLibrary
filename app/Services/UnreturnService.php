<?php

namespace App\Services;

use App\Borrow as BorrowEloquent;
use Symfony\Component\HttpFoundation\Request;

class UnreturnService extends BaseService
{
    public function getList(Request $request)
    {
        $skip = $request->skip ?? 0;
        $take = $request->take ?? 10;

        $unreturns = BorrowEloquent::skip($skip)->take($take)->get();

        return $unreturns;
    }

    public function count()
    {
        return BorrowEloquent::count();
    }
}
