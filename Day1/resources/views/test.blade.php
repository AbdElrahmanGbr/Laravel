<!-- <?php $name = 'mohammed'; ?>
<?php $articles = ['Laravel', 'PHP', 'Javascript']; ?> -->

@foreach ($articles as $article)
    <h1>{{ $article }}</h1>
@endforeach

hello from {{ $name }}

