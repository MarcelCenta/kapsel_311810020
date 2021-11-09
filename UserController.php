<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserModel;

class UserController extends Controller
{
    public function __construct(UserModel $model)
    {
        $this->model = $model;
    }
    
    function index()
    {
        $data = $this->model->getData();
        // $result[] = ['reviews', 'year'];
        // foreach ($data as $key => $value){
        //     $result[++$key] = [(int)$value->reviews, (int)$value->year];
        // }
        return View('home')->with('review', json_encode($data));
    }
}
