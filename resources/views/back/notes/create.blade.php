<?php
$title="投稿画面";
?>
@extends('back.layouts.base')

@section('content')
    <div class="card-header">{{ $title }}</div>
    <div class="card-body">
        {{ Form::open(['route' => 'back.notes.store']) }}
        @include('back.notes._form')
        {{ Form::close() }}
    </div>
@endsection