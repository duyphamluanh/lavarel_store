<?php

namespace App\Helpers;

class Helper{
    public static function menu($menus, $parent_id = 0, $char = ''){
        $html = '<tr>';
        foreach($menus as $key => $menu){
            if($menu->parent_id == $parent_id){
                $html .= "
                    <th></th>
                    <th>".$menu->id."</th>
                    <th>".$char.$menu->name."</th>
                    <th>".self::active($menu->active)."</th>
                    <th>".$menu->updated_at."</th>
                    <th>
                        <a class='btn btn-primary btn-sm' href='/admin/menu/edit/".$menu->id."'>
                            <i class='fas fa-edit'></i>
                        </a>
                        <a class='btn btn-danger btn-sm' href='#' onclick='removeRow(".$menu->id.", `/admin/menu/destroy`)'>
                            <i class='far fa-trash-alt'></i>
                        </a>
                    </th>
               ";

                unset($menus[$key]);

                $html .= self::menu($menus, $menu->id, $char.'--');
            }
        }
        $html .= '</tr>';
        return  $html;
    }

    public static function active($active = 0){
        return $active == 0 ? '<span class="btn btn-danger btn-xs">Không</span>'
            : '<span class="btn btn-success btn-xs" >Có</span>';
    }
}