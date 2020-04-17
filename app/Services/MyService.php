<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2019/11/8
 * Time: 下午 02:13
 */

namespace App\Services;

use App\purchaseOrder as PurchaseOrderEloquent;
use App\purchaseItem as PurchaseItemEloquent;
use App\suppliers as SuppliersEloquent;
use App\material as MaterialEloquent;
use Carbon\Carbon;
use DB;

class MyService extends BaseService
{
    public function createPurchaseOrder($postData)
    {
        $now = Carbon::now();
        $purchaseOrderData['s_id'] = $postData['s_id'];
        $purchaseOrderData['purchaser'] = $postData['purchaser'];
        $purchaseOrderData['purchaser_tel'] = $postData['purchaser_tel'];
        $purchaseOrderData['purchaser_fax'] = $postData['purchaser_fax'];
        $purchaseOrderData['purchase_time'] = $now;
        $purchaseOrderData['delivery_time'] = $postData['delivery_time'];
        $purchaseOrderData['delivery_place'] = $postData['delivery_place'];
        $purchaseOrderData['payment_type'] = $postData['payment_type'];
        if (array_key_exists('remark', $postData)) {
            $purchaseOrderData['remark'] = $postData['remark'];
        } else {
            $purchaseOrderData['remark'] = "";
        }
        $purchaseOrderData['payment_type'] = $postData['payment_type'];
        $purchaseOrderData['payment_type'] = $postData['payment_type'];

        $purchaseOrder = PurchaseOrderEloquent::create($purchaseOrderData);

        foreach ($postData['purchaseItem'] as $purchaseItem) {
            $itemJson = json_decode($purchaseItem, true);
            $purchaseItemData['po_id'] = $purchaseOrder->po_id;
            $purchaseItemData['m_id'] = $itemJson['m_id'];
            $purchaseItemData['count'] = $itemJson['count'];
            $purchaseItemData['price'] = $itemJson['price'];
            $purchaseItemData['discount'] = $itemJson['discount'];
            $totalPrice = $itemJson['count'] * $itemJson['price'] * $itemJson['discount'] * 0.1;
            $purchaseItemData['total_price'] = $totalPrice;

            if (array_key_exists('remark', $itemJson)) {
                $purchaseItemData['remark'] = $itemJson['remark'];
            } else {
                $purchaseItemData['remark'] = "";
            }
            $purchaseOrder = PurchaseItemEloquent::create($purchaseItemData);
        }
        return "";
    }

    public function getPurchaseOrderList()
    {
        $getData = PurchaseOrderEloquent::
            with(['purchase_items' => function ($query) {
                $query->select(['po_id', 'count', 'price', 'discount','total_price','remark','materials.material_name'])
                    ->leftjoin('materials', 'materials.m_id', '=', 'purchase_items.m_id');

            }])->get();
        return $getData;
    }


    public function deletePurchaseOrder($postData)
    {
        $purchaseOrder = PurchaseItemEloquent::where('po_id', $postData['po_id']);
        $purchaseOrder->delete();
        return "";
    }

    public function addSuppliers($postData)
    {
        SuppliersEloquent::create($postData);
        return "";
    }

    public function getSuppliersList()
    {
        $getData = SuppliersEloquent::get();
        return $getData;
    }

    public function addMaterials($postData)
    {
        MaterialEloquent::create($postData);
        return "";
    }

    public function getMaterialsList()
    {
        $getData = MaterialEloquent::get();
        return $getData;
    }


}