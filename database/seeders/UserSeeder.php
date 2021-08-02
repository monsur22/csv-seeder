<?php

namespace Database\Seeders;



use App\Models\User;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class UserSeeder extends CsvSeeder
{
    public function __construct()
    {

        $this->file = base_path().'/database/seeds/csvs/users.csv';
        $this->table = 'users';
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // dd($this->file);
        $data = array_map('str_getcsv',file($this->file));
        $header = $data[0];
        // dd($header);
        unset($data[0]);
        foreach ($data as $value) {
            $userData = array_combine($header,$value);
            User::create($userData);
        }
    }
}
