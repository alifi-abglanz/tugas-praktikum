<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin E-Commerce',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'User E-Commerce',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );

        $categories = collect([
            'Elektronik',
            'Gaming',
            'Aksesoris',
            'Office',
        ])->mapWithKeys(fn (string $name) => [
            $name => Category::firstOrCreate(['name' => $name]),
        ]);

        $products = [
            [
                'name' => 'Laptop Gaming',
                'description' => 'Laptop performa tinggi untuk bermain dan bekerja.',
                'price' => 18500000,
                'stock' => 10,
                'categories' => ['Elektronik', 'Gaming'],
            ],
            [
                'name' => 'Mouse Wireless',
                'description' => 'Mouse ringan dengan koneksi nirkabel.',
                'price' => 250000,
                'stock' => 35,
                'categories' => ['Elektronik', 'Aksesoris'],
            ],
            [
                'name' => 'Keyboard Office',
                'description' => 'Keyboard nyaman untuk penggunaan harian.',
                'price' => 350000,
                'stock' => 20,
                'categories' => ['Aksesoris', 'Office'],
            ],
        ];

        foreach ($products as $item) {
            $product = Product::updateOrCreate(
                ['name' => $item['name']],
                [
                    'user_id' => $admin->id,
                    'description' => $item['description'],
                    'price' => $item['price'],
                    'stock' => $item['stock'],
                ]
            );

            $product->categories()->sync(
                collect($item['categories'])->map(fn (string $name) => $categories[$name]->id)->all()
            );
        }
    }
}
