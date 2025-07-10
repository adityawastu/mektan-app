<?php

namespace Database\Seeders;

use App\Models\Merk;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MerkSeeder extends Seeder
{
    public function run(): void
    {
        $merks = [
            'Kubota',
            'Yanmar',
            'Quick',
            'Honda',
            'Mitsubishi',
            'John Deere',
            'Changfa',
            'Dongfeng',
            'TaniMakmur',
            'AgriPro',
        ];

        foreach ($merks as $name) {
            Merk::create(['name' => $name]);
        }
    }
}
