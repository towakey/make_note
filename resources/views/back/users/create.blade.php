<?php
$title="投稿画面";
?>
@extends('back.layouts.base')

@section('content')
    <div class="card-header">{{ $title }}</div>
    <div class="card-body">
        {{ Form::open(['route' => 'back.users.store']) }}
        @include('back.users._form')
        {{ Form::close() }}
    </div>
@endsection