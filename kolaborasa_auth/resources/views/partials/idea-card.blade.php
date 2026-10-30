<a href="{{ route('ideas.show', $idea) }}" class="card">
    <div class="card-img" @if ($idea->gambar_url) style="background-image:url('{{ $idea->gambar_url }}')" @endif></div>
    <div class="card-body">
        <span class="badge">{{ $idea->category->nama }}</span>
        <h3>{{ $idea->judul }}</h3>
        <p>{{ \Illuminate\Support\Str::limit($idea->deskripsi, 90) }}</p>
        <small>oleh {{ $idea->user->name }} · {{ $idea->created_at->diffForHumans() }}</small>
    </div>
</a>