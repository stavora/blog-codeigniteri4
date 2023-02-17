<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class Reply extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        for ($i=1; $i <= 100; $i++) {
            $data = [
                'user_id' => $faker->numberBetween(1,100),
                'comment_id' => $faker->numberBetween(1,100),
                'comment' => $faker->paragraph()
            ];

            $this->db->table('replies')->insert($data);
        }
    }
}
