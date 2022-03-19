<?php
$title="投稿詳細";
?>
@extends('front.layouts.base')

@section('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    <h2>{{ $note->title }}</h2>
    <time>{{ $note->published_at->format('Y-m-d') }}</time>
    <div>{!! nl2br(e($note->body)) !!}</div>
    {!!
    link_to_route(
        'front.notes.index', '一覧へ戻る', null,
        ['class' => 'btn btn-secondary']
    )
    !!}
</div>
    
@endsection