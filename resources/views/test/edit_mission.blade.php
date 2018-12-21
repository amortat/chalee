@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">

    <form action="{{ route('missions.update', $mission) }}" method="post">
        @csrf
        @method('patch')

        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ $mission->name }}">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{ $mission->slug }}">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" id="job" name="job" placeholder="job" value="{{ $mission->job }}">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" id="key" name="key" value="{{ $mission->key }}">
        </div>

        <div class="form-group">
            <input type="file" class="form-control" id="photo_path" name="photo_path" value="{{ $mission->photo_path }}">
        </div>

        <div class="form-group">
            <input type="number" class="form-control" id="level" name="level" value="{{ $mission->level }}">
        </div>


        <button type="submit" class="btn btn-primary">edit</button>
    </form>
            <form action="{{ route('missions.destroy', $mission) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger mt-3">delete</button>
            </form>

        </div>
    </div>

@stop