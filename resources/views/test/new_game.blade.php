@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">

        <form action="{{ route('games.store') }}" method="post">
            @csrf

            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="name" value="Challenge_1">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="level" name="level" placeholder="Level">
            </div>

            <div class="form-group">
                <input type="number" class="form-control" id="playersNo" name="playersNo" placeholder="players">
            </div>

            <div class="form-group">
                <input type="number" class="form-control" id="missions" name="missions" placeholder="Misions">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="cost" name="cost" placeholder="Cost">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="prize" name="prize" placeholder="Prize">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="city" name="city" value="Esfahan">
            </div>


            <div class="form-group">
                <input type="text" class="form-control" id="region" name="region" value="Baharestan">
            </div>


            <button type="submit" class="btn btn-primary">ثبت</button>
        </form>

    </div>
</div>
<div>

</div>
@stop