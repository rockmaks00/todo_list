<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = array('К выполнению', 'Выполняется', 'Выполнена', 'Отменена');
        foreach ($statuses as $status) {
            Status::create([
                'name' => $status,
            ]);
        }
    }
}
