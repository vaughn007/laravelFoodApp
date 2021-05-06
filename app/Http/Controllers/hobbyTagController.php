<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//import tag model
use App\Tag;

//import Hobby model
use App\Hobby;
use Illuminate\Support\Facades\Gate;

class hobbyTagController extends Controller
{
    //
    //Get hobbies that are filtered by a certain tag. Filtered for $tag_id
    //we also need a route that points to that function in this controller in Routes/web.php
    public function getFilteredHobbies($tag_id)
    {
        //create a new instance of our tag model
        $tag = new Tag();
        //find $tag_id passed in. if findOrFail don't find $tag_id, it will handel error
        $hobbies = $tag::findOrFail($tag_id)->filteredHobbies()->paginate(10);

        $filter = $tag::find($tag_id);
        //dd($filter);

        //take hobbies and send them to a view. Use index.blade the old view
        return view('hobby.index', [
            //just pass over the data also as a second
            'hobbies' => $hobbies,
            'filter' => $filter
           

        ]);
    }

    public function attachTag($hobby_id, $tag_id) {
        
        $hobby = Hobby::find($hobby_id);

        //denies('ability to connect tags', our hobby above)
        if (Gate::denies('connect_hobby_tag', $hobby)) {
            abort(403, "You don't have access to that.");
            //redirect('/hobby')->send();
        } 

        $tag = Tag::find($tag_id);

        $hobby->tags()->attach($tag_id);
        return back()->with([
            'message_success' => "The Tag <b>" . $tag->name . "</b> was added."
        ]);

    }

    public function detachTag($hobby_id, $tag_id) {
        //Hobby is for model
        $hobby = Hobby::find($hobby_id);

        if (Gate::denies('connect_hobby_tag', $hobby)) {
            abort(403, "You don't have access to that.");
            
        } 


        //look up $tag so will can use the name in message_success below
        $tag = Tag::find($tag_id);
        //tags() is function in Hobby model
        $hobby->tags()->detach($tag_id);
        return back()->with([
            'message_success' => "The Tag <b>" . $tag->name . "</b> was removed."
        ]);

    }
}
