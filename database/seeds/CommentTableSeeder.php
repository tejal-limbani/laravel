<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('comments')->delete();

        DB::table('comments')->insert([
            'author' => 'Chris Sevilleja',
            'text' => 'Look I am a test comment.'
        ]);

        DB::table('comments')->insert([
            'author' => 'Nick Cerminara',
            'text' => 'This is going to be super crazy.'
        ]);

        DB::table('comments')->insert([
            'author' => 'Holly Lloyd',
            'text' => 'I am a master of Laravel and Angular.'
        ]);
    }
}
