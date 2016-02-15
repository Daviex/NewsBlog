@extends('layout')

@section('content')

    <div class="container news">

        <h2 class="news-font">{{$news->title}}</h2>
        <h4 class="subtitle news-font">{{$news->subtitle}}</h4>
        <img src="data:{{$news->previewtype}};base64,{{base64_encode($news->preview)}}"
             class="news-main-image float-left">
        <p class="news-font news" align="justify">
            {{$news->content}}
        </p>
        <h5 class="news-font align-right">Scritto da <i><strong>{{$user->name}}</strong></i></h5>

        <br><br>

        @if(count($photos)>0)

            <div id="news-carousel" class="carousel slide news-carousel center-block" data-ride="carousel">

                <ol class="carousel-indicators">
                    @for($i = 0 ; $i<count($photos); $i++)

                        <li data-target="#feature-carousel" data-slide-to="{{$i}}"
                            class="{{ $i==0 ? 'active' : '' }}"></li>

                    @endfor
                </ol>


                <div class="carousel-inner" role="listbox">
                    @endif

                    @for ($i = 0; $i < count($photos); $i++)
                        @if($i == 0)
                            <div class="item active">
                                @else
                                    <div class="item">
                                        @endif
                                        <img src="data:{{$photos[$i]->type}};base64,{{base64_encode($photos[$i]->image)}}"/>
                                    </div>
                                    @endfor

                                    @if(count($photos)>0)
                            </div>


                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#news-carousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Precedente</span>
                            </a>
                            <a class="right carousel-control" href="#news-carousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Successivo</span>
                            </a>
                </div>

                @endif

                <br><br><br>
                <h3>Valutazione media
                    <strong>{{$news->votes_count == 0 ? '0' : round(($news->votes_sum)/($news->votes_count),1)}} </strong>
                    su <strong>5 </strong>({{$news->votes_count}} valutazioni)</h3>
                <h4>
                    <form method="post" action="{{URL::to('addVote')}}">
                        Vota l'articolo
                        <input type="hidden" name="idNews" value="{{$news->id}}">
                        <select name="vote">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <button type="submit">Vota</button>
                    </form>
                </h4>

                <br><br>

                <h3><strong>I commenti dei lettori</strong></h3>
                <br>

                <div class="col-sm-5">

                    @if(count($comments) > 0)
                        <div id="news-comments">
                            <div class="comments">
                                @foreach($comments as $comment)
                                    <div class="comment">
                                        <div class="commentTitle">
                                            <span class="user">Commento di {{$comment->username}}</span>
                                            <span class="space"></span>
                                            <span class="data">Data: {{$comment->created_at}}</span>
                                            <span class="space"></span>
                                        </div>
                                        <br>
                                        <div class="commentText">
                                            {{$comment->content}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <br>

                    <div>
                        <h4><strong>Aggiungi un commento</strong></h4>
                        <br>


                        <form class="form-horizontal" role="form" method="post" action="{{ URL::to('addComment') }}">

                            <input type="hidden" name="idNews" value="{{ $news->id }}">

                            <div class="form-group">
                                <label for="input-sm" class="control-label col-sm-2 black">Username</label>
                                <div class="col-sm-10">
                                    <input class="form-control input-sm" name="username" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2 black">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control input-sm" type="email" name="email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2 black">Testo</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control input-sm" rows="4" name="content" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default btn-block">Aggiungi</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>


@endsection