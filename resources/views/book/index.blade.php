<!--<head>
    <title>Laravel Sample</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"">
</head>-->
@extends('book/layout')
@section('content')
    <div class="container ops-main">
        <div class="row">
            <div class="col-md-12">
                <h3 class="ops-title">書籍一覧</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <table class="table text-center">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">書籍名</th>
                        <th class="text-center">価格</th>
                        <th class="text-center">消費税</th>
                        <th class="text-center">総計</th>
                        <th class="text-center">著者</th>
                        <th class="text-center">削除</th>
                        <th class="text-center">備考</th>
                        <th class="text-center">いいね</th>
                    </tr>
                    @foreach($books as $book)
                        <tr>
                            <td>
                                <a href="/book/{{ $book->id }}/edit">{{ $book->id }}</a>
                            </td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->price }}</td>
                            <td>{{ $book->tax() }}</td>
                            <td>{{ $book->totalprice() }}</td>
                            <td>{{ $book->author }}</td>
                            <td>
                                <form action="/book/{{ $book->id }}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
                                </form>
                            </td>
                            <td>{{ $book->about }}</td>

{{--                     if条件文 Contentsテーブルのtext_ai_auto_colorにtrue,falseのどちらかのデータをAdmin経由で登録しtrueならwhite,falseならblack      --}}
{{--                            <div class="texts @if(($content->text_ai_auto_color)) text-white @else text-black @endif">--}}
{{--                            <div class="header-nav-links">--}}
{{--                                <a href="{{route('ec.measure.measuring_setup')}}" class="header-nav-link @if(($content->text_header_nav_links_sp_color)) text-white_sp @else text-black_sp @endif">Measuring</a>--}}
{{--                                <a href="{{route('ec.regular_items.index')}}" class="header-nav-link @if(($content->text_header_nav_links_sp_color)) text-white_sp @else  text-black_sp @endif ">Products</a>--}}
{{--                                <a href="{{route('ec.shops.index')}}" class="header-nav-link @if(($content->text_header_nav_links_sp_color)) text-white_sp @else text-black_sp @endif">Stores</a>--}}
{{--                                <a href="{{route('ec.reservations.create')}}" class="header-nav-link @if(($content->text_header_nav_links_sp_color)) text-white @else text-black @endif">Reservation</a>--}}
{{--                            </div>--}}



                        </tr>
                    @endforeach
                </table>
                <div><a href="/book/create" class="btn btn-default">新規作成</a></div>
            </div>
        </div>
        @endsection
    </div>
