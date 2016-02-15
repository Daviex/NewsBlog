@extends('layout')


@section('content')


    @include('carousel')

    <div class="container">

        @foreach($home_categories as $home_category)

            @if(count($home_category['news'])!=0)

                @include('home_category')

            @endif

        @endforeach

    </div>

    @include('footer')

@endsection


