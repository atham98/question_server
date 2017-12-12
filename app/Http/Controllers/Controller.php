<?php

namespace App\Http\Controllers;

use App\Category;
use App\QuestionAnswer;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setStatus($id,$bool){
        if (!empty($id)) {
            QuestionAnswer::query()
                ->where('id', $id)
                ->update([
                    'boolean' => $bool
                ]);
        }
    }
   public function whereColumnQuestion($key,$value){
       return QuestionAnswer::all()->where($key,$value);
   }
}
