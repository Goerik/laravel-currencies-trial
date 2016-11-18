<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('currencies')->delete();

        \DB::table('currencies')->insert(array (
            0 =>
                array (
                    'id' => '1',
                    'code' => 'USD',
                    'title' => 'US Dollar',

                    'created_at' => '2016-03-03 07:33:53',
                    'updated_at' => '2016-03-31 01:57:46',

                ),
            1 =>
                array (
                    'id' => '2',
                    'code' => 'EUR',
                    'title' => 'Euro',

                    'created_at' => '2016-03-03 07:33:53',
                    'updated_at' => '2016-03-31 01:57:46',

                ),

        ));


    }
}
