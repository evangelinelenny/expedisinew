<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailMskModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_masuk')->get();
    }
}