<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;

    // FILLABLE
    // protected $fillable = ['title','company','website','email','tags','description','location'];
     
    // TAGS FILTER
    public function scopeFilter($query,array $filters){
        // dd($filters['tag']);
        if($filters['tag'] ?? false){
            $query->where('tags','like','%' . request('tag') . '%');
        }

        if($filters['search'] ?? false){
            $query->where('title','like','%' . request('search') . '%')
            ->orWhere('description','like','%' . request('search') . '%')
            ->orWhere('company','like','%' . request('search') . '%')
            ->orWhere('tags','like','%' . request('search') . '%');
        }
    }

    // RELATIONSHIP TO USER
    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
