<?php
$title="アカウント情報";
?>
@extends('back.layouts.base')

@section('content')
    <div class="card-header">{{ $title }}</div>
    <div class="card-body">
        <table class="table">
            <tr>
                <td style="width: 9em">ID</td>
                <td>{{ auth()->user()->id }}</td>
            </tr>
            <tr>
                <td>ユーザー名</td>
                <td>{{ auth()->user()->name }}</td>
            </tr>
            <tr>
                <td>Eメール</td>
                <td>{{ auth()->user()->email }}</td>
            </tr>
            <tr>
                <td>権限</td>
                <td>{{ auth()->user()->role_label }}</td>
            </tr>
            <tr>
                <td>登録日</td>
                <td>{{ auth()->user()->created_at }}</td>
            </tr>
        </table>
    </div>
@endsection