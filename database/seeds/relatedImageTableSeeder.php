<?php

use Illuminate\Database\Seeder;

class relatedImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $sp = DB::table('product')->get();
        for($i = 1; $i <= 20; $i++ ){
            array_push($list, [
                'pro_id'                => $sp[$i-1]->pro_id,
                'reimg_stt'             => '1',
                'reimg_name'            => "image$i-1.png"
            ]);
            array_push($list, [
                'pro_id'                => $sp[$i-1]->pro_id,
                'reimg_stt'             => '2',
                'reimg_name'            => "image$i-2.png"
            ]);
        }

        for($i = 21; $i <= 30; $i++ ){
            for($j = 1; $j <= 12; $j++){
                array_push($list, [
                    'pro_id'                => $sp[$i-1]->pro_id,
                    'reimg_stt'             => '1',
                    'reimg_name'            => "image$i-$j.png"
                ]);
            }
        }
        DB::table('related_image')->delete();
        DB::table('related_image')->insert($list);
    }
}
