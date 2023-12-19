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
            'won' => 'tinyint(1)',
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