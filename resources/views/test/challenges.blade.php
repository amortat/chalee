@extends('layouts.app')

@section('content')


    <div class="form-row">
        <div class="col-md-12 mb-3">

            <a href="{{ route('challenges.create') }}" target="_self" class="btn btn-primary">+</a>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">game</th>
                    <th scope="col">slug</th>
                    <th scope="col">Level</th>
                    <th scope="col">status</th>
                    <th scope="col">player number</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Win</th>
                    <th scope="col">player in</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($challenges as $challenge)

                    <tr>
                        <th scope="row">{{ $challenge->id }}</th>
                        <td>{{ $challenge->game->name}}</td>
                        <td>{{ $challenge->slug}}</td>
                        <td>{{ $challenge->game->level}}</td>
                        <td>{{ $challenge->status}}</td>
                        <td>{{ $challenge->game->player_n }}</td>
                        <td>{{ $challenge->game->in_price }}</td>
                        <td>{{ $challenge->game->win_price }}</td>
                        <td>{{ $challenge->users_count }}</td>
                        <td>
                            <a href="{{ route('challenges.show',$challenge->id) }}" class="btn btn-outline-success m-1">S</a>
                            <a href="{{ route('challenges.edit',$challenge->id) }}" class="btn btn-outline-warning m-1">U</a>
                            <form action="{{ route('challenges.destroy', $challenge->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-outline-danger m-1">D</button>

                            </form></td>
                    </tr>
                @endforeach
                </tbody>
            </table>




@stop