<?php

namespace App\Http\Service\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductService
{

    public function create($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;
        try {
            $request->except('_token');
            Product::create($request->all());

            Session::flash('success', 'Tạo sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function get_all($pagination = 10)
    {
        return Product::orderBy('id')->paginate($pagination);
    }

    public function get_all_menu()
    {
        return Menu::orderBy('name')->get();
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $product = Product::where('id', $id)->first();
        if ($product) {
            return Product::where('id', $id)->delete();
        }
        return false;
    }

    public function update($product, $request)
    {
        $product->fill($request->input());
        $result = $product->save();
        Session::flash('success', 'Cập nhật danh mục ' . $product->name . ' thành công');
        return true;
    }

    protected function isValidPrice($request)
    {
        if (intval($request->input('price')) != 0 && intval($request->input('price_sale')) != 0
        && (intval($request->input('price')) < intval($request->input('price_sale')))) {
            Session::flash('error', 'Gía giảm phai nhỏ hơn giá gốc');
            return false;
        }
        if ($request->input('price') == 0 && $request->input('price_sale') != 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }
    }
}
