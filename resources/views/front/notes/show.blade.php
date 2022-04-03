<?php
$title="投稿詳細";
?>
@extends('front.layouts.base')

@section('css')
@endsection

@section('end-javascript')
@endsection

@section('nav')
@endsection

@section('content')
<div class="card border-light mb-3">
<div class="card-header">{{ $note->title }}</div>
<div class="card-body">
    <time>{{ $note->publised_format }}</time>
    <div>
        {{ $parse }}
    </div>
    @if(0 < count($note->tags))
        <ul class="mt-3">
            @foreach ($note->tags as $tag)
                <li class="badge badge-info">
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
</div>    
@endsection
