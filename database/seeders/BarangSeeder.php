<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangs')->insert([
            'kode_barang' => 'BR020',
            'nama_barang' => 'Rebo',
            'kategori_barang' => 'Snack',
            'harga' => 16000,
            'qty' => 27,
        ]);
    }
}
