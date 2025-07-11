<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model



{
    use HasFactory;
    
    protected $fillable= ['title','company','location','website','email','description','tags','logo'];

    public  function scopeFilter($query, array $filters){
          if($filter['tag'] ?? false){
            $query->where('tag', 'like', '%'.request('tag'). '%');
          }

          if($filter['search'] ?? false){
            $query->where('title', 'like', '%'.request('search'). '%')
            ->orWhere('description', 'like', '%'.request('search'). '%')
            ->orWhere('tags', 'like', '%'.request('search'). '%') ;
          } 

    } 
    //relationship to user
    public function user(){
      return $this->belongTo(User::class, 'user_id');
    }
}
