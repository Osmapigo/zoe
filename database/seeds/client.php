<?php

use Illuminate\Database\Seeder;

class client extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('clickdelivery')
                ->table('clients')
                ->insert(
                    [
                        'name' => 'Beth',
                        'zip_code' => '94556'
                                        ],
                    [
                        'name' => 'Cathy',
                        'zip_code' => '92260'
                    ],
                    [
                        'name' => 'Harold',
                        'zip_code' => '92120'
                    ],
                    [
                        'name' => 'Robin',
                        'zip_code' => '94062'
                    ],
                    [
                        'name' => 'James',
                        'zip_code' => '90503'
                    ]
                );
    }
}
