@extends('layouts.selection')

@section('content')
    <section class="fullscreen_section section1680">
        <div class="container-fluid">
            <div class="middle-Spacer"></div>
            <div class="row align-items-center">
                <div class="col-12 col-md-2 ">
                    <div class="row  align-items-center">
                        @for( $i=1; $i<=10; ++$i)
                            <div class="points  col col-md-12 order-{{11-$i}} order-md-{{$i}}">
                                {{11-$i}}
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="col-12 col-md-10 text-center">
                    <div class="row Question  align-items-center">
                        <div class="col-12  Question_text">
                            <p>Это неправильный ответ
                                <br>Вы самое слабое звено!!!<br><br>
                                ПОПРОБОВАТЬ СНОВА МОЖНО ЧЕРЕЗ 24 ЧАСА,
                                <br> А СЕЙЧАС – <a href="/">ПРОЩАЙТЕ</a>!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
