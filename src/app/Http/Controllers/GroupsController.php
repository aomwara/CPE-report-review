<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groups;
use App\Models\User;
use App\Models\Requests;

use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;

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
       $myrequest = Requests::leftjoin('users as u', 'requests.request_to', '=', 'u.id')
       ->where('request_by', auth()->user()->id)
       ->orderby('requests.id', 'desc')
       ->select('requests.*', 'u.id as uid', 'u.name as name')
       ->get();

       return view('request/index',[
           'requests' => $myrequest,
       ]);

   }

   public function viewRequest ($id) {
         $count = Requests::where('id', $id)->where('project_group', auth()->user()->project_group)->count();

         if($count){
            $group = Groups::where('id', auth()->user()->project_group)->first();
            $request = Requests::leftjoin('users as u', 'requests.request_to', '=', 'u.id')
                    ->where('requests.id', $id)
                    ->where('requests.project_group', auth()->user()->project_group)
                    ->select('requests.*', 'u.id as uid', 'u.name as name')
                    ->first();

            return view('request/view',[
                'request' => $request,
                'mygroup' => $group,
           ]);
         }else{
             return redirect('/admin/myrequest');
         }

   }

   public function review ($id) {
    $count = Requests::where('id', $id)->where('request_to', auth()->user()->id)->count();

        if($count){
            $request = Requests::leftjoin('users as u', 'requests.request_by', '=', 'u.id')
                ->where('requests.id', $id)
                ->where('requests.request_to', auth()->user()->id)
                ->select('requests.*', 'u.id as uid', 'u.name as name')
                ->first();

            $group = Groups::where('id', $request->project_group)->first();
            $members = User::where('project_group', $request->project_group)->get();
        return view('review/view',[
            'request' => $request,
            'mygroup' => $group,
            'members' => $members
        ]);
        }else{
            return redirect('/admin/dashboard');
        }

    }


   public function hisReview ($id) {
    $count = Requests::where('id', $id)->where('request_to', auth()->user()->id)->count();

        if($count){
            $request = Requests::leftjoin('users as u', 'requests.request_by', '=', 'u.id')
                ->where('requests.id', $id)
                ->where('requests.request_to', auth()->user()->id)
                ->select('requests.*', 'u.id as uid', 'u.name as name')
                ->first();

            $group = Groups::where('id', $request->project_group)->first();
            $members = User::where('project_group', $request->project_group)->get();
        return view('review/history',[
            'request' => $request,
            'mygroup' => $group,
            'members' => $members
        ]);
        }else{
            return redirect('/admin/dashboard');
        }

    }

    public function reviewSave(Request $r,$id){
        $count = Requests::where('id', $id)->where('request_to', auth()->user()->id)->count();
        if($count) {
            $fileName = null;
            if($r['review_file']){
                $v = $r->validate([
                    'review_file' => 'mimes:pdf',
                ]);
                if($v){
                    $file = $r['review_file'];
                    if($file !== null){
                        $fileName = "review-by-".auth()->user()->name."-".date('YmdHis').".".$file->extension();
                        $file = $file->move(storage_path('app/uploads/rev-report'), $fileName);
                    }
                }else{
                    return redirect('/admin/dashboard');
                }
            }

             //init update
             $sign = $r['sign'] == 1 ? 1 : null;
             $review_file = $fileName ? $fileName : null;
             $status = 1;
             $review = $r['comment'];

             $update = Requests::where('id', $id)->update([
                'sign' => $sign,
                'review_file' => $fileName,
                'status' => $status,
                'review' => $review,
                'updated_at' => date('Y-m-d | H:i:s'),
            ]);

            $groupdata = Requests::where('id', $id)->first();
            //Webhook
            $sign_status = $sign == 1 ? ':white_check_mark:' : ':x:';
            Http::post(env('WEBHOOK_URL'), [
                'content' => "",
                'embeds' => [
                    [
                        'title' => "ID# ".$id." Review Successful!! :tada: | Group ".$groupdata->project_group,
                        'description' => "Group ".$groupdata->project_group." have successfully reviewed by ".auth()->user()->name.".\n Signed: ".$sign_status,
                        'color' => '7506394',
                    ]
                ],
            ]);

            if($update){
                return redirect('/admin/dashboard');
            }
        }else{
            return redirect('/admin/dashboard');
        }
    }

}
