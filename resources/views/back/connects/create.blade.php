<?php
$title="サーバー接続申請";
?>
@extends('back.layouts.base')

@section('content')
    <div class="card-header">{{ $title }}</div>
    <div class="card-body">
        {{ Form::open(['route' => 'back.connects.store']) }}
        @include('back.connects._form')
        {{ Form::close() }}
    </div>
@endsection