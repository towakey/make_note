<?php
$title="投稿詳細";
?>
@extends('front.layouts.base')

@section('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    <h2>{{ $note->title }}</h2>
    <time>{{ $note->publised_format }}</time>
    <div>
        {!! nl2br(e($note->body)) !!}
    </div>
    @if(0 < count($note->tags))
        <ul class="mt-3">
            @foreach ($note->tags as $tag)
                <li>
                    {{ link_to_route('front.notes.index.tag', $tag->name, $tag->slug) }}
                </li>
            @endforeach
        </ul>
    @endif
    {!!
    link_to_route(
        'front.notes.index', '一覧へ戻る', null,
        ['class' => 'btn btn-secondary']
    )
    !!}
</div>
    
@endsection