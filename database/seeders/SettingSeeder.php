<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // groupe app_name
        $this->createNew("app_name", null, "Moov-Africa Tombolas", "string", ",", "Application Name.");
        // groupe roles
        $group = $this->createNew("roles", null, null, "string", ",", "settings Roles.");
        $this->createNew("default", $group->id, "1", "integer", ",", "Role par défaut à la creéation d un utilisateur dont le role n est pas explicitement déterminé.");
        // groupe files
        $group = $this->createNew("files", null, null, null, ",", "settings Files.");
        // sub groupe files.uploads
        $group = $this->createNew("uploads", $group->id, null, null, ",", "Uploads.");
        // sub groupe files.uploads.max_size
        $group = $this->createNew("max_size", $group->id, null, null, ",", "Max Size.");
        $this->createNew("any", $group->id, "70", "integer", ",", "Max any file size.");
        $this->createNew("video", $group->id, "70", "integer", ",", "Max video file size.");
    }

    private function createNew($name, $group_id = null, $value = null, $type = null, $array_sep = ",", $description = null) {
        $data = ['name'  => $name, 'array_sep' => $array_sep];
        if (! is_null($group_id)) { $data['group_id'] = $group_id; }
        if (! is_null($value)) { $data['value'] = $value; }
        if (! is_null($type)) { $data['type'] = $type; }
        if (! is_null($description)) { $data['description'] = $description; }
        return Setting::create($data);
    }
}
