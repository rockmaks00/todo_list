<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $priorities = array('Высокий', 'Средний', 'Низкий');
        foreach ($priorities as $priority) {
            Priority::create([
                'name' => $priority,
            ]);
        }
    }
}
