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
                            <p>
                                Вы самое слабое звено!!!<br><br>
                                24 ЧАСА ЕЩЁ НЕ ПРОШЛИ,<br>
                                ТАК ЧТО – ПРОЩАЙТЕ!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
