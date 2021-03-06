<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;
    protected $table = 'project_groups';
    protected $fillable = [
        'id', 'project_name', 'project_advisor', 'project_type', 'committee1', 'committee2', 'committee3',
    ];
    public $timestamps = false;

    public static function getProjectName($id){
        $group = Groups::where('id', $id)->first();
        return "[".$id."]"." ".$group->project_name;
    }

    public static function getName($id){
        $group = Groups::where('id', $id)->first();
        return $group->project_name;
    }
}
