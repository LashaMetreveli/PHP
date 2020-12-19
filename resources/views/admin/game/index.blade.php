@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Games</div>

                    <div class="card-body">
                        <table class="table" id="games-table">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>

                            @foreach ($games as $game)
                                <tr>
                                    <td>{{ $game->id }}</td>
                                    <td>{{ $game->name }}</td>
                                    <td><img src="{{ url($game->image) }}" width="100" height="100"></td>
                                    <td>
                                        <button onclick="deleteGame(event)"
                            data-deleteurl="{{ route('game.delete', ['game' => $game->id]) }}"
                            class="btn btn-sm btn-danger">Delete</button>
                                            <a href="{{ route('game.edit', ['game' => $game->id]) }}"
                                                class="btn btn-sm btn-success">Edit</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

<script>
    function refreshGames() {
        $('#games-table').load(location.href + " #games-table > *");
    }

    function deleteGame(e) {
        console.log("hea")

        const el = $(e.target);
        const url = el.data('deleteurl')

        $.ajax({
            url: url,
            type: 'DELETE',
        })
            
            refreshGames()

    }

</script>
