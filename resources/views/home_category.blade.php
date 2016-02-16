<!-- Home category title -->
<div class="row page-intro">
    <div class="col-lg-12">
        <h1> {{ $home_category['title'] }}
            <small>
                <small><a href="{{ URL::to(strtolower($home_category['title'])) }}">Visualizza altro</a></small>
            </small>
        </h1>
    </div>
</div>
<br>

<!-- Home category news -->
<div class="row">

    @foreach($home_category['news'] as $news)

        <article class="col-md-4 article-intro">
            <a href="{{ URL::to(strtolower($home_category['title'].'/'.$news->id)) }}">
                <img class="img-responsive img-rounded" src="data:{{$news->previewtype}};base64,{{base64_encode($news->preview)}}" style="width: 700px; height: 270px;" alt="">
            </a>
            <h3>
                <a href="{{ URL::to(strtolower($home_category['title'].'/'.$news->id)) }}">{{$news->title}}</a>
            </h3>
            <p>{{$news->subtitle}}</p>
        </article>

    @endforeach

</div>