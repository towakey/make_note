<?php
$title="投稿一覧";
?>
@extends('front.layouts.base')

@section('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    @if($notes->count() <= 0)
        <p>表示できる投稿はありません</p>
    @else
        <table class="table">
            @foreach ($notes as $note)
                <tr>
                    <td>{{ $note->published_at->format('Y-m-d') }}</td>
                    <td>{!! link_to_route('front.notes.show', $note->title, $note) !!}</td>
                </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-center">
            {{ $notes->links() }}
        </div>
    @endif
</div>
@endsection