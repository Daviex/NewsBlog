@extends('layout')

@section('content')

    <div class="container news">

        <h2>{{ucfirst($category)}}</h2>

        <!-- Category news -->
        @for ($i = 0; $i < count($news); $i++)

            @if($i % 3 == 0)
                <div class="row category">
            @endif

            <article class="col-md-4 article-intro">
                <a href="{{URL::to($category.'/'.$news[$i]->id)}}">
                    <img class="img-responsive img-rounded" src="data:{{$news[$i]->previewtype}};base64,{{base64_encode($news[$i]->preview)}}" style="width: 700px; height: 270px;" alt="">
                </a>
                <h3>
                    <a href="{{URL::to($category.'/'.$news[$i]->id)}}">{{ $news[$i]->title }}</a>
                </h3>
                <p>{{ $news[$i]->subtitle }}</p>
            </article>

            @if($i % 3 == 2)
                </div>
            @endif

        @endfor

    </div>

@endsection