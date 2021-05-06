<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    //1 tag belongs to many hobbies
    public function hobbies() {
        return $this->belongsToMany('App\Hobby')
        ->wherePivot('tag_id', $this->id)
        ->orderBy('updated_at', 'DESC');
    }

    //So what we can do now is define our own relationship
    public function filteredHobbies() {
        return $this->belongsToMany('App\Hobby')

        //wherePivot('column', instance of our tag model. $this->id)
        ->wherePivot('tag_id', $this->id)
        ->orderBy('updated_at', 'DESC');
    }
    

    protected $fillable = [
        'name', 'style', 'image',
    ];
}
