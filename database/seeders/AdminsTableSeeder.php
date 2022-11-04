<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\Support\Facades\DB;
use App\Models\Admin;


class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords =[
         [ 'id'=>3, 
        'name' => 'superadmin',
        'type' => 'spadmin',
        'vendor_id' =>0,
        'mobile'=>'03331234567', 
        'email' => 'admin@admin.com',
        'password' => '12345678',
        'image' =>'',
         'status'=>1 ]
        ];
        // foreach ($adminRecords as $key => $value) {
        //     Admin::create($value);}
            

        Admin::insert($adminRecords);
        

        // DB::table('admins')->insert([
        //      'id'=>1, 
        //     'name' => 'superadmin',
        // 'type' => 'spadmin',
        //     'vender_id' =>0,
        //     'mobile'=>'03331234567', 
        //     'email' => 'admin@admin.com',
        //     'password' => '12345678',
        //     'image' =>'',
        //     'status'=>1 
        // ]);
    }
}
