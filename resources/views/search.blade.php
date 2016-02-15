@extends('layout')

@section('content')

    <div class="container news">
        <h2>Risultati della ricerca</h2>

        @for ($i = 0; $i < count($results); $i++)

            @if($i % 3 == 0)
                <div class="row category">
            @endif

            <article class="col-md-4 article-intro">
                <a href="{{URL::to(lcfirst($results[$i]['category']).'/'.$results[$i]['news']->id)}}">
                    <img class="img-responsive img-rounded" src="data:{{$results[$i]['news']->previewtype}};base64,{{base64_encode($results[$i]['news']->preview)}}" style="width: 700px; height: 270px;" alt="">
                </a>
                <h3>
                    <a href="{{URL::to(lcfirst($results[$i]['category']).'/'.$results[$i]['news']->id)}}">{{ $results[$i]['news']->title }}</a>
                </h3>
                <p>{{ $results[$i]['news']->subtitle }}</p>
            </article>

            @if($i % 3 == 2)
                </div>
            @endif

        @endfor

    </div>

@endsection