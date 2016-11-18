<?php

use Illuminate\Database\Seeder;

class CurrencyRateSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('currency_rates')->delete();

        \DB::table('currency_rates')->insert(array (
            0 =>
                array (
                    'id' => '1',
                    'currency_id' => 1,
                    'rate' => 65.0001,
                    'created_at' => '2016-03-03 07:33:53',
                    'updated_at' => '2016-03-31 01:57:46',
                ),
            1 =>
                array (
                    'id' => '2',
                    'currency_id' => 1,
                    'rate' => 66.0001,
                    'created_at' => '2016-03-03 08:33:53',
                    'updated_at' => '2016-03-31 08:57:46',
                ),

        ));


    }
}
