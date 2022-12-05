<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use function PHPUnit\Framework\stringContains;

class BookController extends Controller
{




    public function z(){
        $this->index();//$thisでクラス（BookController）のインスタンス（どこかにある）のindex関数を指定してる　BookControllerクラスのインスタンスのindexメソッドを実行する
//        index();
    }

//    public function dddd(){
//        return 'hello'; //ddddという関数にhelloという文字列を返して実行する
//    }

    public function index()
    {


//        bulkinsertの実装
//        DB::table('year_months')->truncate();　
//
//        $year_month_arr = [];　$year_month_arr変数に空の配列を代入している
//
//        for ($year = 2022; $year <= 2050; $year++) {
//            for ($month=1;$month<=12;$month++){　
//                $year_month_arr[] = [　空の配列にyearカラムに$year,monthカラムに$monthの計算結果を代入している
//                    'year' => $year,
//                    'month' => $month
//                ];
//            }
//        }
//        YearMonth::insert($year_month_arr);　　YearMonthクラスのinsertメソッドに渡した$year_month_arrという配列を実行する

//        sumetaのメモ
//        for($year=2022;$year<=2050;$year++){
//
//
//            for($month=1;$month<=12;$month++){
//                YearMonth::create([
//                    'year' => $year,
//                    'month' => $month
//                ]);
//            }
//        } これが正しいコード　下と全く同じ


//        for ($year = 2022; $year <= 2050; $year++) {//　親ループ　条件は2022に1ずつ足して2050までループし、2050になったらループを抜ける
//
//            for ($month = 1; $month <= 12; $month++) {//　　子ループ　条件は1に1ずつ足して12までループし、12になったらループを抜ける
//                $year_months = [//  配列$year_month
//                    [$year, $month]//  配列に渡す変数
//                ];
//                var_dump($year_months);

//        クソコード　３回目の謎ループを回している
//                $year_months =[
//                    [
//                        'year' => $year,    yearカラムに$yearの計算結果を代入している
//                        'month' => $month　　monthカラムに$monthの計算結果を代入している
//                    ]
//                ];
//              ここで謎の一回ずつしか回さないループがある　いらない
//                foreach ($year_months as $year_month){　foreachで配列を登録している　$year_monthsという配列の値を$year_monthに代入している
//                    YearMonth::create($year_month);   YearMonthクラスのcreateメソッドに渡した$year_monthを実行する　createメソッドでDBに登録する
//                }
//
//        配列を作るならせめて↓こっち
//        $year_month = [
//                [
//        'year' => $year,
//        'month' => $month
//                ]
//        ];
//              YearMonth::create($year_month);
//            }
//        }





//         DBよりBookテーブルの値を全て取得
        $books = Book::all();// Bookクラスのallメソッドを実行し$booksに代入する
//        1000円<=を指定して表示する
//        $books = Book::select()
//        ->where('price','<=',1000)
//        ->get();

        //1000円以下の本を表示
//        $books = Book::select()
//            ->where('price','<',1000)
//            ->get();



        // 取得した値をビュー「book/index」に渡す
        return view('book/index', compact('books'));//compact関数にbooksの値を渡して実行し、実行された結果をさらにview関数に渡してindex.bradeに渡す

    }

    // 更新（編集）
    public function edit($id)
    {
        // DBよりURIパラメータと同じIDを持つBookの情報を取得
        $book = Book::findOrFail($id);//モデルが見つからなかった場合に例外を投げる

        // 取得した値をビュー「book/edit」に渡す
        // return view('book/edit', compact('book'));　compactは連想配列を作るための関数のため下の記述と同義'=>'と'compact'

        echo $id;
        return view('book/edit', [
            "book" => $book
        ]);
    }

    //更新内容の登録
    public function update(Request $request, $id)
    {
        $book = Book::findOrfail($id);// BookクラスのfindOrfailメソッドに$idという変数を渡して実行し$bookに代入する
        $book->name = $request->name;// Requestクラスのインスタンスの$requestのnameプロパティーの値をBookクラスのインスタンスの$bookのnameプロパティに代入する
        $book->price = $request->price;// Requestクラスのインスタンスの$requestのpriceプロパティーの値をBookクラスのインスタンスの$bookのpriceプロパティーに代入する
        $book->author = $request->author;// Requestクラスのインスタンスの$requestのauthorプロパティーの値をBookクラスのインスタンスの$bookのauthorプロパティーに代入する
        $book->about = $request->about;// Requestクラスのインスタンスの$requestのaboutプロパティーの値をBookクラスのインスタンスの$bookのaboutプロパティーに代入する
        $book->save();// Bookクラスのインスタンスの$bookのsaveメソッドを実行する

        return redirect("/book");// redirect関数を実行し/bookに移動する

    }
    //削除処理
    public function destroy($id)// destroyという関数を作って変数$idを渡して実行する
    {
        $book = Book::findOrFail($id);// BookクラスのFindOrFailメソッドに$idという変数を渡して実行し$bookに代入する
        $book->delete();// Bookクラスのインスタンスの$bookのdeleteメソッドを実行する

        return redirect("/book");// redirect関数を実行し/bookに移動する
    }
    //新規作成
    public function create()
    {
        // 空の$bookを渡す
        $book = new Book();//new クラス名でインスタンスが作られるため、空のBookクラスを渡す　// new Bookを実行しインスタンスを作成し変数$bookに代入する
        return view('book/create', compact('book'));
    }
    // 登録
    public function store(Request $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->price = $request->price;
        $book->author = $request->author;
        $book->about = $request->about;
        $book->save();

        return redirect("/book");
    }
    //
}
