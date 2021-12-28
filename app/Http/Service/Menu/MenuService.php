<?php

namespace App\Http\Service\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuService{
    
    public function create($request) {
        try {
            Menu::create([
                'name'=> (string)$request->input('name'),
                'parent_id'=> (int)$request->input('parent_id'),
                'description'=> (string)$request->input('description'),
                'content'=> (string)$request->input('content'),
                'slug'=> Str::slug($request->input('name'),'-'),
                'active'=> (string)$request->input('active')
            ]);
            Session::flash('success', 'Tạo danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }

    public function get_parent($parent_id = 0, $except = 0){
        if($except == 0){
            return Menu::where('parent_id', $parent_id)->get();
        }
        return Menu::where('parent_id', $parent_id)->where('id','<>',$except)->get();
    } 

    public function get_all($pagination = 10){
        return Menu::orderBy('id')->paginate($pagination);
    }

    public function change_active_status($request){
        $menu = Menu::find($request->input('id'));
        $menu->active = ($menu->active == 0) ? 1 : 0;
        $menu->save();
        return $menu;
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $menu = Menu::where('id', $id)->first();
        if ($menu) {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }

    public function update($menu, $request) {
        // $menu->parent_id = (int)$request->input('parent_id');
        // $menu->description = (string)$request->input('description');
        // $menu->content = (string)$request->input('content');
        // $menu->slug = Str::slug($request->input('name'),'-');
        // $menu->active = (string)$request->input('active');
        // $menu->name = (string)$request->input('name');

        $menu->fill($request->input());
        $result = $menu->save();
        Session::flash('success', 'Cập nhật danh mục '.$menu->name.' thành công');
        return true;
    }

}