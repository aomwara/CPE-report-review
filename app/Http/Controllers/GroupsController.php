<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groups;
use App\Models\User;
use App\Models\Requests;

use Validator;
use Illuminate\Validation\Rule;

class GroupsController extends Controller
{

   public function registerGroup (Request $r) {
        $check = Groups::where('id', $r['group_id'])->count();

        if($check){
            $update = User::where('id', auth()->user()->id)->update([
                'project_group' => $r['group_id']
            ]);

            return redirect('/admin/dashboard');
        }

   }

   public function myRequest () {
       $myrequest = Requests::leftjoin('users as u', 'requests.request_to', '=', 'u.id')->where('request_by', auth()->user()->id)->get();

       return view('request/index',[
           'requests' => $myrequest,
       ]);

   }

    // public function groupDetails($id) {
    //     $count = Groups::where('id', $id)->where('user_id', auth()->user()->id)->count();

    //     if($count){
    //         $group =  Groups::where('id', $id)->first();
    //         return response()->json($group);
    //     }else{
    //         return response()->json(null, 404);
    //     }
    // }

    // public function editGroup(Request $r) {
    //     $count = Groups::where('id', $r['id'])->where('user_id', auth()->user()->id)->count();

    //     if($count){
    //         if($r['name'] != ""){
    //             $update = Groups::where('id', $r['id'])->where('user_id', auth()->user()->id)
    //             ->update([
    //                 'name' => $r['name'],
    //                 'description' => $r['description'],
    //             ]);

    //             return response()->json("แก้ไขสำเร็จ");
    //         }else{
    //             return response()->json("กรุณาใส่ชื่อกลุ่ม");
    //         }
    //     }else{
    //         return response()->json("แก้ไขไม่สำเร็จ");
    //     }
    // }

    // public function deleteGroup(Request $r) {
    //     $count = Groups::where('id', $r['id'])->where('user_id', auth()->user()->id)->count();

    //     if($count){
    //             $deleteLink = Links::where('group_id', $r['id'])->where('user_id', auth()->user()->id)
    //                     ->delete();
    //             $delete = Groups::where('id', $r['id'])->where('user_id', auth()->user()->id)
    //                     ->delete();
    //             return response()->json("ลบสำเร็จ");
    //     }else{
    //         return response()->json("ลบไม่สำเร็จ");
    //     }
    // }

    // public function addGroup(Request $r){
    //     if($r['group_name'] != ""){
    //         $add = Groups::create([
    //             'name' => $r['group_name'],
    //             'description' => $r['group_description'],
    //             'user_id' => auth()->user()->id,
    //         ]);

    //         return redirect('/admin/groups');
    //     }else{
    //         return redirect('/admin/groups');
    //     }
    // }
}
