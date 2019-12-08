<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Reply;
use App\Model\Category;

class Question extends Model
{
    public function getRouteKeyName(){
        //se cambia en la forma de obtener el id -> ahora id = slug (si es que se quiere buscar se debe de hacer por el slug)
        return 'slug';
    }
    // protected $fillable= ['title','slug','body','category_id','user_id'];

    //reemplaza al fillable
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function replies(){
        return $this->hasMany(Reply::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getPathAttribute(){

        return asset("api/question/$this->slug");

    }
}
