<?php
$title="タグ投稿画面";
?>
@extends('back.layouts.base')

@section('content')
    <div class="card-header">{{ $title }}</div>
    <div class="card-body">
        {{ Form::open(['route' => 'back.tags.store']) }}
        @include('back.tags._form')
        {{ Form::close() }}
    </div>
@endsection