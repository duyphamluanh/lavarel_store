<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuCreateFormRequest;
use App\Http\Service\Menu\MenuService;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    protected $menuService;

    public function __construct(MenuService $menuService){
        $this->menuService = $menuService;
    }

    public function create()
    {
        return view('admin.menu.add', [
            'title' => 'Thêm danh mục mới',
            'parents' => $this->menuService->get_parent()
        ]);
    }

    public function store(MenuCreateFormRequest $request)
    {
        // dd($request->input());
        $result = $this->menuService->create($request);
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.menu.list', [
            'title' => 'Danh sách danh mục',
            'menus' => $this->menuService->get_all()
        ]);
    }

    public function changeActiveStatus(Request $request){
            echo ($this->menuService->change_active_status($request));
        return $this->menuService->change_active_status($request);
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function edit(Menu $menu){
        return  view('admin.menu.edit', [
            'title' => 'Chỉnh sửa danh mục '.$menu->name,
            'menu' => $menu,
            'parents' => $this->menuService->get_parent(0,$menu->id)
        ]);
    }

    public function update(Menu $menu, MenuCreateFormRequest $request){

        $result = $this->menuService->update($menu, $request);
        return redirect('/admin/menu/list');
    }
}
