<?php
$title = "投稿一覧";
?>
@extends('back.layouts.base')

@section('content')
<div class="card-header">投稿一覧</div>
<div class="card-body">
    {{ link_to_route('back.connects.create', 'サーバー接続申請', null, ['class' => 'btn btn-primary mb-3']) }}
    @if(0 < $connects->count())
        <table class="table table-striped table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">サーバー名</th>
                    <th scope="col">シリアル</th>
                    <th scope="col">token</th>
                    <th scope="col">状態</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($connects as $connect)
                    <tr>
                        <td>{{ $connect->id }}</td>
                        <td>{{ $connect->name }}</td>
                        <td>{{ $connect->serial }}</td>
                        <td>{{ $connect->token }}</td>
                        <td>{{ $connect->is_approval_label }}</td>
                        <td class="d-flex justify-content-center">
                            {{-- {{ link_to_route('back.connects.approval', '承認', $connect, [
                                'class' => 'btn btn-secondary btn-sm m-1',
                            ]) }}
                            {{ link_to_route('back.connects.rejection', '拒否', $connect, [
                                'class' => 'btn btn-danger btn-sm m-1',
                            ]) }} --}}
                            {{ Form::model($connect, [
                                'route' => ['back.connects.update', $connect],
                                'method' => 'put'
                            ]) }}
                            {{ Form::submit('承認', [
                                'name' => 'approval',
                                'class' => 'btn btn-primary btn-sm m-1'
                            ]) }}
                            {{ Form::submit('拒否', [
                                'name' => 'rejection',
                                'class' => 'btn btn-danger btn-sm m-1'
                            ]) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $connects->links() }}
        </div>
    @endif
</div>
@endsection