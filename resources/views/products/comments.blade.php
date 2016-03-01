@foreach($comments as $comment)
<div class="well">
	<h4>{{ $comment->author->name }}</h4>
	<p>on {{ $comment->created_at->format('d/m/Y') }}</p>
	<p>{{ $comment->message }}</p>
</div>
@endforeach