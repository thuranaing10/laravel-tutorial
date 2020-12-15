<?php

use Illuminate\Database\Seeder;
use App\Like;

class CreateDummyLike extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $likes = ['ItSolutionStuff.com', 'Webprofile.me', 'HDTuto.com', 'Nicesnippets.com'];
        foreach ($likes as $key => $value) {
        	Like::create(['title'=>$value]);
        }
    }
}
