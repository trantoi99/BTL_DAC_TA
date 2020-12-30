<?php

use App\nhan_vien;
use Illuminate\Database\Seeder;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(nhan_vien::class, 2)->make();
    }
}
