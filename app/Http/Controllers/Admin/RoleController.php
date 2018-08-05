<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends BaseController
{
    /**
     * 角色列表
     */
    public function index()
    {
        $roles = Role::all();
        return view('Admin.role.index', compact('roles'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {


            // dd($request->post('per'));
            //接收参数
            $data['name'] = $request->post('name');
            $data['guard_name'] = "admin";


            //创建角色
            $role = Role::create($data);

            //还给给角色添加权限
            $role->syncPermissions($request->post('per'));

            //跳转并提示
            return redirect()->route('role.index')->with('success', '创建' . $role->name . "成功");


        }

        //得到所有权限
        $pers = Permission::all();

        return view('Admin.role.add', compact('pers'));
    }

    /**
     * 角色编辑
     */
    public function edit(Request $request, $id)
    {
        //获取当前角色信息
        $role = Role::findOrFail($id);
        //判断是否是POst提交
        if ($request->isMethod('post')) {
            //接收参数
            $data['name'] = $request->post('name');
            $data['guard_name'] = "admin";
             // 修改角色
            $role->update($data);
              //修改权限
            if ($request->post('per')){
                $role->syncPermissions($request->post('per'));
            }else{
                $role->syncPermissions();
            }


            return redirect()->route('role.index')->with('success', '创建' . $role->name . "成功");

        }

        //得到所有权限
        $pers = Permission::all();
        return view('Admin.role.edit', compact('role', 'pers'));
    }

    public function del($id){
       //获取当前角色
        $role=Role::findOrFail($id);
        $role->delete();
        //跳转
        return redirect()->route('role.index')->with('success', '删除' . $role->name . "成功");
    }
}
