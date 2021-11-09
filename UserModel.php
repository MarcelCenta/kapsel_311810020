<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    public function getData(){
        $sql = DB::select("SELECT SUM(reviews) as reviews, year FROM `review_buku` GROUP BY year");
        return $sql;
    }
}
