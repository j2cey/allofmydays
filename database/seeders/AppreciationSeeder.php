<?php

namespace Database\Seeders;

use App\Models\Appreciation;
use Illuminate\Database\Seeder;

class AppreciationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createNew("very goog", 0, "very goog");
        $this->createNew("goog", 1, "goog");
        $this->createNew("neutral", 2, "neutral");
        $this->createNew("poor", 3, "poor");
        $this->createNew("very poor", 4, "very poor");
    }

    private function createNew($title, $level, $description = null) {
        $data = ['title'  => $title, 'level' => $level];
        if (! is_null($description)) { $data['description'] = $description; }
        return Appreciation::create($data);
    }
}
