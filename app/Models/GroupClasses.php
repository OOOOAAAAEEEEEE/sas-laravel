<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GroupClasses extends Model
{
    use HasFactory;

    public function scopeJoinMasterKelas()
    {
        return DB::table('group_classes')
            ->join('master_classes', 'group_classes.master_classes_id', '=', 'master_classes.id')
            ->selectRaw('group_classes.id AS groupID,master_classes_id AS classesID, master_classes.class AS masterClass, group_classes.created_at, group_classes.updated_at')->get();
    }

    protected $guarded = [
        'id',
    ];
}
