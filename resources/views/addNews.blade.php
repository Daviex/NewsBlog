@extends('layout')

@section('content')

    <div class="container news add-news">
        <h2>Aggiungi una news</h2>
        <br>

        <!-- add News Form -->
        <form class="form-horizontal" role="form" method="post" action="{{URL::to('addNews')}}" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-2">Titolo</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="2" id="title" name="title" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Sottotitolo</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="2" id="subtitle" name="subtitle" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Categoria</label>
                <div class="col-sm-10">
                    <select class="form-control" name="category" required>
                        <option value="" selected="selected">-</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Anteprima</label>
                <div class="col-sm-10">
                    <input type="file" name="preview" required/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">In evidenza</label>
                <div class="col-sm-10">
                    <label class="radio-inline"><input type="radio" name="highlighted" value="true">Si</label>
                    <label class="radio-inline"><input type="radio" name="highlighted" value="false" checked>No</label>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Testo</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="12" id="content" name="content" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Foto news</label>
                <div class="col-sm-10">
                    <input type="file" name="photos[]" multiple>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    @if(Auth::check()) <input type="hidden" name="userid" value="{{Auth::user()->id}}"/> @endif
                    <button type="submit" class="btn btn-default btn-block">Aggiungi</button>
                </div>
            </div>
        </form>

    </div>

@endsection