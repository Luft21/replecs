<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kriteria;
use App\Models\NilaiKriteriaLaptop;
use App\Models\Laptop;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin Replecs',
            'email' => 'admin@replecs.com',
            'password' => Hash::make('replecs123'),
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => Hash::make('aise1234'),
            'is_admin' => false,
        ]);

        $kriteriaData = [
            [
                'nama' => 'Performa',
                'jenis' => 'benefit',
                'urutan' => 1,
                'deskripsi' => 'Kecepatan dan efisiensi dalam menjalankan aplikasi dan tugas.',
            ],
            [
                'nama' => 'Processor',
                'jenis' => 'benefit',
                'urutan' => 2,
                'deskripsi' => 'Kualitas dan kecepatan prosesor yang digunakan.',
            ],
            [
                'nama' => 'Berat',
                'jenis' => 'cost',
                'urutan' => 3,
                'deskripsi' => 'Bobot laptop yang mempengaruhi portabilitas.',
            ],
            [
                'nama' => 'Layar',
                'jenis' => 'benefit',
                'urutan' => 4,
                'deskripsi' => 'Kualitas layar, resolusi, dan ukuran yang mempengaruhi pengalaman visual.',
            ],
            [
                'nama' => 'Baterai',
                'jenis' => 'benefit',
                'urutan' => 5,
                'deskripsi' => 'Daya tahan baterai yang mempengaruhi penggunaan laptop tanpa charger.',
            ],
            [
                'nama' => 'Harga',
                'jenis' => 'cost',
                'urutan' => 6,
                'deskripsi' => 'Biaya yang dikeluarkan untuk membeli laptop.',
            ],
        ];

        foreach ($kriteriaData as $data) {
            Kriteria::create($data);
        }

        $kriterias = Kriteria::orderBy('urutan')->get()->pluck('id')->toArray();

        // Data laptop dan skor (urutan: Performa, Processor, Berat, Layar, Baterai, Harga)
        $laptops = [
            ['ASUS ROG Strix SCAR 17/18 (2023)', [5,5,2,5,4,2]],
            ['Razer Blade 16 (2023)', [5,5,3,5,5,1]],
            ['Lenovo Legion Pro 7i/7 (Gen 8, 2023)', [5,5,2,4,5,2]],
            ['MSI Titan GT77 HX (13V, 2023)', [5,5,1,5,5,1]],
            ['Alienware m18/m16 (R1, 2023)', [5,5,1,4,4,2]],
            ['ASUS ROG Zephyrus G14 (GA402, 2023)', [3,5,5,5,3,4]],
            ['Acer Predator Helios 16/18 (PH16/PH18, 2023)', [4,5,2,4,4,3]],
            ['HP Omen 16/17 (2023)', [4,4,2,4,3,3]],
            ['Dell G15/G16 (5530/7630, 2023)', [2,3,2,3,2,5]],
            ['Gigabyte AORUS 15/17 (X/B, 2023)', [4,5,2,4,5,3]],
            ['Lenovo LOQ 15/16 (2023)', [2,3,3,3,2,5]],
            ['MSI Katana/Sword/Cyborg (2023)', [2,3,3,3,2,5]],
            ['ASUS ROG Strix SCAR 16/18 (G634/G834, 2024)', [5,5,1,5,4,2]],
            ['Razer Blade 14 (2024)', [3,5,4,4,3,3]],
            ['Alienware m16 R2 (2024)', [3,4,2,4,4,4]],
            ['Lenovo Legion Pro 7i/5i (Gen 9, 2024)', [4,5,2,4,4,3]],
            ['ASUS ROG Zephyrus G14/G16 (GA403/GU605, 2024)', [3,5,4,5,3,3]],
            ['HP Omen Transcend 14 (2024)', [3,4,5,5,3,4]],
            ['Acer Predator Helios 16/18 (PHN16/PHN18, 2024)', [4,5,2,4,4,4]],
            ['MSI Raider GE68/78 HX (14V, 2024)', [5,5,2,5,5,2]],
            ['Gigabyte AORUS 16X/17X (2024)', [3,4,2,4,5,4]],
            ['ASUS TUF Gaming A15/A16/F15/F16 (2024)', [3,4,3,3,4,4]],
            ['MSI Titan 18 HX (AI/2025)', [5,5,1,5,5,1]],
            ['Razer Blade 16 (2025)', [5,5,3,5,5,1]],
            ['ASUS ROG Strix SCAR 16/18 (2025)', [5,5,1,5,4,1]],
            ['Lenovo Legion Pro 7i (Gen 10, 2025)', [5,5,2,5,5,2]],
            ['ASUS ROG Zephyrus G14 (2025)', [4,5,5,5,3,3]],
            ['Alienware m18 R2 / atau versi 2025', [5,5,1,5,5,1]],
            ['HP Omen 16/17 Transcend (2025)', [4,4,2,5,4,3]],
            ['Gigabyte AERO 16 OLED (Gaming Capable Creator)', [3,4,4,5,4,3]],
        ];

        foreach ($laptops as [$nama, $scores]) {
            $laptop = Laptop::create([
                'nama' => $nama,
                'merek' => explode(' ', $nama)[0],
                'specs' => null,
                'gambar' => null,
            ]);
            foreach ($scores as $i => $score) {
                NilaiKriteriaLaptop::create([
                    'id_kriteria' => $kriterias[$i],
                    'id_laptop' => $laptop->id,
                    'nilai' => $score,
                ]);
            }
        }
    }
}
