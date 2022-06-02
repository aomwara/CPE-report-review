<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;
    protected $table = 'requests';
    protected $fillable = [
        'id', 'request_by', 'request_to', 'project_group', 'request_file','description', 'status', 'review', 'review_file', 'created_at', 'updated_at',
    ];
    public $timestamps = false;
}
