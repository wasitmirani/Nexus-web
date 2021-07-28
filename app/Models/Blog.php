<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function postBlog($request,$type="create"){
        $requestInput=[
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>$request->user_id,
        ];
        if($type=="update"){
            return Blog::where('id',$request->id)->update($requestInput);
        }
        else {
            return   Blog::create($requestInput);
        }


    }
}
