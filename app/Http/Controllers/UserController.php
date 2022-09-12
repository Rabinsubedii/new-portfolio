<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(){
        if(!Auth::user()->hasPermissionTo('view_users')){
            return back()->with(['message'=>'Access Denied!','alert_type'=>'error']);
        }
        $user=User::orderByDesc('id')->paginate(20);
        return view('users.index',[
            'users'=>$user,
            'auth'=>Auth::user()
        ]);
    }
    public function assignRoleView($id){
        if(!Auth::user()->hasPermissionTo('assign_roles')){
            return redirect(route('forbidden'));
        }
        $user=User::findOrFail($id);
        return view('users.role',[

            'user'=>$user,
            'roles'=>Role::all()
        ]);
    }
    public function assignRoleStore(Request $request,$id){
        if(!Auth::user()->hasPermissionTo('assign_roles')){
            return redirect(route('forbidden'));
        }
        $user=User::findOrFail($id);
        
        $user->assignRole($request->role);
        return redirect(route('role.index'));
    }
    public function assignToken(Request $request){
        $user=User::where('email',$request->email)->first();
        if(!$user||!Hash::check($request->password,$user->password)){
            return response([
                'message'=>['these credentials donot match our records.']
            ],404);
        }
        $token=$user->createToken('my-app-token')->plainTextToken;
        $response=[
            'user'=>$user,
            'token'=>$token
        ];
        return response($response,201);
    }
}
