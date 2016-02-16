<div class="jumbotron feature">
    <div class="container">

        <!-- Home carousel-->
        <div id="feature-carousel" class="carousel slide" data-ride="carousel">

            <!-- Carousel indicators -->
            <ol class="carousel-indicators">

                @for($i = 0 ; $i<count($carousel_news); $i++)

                    <li data-target="#feature-carousel" data-slide-to="{{$i}}" class="{{ $i==0 ? 'active' : '' }}"></li>

                @endfor

            </ol>

            <!-- Carousel images -->
            <div class="carousel-inner" role="listbox">

                @for($i=0 ; $i<count($carousel_news); $i++)

                    <div class="item {{ $i==0 ? 'active' : '' }}">
                        <a href="{{ URL::to(lcfirst($carousel_news[$i]['category']).'/'.$carousel_news[$i]['news']->id) }}">
                            <img class="img-responsive" src="data:{{$carousel_news[$i]['news']->previewtype}};base64,{{base64_encode($carousel_news[$i]['news']->preview)}}" style="width: 1170px" alt="">
                        </a>
                        <div class="carousel-caption">
                            <h3 class="carousel-title">{{ $carousel_news[$i]['news']->title }}</h3>
                            <p class="carousel-subtitle">{{ $carousel_news[$i]['news']->subtitle }}</p>
                        </div>
                    </div>

                @endfor

            </div>

            <!-- Carousel controls -->
            <a class="left carousel-control" href="#feature-carousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Precedente</span>
            </a>
            <a class="right carousel-control" href="#feature-carousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Successivo</span>
            </a>
        </div>

    </div>
</div>