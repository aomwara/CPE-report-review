<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groups;
use App\Models\Links;
use App\Models\User;

use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){
        $users = User::get();
        return view('users/index',[
            'users' => $users
        ]);
    }

    public function createUser(Request $r){
        $v = $r->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:8',
            'role' => Rule::in([0,1]),
        ]);

        if($v){
            $create =  User::create([
                'name' => $r['name'],
                'email' => $r['email'],
                'password' => Hash::make($r['password']),
                'type' => $r['role'],
            ]);
            return response()->json($create);
        }else{
            return response()->json(['status'=>202]);
        }
    }

    public function userDetails($id) {
        $count = User::where('id', $id)->count();

        if($count){
            $user =  User::where('id', $id)->first();
            return response()->json($user);
        }else{
            return response()->json(null, 404);
        }
    }

    public function editUser(Request $r) {
        $count = User::where('id', $r['id'])->count();

        if($count){
            if($r['name'] != "" && $r['email'] != "" && $r['role'] != ""){
                $update = User::where('id', $r['id'])
                ->update([
                    'name' => $r['name'],
                    'email' => $r['email'],
                    'role' => $r['role']
                ]);

                return response()->json("แก้ไขสำเร็จ");
            }else{
                return response()->json("กรุณากรอกข้อมูลให้ครบ");
            }
        }else{
            return response()->json("แก้ไขไม่สำเร็จ");
        }
    }

    public function deleteUser(Request $r) {
        $count = User::where('id', $r['id'])->count();

        if($count){
                $delete = User::where('id', $r['id'])
                        ->delete();
                return response()->json("ลบสำเร็จ");
        }else{
            return response()->json("ลบไม่สำเร็จ");
        }
    }

}
