<?php
$title="編集";
?>
@extends('back.layouts.base')

@section('content')
    <div class="card-header">編集</div>
    <div class="card-body">
        {!! Form::model($note, [
            'route' => ['back.notes.update', $note],
            'method' => 'put'
        ]) !!}
        @include('back.notes._form')
        {!! Form::close() !!}
    </div>
@endsection