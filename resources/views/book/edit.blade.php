@extends('book/layout')
@section('content')
{{--form.blade.phpの内容を@includeで挿入した時に引数に指定した第1引数target変数に第2引数update変数の内容を代入する--}}
@include('book/form', ['target' => 'update']) 
@endsection