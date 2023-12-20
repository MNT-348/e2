<?php

namespace App\Commands;

use Faker\Factory;

class AppCommand extends Command
{
    public function fresh()
    {
        $this->migrate();
        $this->seed();
    }

    public function migrate()
    {
        $this->app->db()->createTable('rounds', [
            'choice' => 'char(5)',
            'cpuFlip' => 'char(5)',
            'playerCoins' => 'tinyint(1)',
            'computerCoins' => 'tinyint(1)',
            'won' => 'tinyint(1)',
            'winner' => 'varchar(8)',
            'timestamp' => 'timestamp'
        ]);

        dump('Migrations Complete');
    }

    public function seed()
    {
        $faker = Factory::create();

        for ($i = 10; $i > 0; $i--) {
            $this->app->db()->insert('rounds', [
                'choice' => ['Heads', 'Tails'][rand(0, 1)],
                'won' => rand(0, 1),
                'timestamp' => $faker->dateTimeBetween('-' . $i . ' days', '-' . $i . ' days')->format('Y-m-d H:i:s')
            ]);
        }

        dump('Seeding Complete');
    }
}
