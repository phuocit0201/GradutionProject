<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $databases = [
            [
                'table' => 'roles',
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'Quản trị viên',
                    ],
                    [
                        'id' => 2,
                        'name' => 'Nhân Viên',
                    ],
                    [
                        'id' => 3,
                        'name' => 'Khách hàng',
                    ]
                ],
            ],
            [
                'table' => 'users',
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'Admin',
                        'email' => 'admin@gmail.com',
                        'password' => Hash::make('password'),
                        'email_verified_at' => now(),
                        'phone_number' => '0000000000',
                        'active' => 1,
                        'role_id' => 1
                    ]
                ]
            ],
            [
                'table' => 'brands',
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'Nike'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Gucci'
                    ],
                    [
                        'id' => 3,
                        'name' => 'Adidas'
                    ],
                    [
                        'id' => 4,
                        'name' => 'Chanel'
                    ],
                    [
                        'id' => 5,
                        'name' => 'Uniqlo'
                    ],
                ]
            ],
            [
                'table' => 'categories',
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'Thời Trang Nam',
                        'parent_id' => 0,
                        'slug' => 'thoi-trang-nam'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Thời Trang Nữ',
                        'parent_id' => 0,
                        'slug' => 'thoi-trang-nu'
                    ],
                    [
                        'id' => 3,
                        'name' => 'Áo polo',
                        'parent_id' => 1,
                        'slug' => 'ao-polo'
                    ],
                    [
                        'id' => 4,
                        'name' => 'Áo thể thao',
                        'parent_id' => 1,
                        'slug' => 'ao-the-thao'
                    ],
                    [
                        'id' => 5,
                        'name' => 'Áo Sơ Mi',
                        'parent_id' => 1,
                        'slug' => 'ao-so-mi'
                    ],
                    [
                        'id' => 6,
                        'name' => 'Áo Thun',
                        'parent_id' => 1,
                        'slug' => 'ao-thun'
                    ],
                    [
                        'id' => 7,
                        'name' => 'Quần Jeans',
                        'parent_id' => 1,
                        'slug' => 'quan-jeans'
                    ],
                    [
                        'id' => 8,
                        'name' => 'Quần Shorts',
                        'parent_id' => 1,
                        'slug' => 'quan-shorts'
                    ],
                    [
                        'id' => 9,
                        'name' => 'Áo Thun',
                        'parent_id' => 2,
                        'slug' => 'ao-thun-1'
                    ],
                    [
                        'id' => 10,
                        'name' => 'Đầm Váy',
                        'parent_id' => 2,
                        'slug' => 'dam-vay'
                    ],
                    [
                        'id' => 11,
                        'name' => 'Áo Sơ Mi',
                        'parent_id' => 2,
                        'slug' => 'ao-so-mi-1'
                    ],
                    [
                        'id' => 12,
                        'name' => 'Chân Váy',
                        'parent_id' => 2,
                        'slug' => 'chan-vay'
                    ],
                    [
                        'id' => 13,
                        'name' => 'Quần Jeans',
                        'parent_id' => 2,
                        'slug' => 'quan-jeans-1'
                    ],
                ]
            ],
            [
                'table' => 'payments',
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'Khi nhận hàng',
                    ],
                    [
                        'id' => 2,
                        'name' => 'Ví điện tử Momo',
                    ],
                ]
            ],
            [
                'table' => 'colors',
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'Trắng'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Đen'
                    ],
                    [
                        'id' => 3,
                        'name' => 'Xám'
                    ],
                    [
                        'id' => 4,
                        'name' => 'Đỏ'
                    ],
                    [
                        'id' => 5,
                        'name' => 'Vàng'
                    ],
                    [
                        'id' => 6,
                        'name' => 'Xanh'
                    ],
                    [
                        'id' => 7,
                        'name' => 'Tím'
                    ],
                ]
            ],
            [
                'table' => 'sizes',
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'S'
                    ],
                    [
                        'id' => 2,
                        'name' => 'M'
                    ],
                    [
                        'id' => 3,
                        'name' => 'L'
                    ],
                    [
                        'id' => 4,
                        'name' => 'XL'
                    ],
                ]
            ]
        ];

        foreach ($databases as $database ) {
            $recordNumber = DB::table($database['table'])->count();
            foreach ($database['data'] as $key => $record) {
                if ($key >= $recordNumber)
                DB::table($database['table'])->insert($record);
            }
        }
    }
}