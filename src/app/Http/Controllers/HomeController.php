<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groups;
use App\Models\User;
use App\Models\Requests;

use Validator;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function index(){
        if(auth()->user()->role == 0){
            $groups = Groups::orderby('id','asc')->get();
            $teachers = User::where('role',1)->get();
            if(auth()->user()->project_group != null){
                $group = Groups::where('id', auth()->user()->project_group)->first();
                $advisor = User::where('id', $group->project_advisor)->first();
                $committee1 = User::where('id', $group->committee1)->first();
                $committee2 = User::where('id', $group->committee2)->first();
                $committee3 = User::where('id', $group->committee3)->first();
                return view('dashboard',[
                    'mygroup'=> $group,
                    'groups' => $groups,
                    'teachers' => $teachers,
                    'advisor' => $advisor,
                    'committee1' => $committee1,
                    'committee2' => $committee2,
                    'committee3' => $committee3
                ]);
            }

            return view('dashboard',[
                'groups' => $groups,
                'teachers' => $teachers
            ]);
        }else{
            $requests = Requests::where('request_to', auth()->user()->id)
                        ->where('status', 0)
                        ->get();
            $history_request = Requests::where('request_to', auth()->user()->id)
                        ->where('status', 1)
                        ->get();
            return view('dashboard',[
                'requests' => $requests,
                'history_request' => $history_request
            ]);
        }

    }

    public function sendRequest(Request $r){

        $v = $r->validate([
            'report_file' => 'required|mimes:pdf',
            'description' => 'nullable|string',
            'request_to' => 'required|integer',
        ]);

        if($v){
            $file = $r['report_file'];
            $fileName = null;
            if($file !== null){
                $fileName = auth()->user()->project_group."-".date('YmdHis').".".$file->extension();
                $file = $file->move(storage_path('app/uploads/req-report'), $fileName);
            }

            $insert = Requests::insert([
                'request_by' => auth()->user()->id,
                'request_to' => $r['request_to'],
                'request_file' => $fileName,
                'project_group'=> auth()->user()->project_group,
                'description' => $r['description'],
                'status' => 0,
                'created_at' => date('Y-m-d | H:i:s'),
                'updated_at' => date('Y-m-d | H:i:s'),
            ]);

            if($insert){
                return redirect('/admin/myrequest');
            }

        }
    }

}
