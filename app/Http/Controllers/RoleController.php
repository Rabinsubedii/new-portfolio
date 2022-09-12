<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use Illuminate\Support\Facades\Validator;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->hasPermissionTo('browse_roles')){
            return back();
        }
        return view('pages.role.index',[
            'roles'=>Role::all(),
            'auth'=>Auth::user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()->hasPermissionTo('assign_roles')){
            return back() ;
        } 
        $validator=Validator::make($request->all(),[
            'name' => 'required|unique:roles|max:255'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors() , 422);
        }
        Role::create($request->all());
        return redirect(route('role.index'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.role.edit',[
            'id'=>$id,
            'Auth'=>Auth::User()->getRoleNames()->first(),
            'permissions'=>Permission::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!Auth::user()->hasPermissionTo('edit_roles')){
            return back() ;
        } 
        $validator=Validator::make($request->all(),[
            'name' => 'required|unique:roles|max:255'
            
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors() , 422);
        }
        $role=Role::findOrFail($id);
        $role->fill($request->all());
        $role->save();
        if($request->has('permission')){

        }
        return redirect(route('role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::user()->hasPermissionTo('delete_roles')){
            return back();
        }
        Role::findOrFail($id)->delete();
        return back();
    }
    public function assign(){//view page for permission assigning to role
        if(!Auth::user()->hasPermissionTo('assign_roles')){
            return redirect('/forbidden');
        }
        return view('pages.role.assignment',[
            'roles'=>Role::all()
        ]);
    }
    public function assignToPermissions($id){//role and permission are shown
        $role=Role::findOrFail($id);
        return view('pages.role.assignpermission',[
            'role'=>$role,
            'permission_to_role'=>$role->permission,
            'permissions'=>Permission::all()
        ]);
    }
    public function AssignPermissionToRole(Request $request,$id){//assings permissions to role
        
        if(!Auth::user()->hasPermissionTo('assign_roles')){
            return back();
        }
        $role=Role::findOrFail($id);
        $role->permission()->detach();
        $role->permission()->sync($request->permission);
        return redirect(route('permission.index'));
    }

    public function assignRoleToUser(){
        return view('pages.role.assginToUser');
    }
}
