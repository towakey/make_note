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
    <table class="table">
        <tr>
            <th>編集者</th>
            <td>{{ $note->user->name }}</td>
        </tr>
        <tr>
            <th>登録日時</th>
            <td>{{ $note->created_at }}</td>
        </tr>
        <tr>
            <th>編集日時</th>
            <td>{{ $note->updated_at }}</td>
        </tr>
    </table>
@endsection