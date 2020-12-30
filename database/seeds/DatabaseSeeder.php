<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SanPhamSeeder::class);
        $this->call(NhanVienSeeder::class);
    }
}
