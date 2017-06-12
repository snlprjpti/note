<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->truncate();
        $insert = (
          ['name' => 'Sunil prajapati',
          'email' => 'sl.prjpti@gmail.com',
          'password' => bcrypt('admin1'),
          'admin' => 1,
          'status' => 1,
          'created_at' => 2017,
          'updated_at' => 2017
          ]
        );
        DB::table('users')->insert($insert);
    }
}
