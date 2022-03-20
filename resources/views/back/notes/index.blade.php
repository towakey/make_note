<?php
$title = "投稿一覧";
?>
@extends('back.layouts.base')

@section('content')
<div class="card-header">投稿一覧</div>
<div class="card-body">
    {{ link_to_route('back.notes.create', '新規登録', null, ['class' => 'btn btn-primary mb-3']) }}
    @if(0 < $notes->count())
        <table class="table table-striped table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">TITLE</th>
                    <th scope="col" style="width: 4.3em">状態</th>
                    <th scope="col" style="width: 9em">公開日</th>
                    <th scope="col" style="width: 12em">編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notes as $note)
                    <tr>
                        <td>{{ $note->id }}</td>
                        <td>{{ $note->title }}</td>
                        <td>{{ $note->is_public_label }}</td>
                        <td>{{ $note->published_format }}</td>
                        <td class="d-flex justify-content-center">
                            {{ link_to_route('front.notes.show', '詳細', $note, [
                                'class' => 'btn btn-secondary btn-sm m-1',
                                'target' => '_blank'
                            ]) }}
                            {{ link_to_route('front.notes.edit', '編集', $note, [
                                'class' => 'btn btn-secondary btn-sm m-1',
                            ]) }}
                            {{ Form::model($post, [
                                'route' => ['back.notes.destroy', $note],
                                'method' => 'delete'
                            ]) }}
                            {{
                                Form::submit('削除', [
                                    'onclick' => "return confirm('削除しますか？')",
                                    'class' => 'btn btn-danger btn-sm m-1'
                                ])
                            }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $notes->links() }}
        </div>
    @endif
</div>
@endsection