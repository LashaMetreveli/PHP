<div class="col-md-4">
    <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="{{ url($game->image) }}" alt="{{ $game->name }}">
        <div class="card-body">
            <h4 class="card-text font-weight-bold">{{ $game->name }}</h4>
            <p class="card-text">description: {{ substr($game->description, 0, 150) }}</p>
            <p class="card-text">rating:<strong> {{$game->stars }}  stars </strong></p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a 
                        class="btn btn-sm btn-outline-secondary">{{ $game->category ? $game->category->name : 'No Categeory' }}</a>
                </div>
                <small class="text-muted">{{ $game->created_at->diffForHumans(now()) }}</small>
            </div>
        </div>
    </div>
</div>
