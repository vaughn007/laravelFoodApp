<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //Another way to insert content into the database

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //factory('model we are using', 'how often we want to call it the factory' )
        factory(App\User::class, 100)->create()
        //$user is the user that we are creating in this moment.
        ->each(function ($user){
            //call hobby factory, each user has a random number from 1 to 8 hobbies. (App\Hobby is model)
            factory(App\Hobby::class, rand(1,8))->create(
                [
                    //add user_id field. user_id will get id of the user we just created and And we get with $user
                    'user_id' => $user->id
                ]
            )

            //create values for this hobby tag table
            ->each(function ($hobby){
                //this will get an array from 1 to 8
                $tag_ids = range(1,8);
                shuffle($tag_ids);
                //for each hobby that we are creating, I want to assign a random number
                //array_slice(array,  starting point, how many pieces to cut)
                $assignments = array_slice($tag_ids, 0, rand(0,8)); // eg 5,2,8
                //loop $assignments
                foreach($assignments as $tag_id){
                    //create a record in hobby_tag table 
                    DB::table('hobby_tag')
                        ->insert(
                            [
                                'hobby_id' => $hobby->id,
                                'tag_id' => $tag_id,
                                'created_at' => Now(),
                                'updated_at' => Now()
                            ]
                        );
                }
            });
        });
    }
}
