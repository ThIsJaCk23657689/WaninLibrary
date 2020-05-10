<?php

namespace App\Services;
use App\Information as InformationEloquent;


class InformationService extends BaseService
{
    

    public function getFirst()
    {
        $information = InformationEloquent::first();
        return $information;
    }

    public function update($request)
    {
        $information = $this->getFirst();
        $information->update([
            'email' => $request->email,
            'tel' => $request->tel,
            'fax' => $request->fax,
            'address' => $request->address,

            'open_at' => $request->open_at,
            'close_at' => $request->close_at,
        ]);

        return $information->id;
    }
}