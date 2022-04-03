<?php
$title="投稿一覧";
?>
@extends('front.layouts.base')

@section('content')
<div class="card border-light mb-3">
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    <ul class="nav nav-pills mb-2">
        <li class="nav-item">
            {{ link_to_route('front.notes.index', 'すべて', null, [
                'class' => 'nav-link'.
                (request()->segment(3) === null ? ' active' : '')
            ]) }}
        </li>
        @foreach ($tags as $tag)
            <li class="nav-item">
                {{ link_to_route('front.notes.index.tag', $tag->name, $tag->slug, [
                    'class' => 'nav-link'.
                    (request()->segment(3) === $tag->slug ? ' active' : '')
                ]) }}
            </li>
        @endforeach
    </ul>
    
    @if($notes->count() <= 0)
        <p>表示できる投稿はありません</p>
    @else
        <table class="table">
            @foreach ($notes as $note)
                <tr>
                    <td>{{ $note->published_format }}</td>
                    <td>{!! link_to_route('front.notes.show', $note->title, $note) !!}</td>
                    <td>
                        @foreach ($note->tags as $tag)
                            <span class="badge badge-info">{{ $tag->name }}</span>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-center">
            {{ $notes->links() }}
        </div>
    @endif
</div>
</div>
@endsection
