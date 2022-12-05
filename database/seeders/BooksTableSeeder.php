<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->truncate();

        // 初期データ用意（列名をキーとする連想配列）
        $books = [
            ['name' => 'PHP Book',
                'price' => 2000,
                'author' => 'PHPER',
                'about' => '備考'],
        ];

        // 登録
        foreach($books as $book) {//(00as00は'in'と同じ)
            Book::create($book);
        }
        //
    }

}
