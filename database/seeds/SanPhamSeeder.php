<?php

use App\anh;
use App\san_pham;
use Illuminate\Database\Seeder;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayName = [
            "ANARCHY GOTHIC LOGO HOODIE",
            "ANARCHY GOTHIC LOGO HOODIE",
            "ANARCHY GOTHIC LOGO SWEATPANTS",
            "ANARCHY GOTHIC LOGO SWEATPANTS",
            "ANARCHY GOTHIC LOGO T-SHIRT",
            "ANARCHY GOTHIC LOGO T-SHIRT",
            "ANARCHY GOTHIC LOGO T-SHIRT"
        ];

        $faker = \Faker\Factory::create();

        foreach($arrayName as $item)
        {
            $product = new san_pham();
            $product->Ten_Sp = $item;
            $product->Gia = $faker->numberBetween(1, 1000000);
            $product->Id_loai = $faker->numberBetween(1, 3);
            $product->save();
        }

        $paths = [
            "https://vetementswebsite.com/wp-content/uploads/2020/12/Screenshot-2020-12-11-at-15.09.16-257x343.png",
            "https://vetementswebsite.com/wp-content/uploads/2020/12/Screenshot-2020-12-11-at-15.22.24-257x343.png",
            "https://vetementswebsite.com/wp-content/uploads/2020/12/Screenshot-2020-12-11-at-14.15.04-257x343.png",
            "https://vetementswebsite.com/wp-content/uploads/2020/12/Screenshot-2020-12-11-at-15.11.12-257x343.png",
            "https://vetementswebsite.com/wp-content/uploads/2020/11/Picture1-17-257x343.png",
            "https://vetementswebsite.com/wp-content/uploads/2020/11/Screenshot-2020-12-18-at-12.38.58-257x343.png",
            "https://vetementswebsite.com/wp-content/uploads/2020/11/Screenshot-2020-12-18-at-12.38.50-257x343.png"
        ];

        $id = 1;

        foreach($paths as $x)
        {
            $image = new anh();
            $image->Ten_anh = $x;
            $image->Id_Sp = $id;
            $image->save();
            $id ++;
        }
    }
}
