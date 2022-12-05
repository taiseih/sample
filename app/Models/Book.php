<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Http\Controllers\BookController;


class Book extends Model //Bookクラスのインスタンスはどこかで作成されてる
{
    use HasFactory;

    public function tax(){ //taxメソッド
        return $this->price*0.1;//$thisはクラスのインスタンスを指定してるBookクラスのインスタンスのpriceに*0.1をして関数taxに値を返して実行する
    }

    public function totalprice(){
        return $this->price+$this->tax(); //Bookクラスのインスタンスの$priceにBookクラスのインスタンスのtaxメソッドを足して実行された結果をtotalprice関数に返す
    }
//    protected $table = 'books';
}
