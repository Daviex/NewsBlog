@extends('layout')

@section('content')

    <div class="container news add-news">
        <h2>Aggiungi una sezione</h2>
        <br>

        <form class="form-horizontal" role="form" method="post" action="{{URL::to('addCategory')}}">
            <div class="form-group">
                <label class="control-label col-sm-2">Titolo</label>
                <div class="col-sm-6">
                    <input class="form-control" name="title" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Aggiungi</button>
                </div>
            </div>
        </form>
    </div>

@endsection