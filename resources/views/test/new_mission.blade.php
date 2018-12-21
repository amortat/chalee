@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
    <form action="{{ route('missions.store') }}" method="post">
        @csrf

        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" id="job" name="job" placeholder="job" value="">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" id="key" name="key" placeholder="key">
        </div>

        <div class="form-group">
            <input type="file" class="form-control" id="photo_path" name="photo_path" placeholder="Choose photo" value="default_avatar.png">
        </div>

        <div class="form-group">
            <input type="number" class="form-control" id="level" name="level" placeholder="Level">
        </div>


        <button type="submit" class="btn btn-primary">ثبت</button>
    </form>

        </div>
    </div>

@stop