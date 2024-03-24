<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengumumans')->insert([
            'judul' => 'Daftar diterima',
            'isi' => 'Berikut adalah daftar santri yang diterima.',
            'link' => 'route:santri.list-diterima',
            'hidden' => true,
        ]);
    }
}
