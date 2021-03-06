<?php

use Illuminate\Database\Seeder;

class importDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        
        $faker = Faker\Factory::create('vi_VN');
        $pro = DB::table('product')->get();
        $bill = DB::table('bill_import')->get();
 
            for($biID = 0; $biID < count($bill) ; $biID++){
                for($j = 0; $j < 8; $j++){
                    $idPro  =   $faker->unique()->numberBetween(0,count($pro) - 1);
                    $price  =   $faker->numberBetween(2000,10000);
                    array_push($list, [
                        'imd_price'     => $price,
                        'imd_priceExp'  => $price * $faker->randomFloat(NULL,1.1,2),
                        'imd_amount'    => $faker->numberBetween(2,20),
                        'pro_id'        => $pro[$idPro]->pro_id,
                        'bii_id'        => $bill[$biID]->bii_id
                    ]);
                }
                $faker->unique(true)->numberBetween(0,count($pro) - 1);
            } 
           
        DB::table('import_detail')->delete();
        DB::table('import_detail')->insert($list);
        
    }
}
