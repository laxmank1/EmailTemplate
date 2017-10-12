<?php
namespace smartdata\Email\Seeds;

use Illuminate\Database\Seeder;
use DB;

class Emails extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Emails')->insert([
        	
            'subject' => 'Test',
            'message' => 'First Template',
        ]);

        DB::table('Emails')->insert([
            
            'subject' => 'Test1',
            'message' => 'Second Template',
        ]);

        DB::table('Emails')->insert([
            
            'subject' => 'Test2',
            'message' => 'Third Template',
        ]);

    }
}
