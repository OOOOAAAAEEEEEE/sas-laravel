<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Student extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function perClass($id, $times)
    {

        $interval = now()->subDays($times);

        return  DB::table('students')
            ->join('users', 'user_id', '=', 'users.id')
            ->join('master_statuses', 'master_statuses_id', '=', 'master_statuses.id')
            ->join('master_classes', 'master_classes_id', '=', 'master_classes.id')
            ->selectRaw(

                'students.id AS mainID, 
                users.name, 
                master_classes_id AS classID,
                master_classes.class, 
                master_statuses.status, 
                students.created_at, 
                students.updated_at'
            )
            ->where('master_classes.id', '=', $id)
            ->where('students.created_at', '>=', $interval)->get();
    }
}
