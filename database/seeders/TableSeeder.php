<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        Table::truncate();
        $table =  [
            [
              'name' => 'Table-1',
              'capacity' => '2',
              'status' => '0',
            ],
            [
                'name' => 'Table-2',
                'capacity' => '3',
                'status' => '0',
            ],
            [
                'name' => 'Table-3',
                'capacity' => '4',
                'status' => '0',
            ],
            [
                'name' => 'Table-4',
                'capacity' => '5',
                'status' => '0',
            ],
            [
                'name' => 'Table-5',
                'capacity' => '6',
                'status' => '0',
              ],
              [
                  'name' => 'Table-6',
                  'capacity' => '7',
                  'status' => '0',
              ],
              [
                  'name' => 'Table-7',
                  'capacity' => '8',
                  'status' => '0',
              ],
              [
                  'name' => 'Table-8',
                  'capacity' => '9',
                  'status' => '0',
              ],
              [
                'name' => 'Table-9',
                'capacity' => '10',
                'status' => '0',
              ],
              [
                'name' => 'Table-10',
                'capacity' => '12',
                'status' => '0',
            ]

          ];

          Table::insert($table);

    
    }
}
