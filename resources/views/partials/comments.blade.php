@if($comments)
    <div class="comments mt-4">
        <h3 class="font-semibold">Comments</h3>
        @foreach ($comments as $comment)
            <div class="comment p-2">
                <p>{{ $comment->content }}</p>
                <small>Commented by {{ $comment->email ?? 'Anonymous' }} on {{ $comment->created_at->format('M d, Y') }}</small>
            </div>
        @endforeach
    </div>
@endif
