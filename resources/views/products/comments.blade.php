<div class="comment">
	<p class="comment__name">{{ $comment->author->name }}</p>
	<p class="comment__date">on {{ $comment->created_at->format('d/m/Y') }}</p>
	<p class="comment__text">{{ $comment->message }}</p>
</div>
