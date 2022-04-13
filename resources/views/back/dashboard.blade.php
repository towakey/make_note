<?php
$title = 'DASHBOARD';
?>
@extends('back.layouts.base')

@section('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    <table class="table table-bordered table-hover table-sm">
        <tbody>
            <tr>
                <td><a href="{{ route('back.notes.index') }}">投稿管理</a></td>
            </tr>
            <tr>
                <td><a href="{{ route('back.tags.index') }}">タグ管理</a></td>
            </tr>
            @if(auth()->user()->role === 1)
            <tr>
                <td><a href="{{ route('back.users.index') }}">ユーザー管理</a></td>
            </tr>
            <tr>
                <td><a href="{{ route('back.connects.index') }}">サーバー管理</a></td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
