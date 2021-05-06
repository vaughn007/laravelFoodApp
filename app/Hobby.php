<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    public function user() {
        //one hobby belong to a user
        return $this->belongsTo('App\User');
    }

    //take care of the connection between Hobbes and the tags
    // hobby belongs to many tags 
    //many to many relationship
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'ingredients', 'recipe', 'user_id'
    ];
}