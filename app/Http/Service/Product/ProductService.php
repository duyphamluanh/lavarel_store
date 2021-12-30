<?php

namespace App\Http\Service\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductService{
    
    public function create($request) {
        try {
            Product::create([
                'name'=> (string)$request->input('name'),
                'description'=> (string)$request->input('description'),
                'content'=> (string)$request->input('content'),
                'slug'=> Str::slug($request->input('name'),'-'),
                'image'=> (string)$request->input('image'),
                'menu_id'=> (int)$request->input('menu_id'),
                'price'=>(int)$request->input('price'),
                'price_sale'=>(int)$request->input('price_sale'),
                'active'=> (string)$request->input('active')
            ]);
            Session::flash('success', 'Tạo sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }

    public function get_all($pagination = 10){
        return Product::orderBy('id')->paginate($pagination);
    }

    public function get_all_menu(){
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

    public function update($product, $request) {
        $product->fill($request->input());
        $result = $product->save();
        Session::flash('success', 'Cập nhật danh mục '.$product->name.' thành công');
        return true;
    }
}