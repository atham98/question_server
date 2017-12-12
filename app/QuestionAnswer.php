<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $table = 'questions_answers';
    protected $fillable = ['category_id','author','email','question'];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
