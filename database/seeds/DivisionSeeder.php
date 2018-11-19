<?php

use Illuminate\Database\Seeder;
use App\Division;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::insert([
            [
                'division_name' => 'Citra Warna 01',
            ], 
            [
                'division_name' => 'Citra Warna 02',
            ],
            [
                'division_name' => 'Citra Warna 03',
            ],
            [
                'division_name' => 'Citra Warna 04',
            ],
            [
                'division_name' => 'Citra Warna 05',
            ],
            [
                'division_name' => 'Citra Warna 06',
            ],
            [
                'division_name' => 'Citra Warna 07',
            ],
            [
                'division_name' => 'Citra Warna 08',
            ],
            [
                'division_name' => 'Citra Warna 09',
            ],
            [
                'division_name' => 'Citra Warna 10',
            ],
            [
                'division_name' => 'Citra Warna 11',
            ],
            [
                'division_name' => 'Citra Warna 12',
            ],
            [
                'division_name' => 'Citra Warna 13',
            ],
            [
                'division_name' => 'Citra Warna 14',
            ],
            [
                'division_name' => 'Citra Warna 15',
            ],
            [
                'division_name' => 'Citra Warna 16',
            ],
            [
                'division_name' => 'Citra Warna 17',
            ]
            
        ]);
    }
}
