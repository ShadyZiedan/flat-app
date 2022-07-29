<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $platforms = [
            ['id' => 1, 'name' => 'Avito'],
            ['id' => 2, 'name' => 'Cian'],
            ['id' => 3, 'name' => 'Domclick'],
        ];

        collect($platforms)
            ->map(function ($platform) {
                $model = new Platform();
                $model->id = $platform['id'];
                $model->name = $platform['name'];
                return $model;
            })
            ->each(fn($model) => $model->save());
    }
}
