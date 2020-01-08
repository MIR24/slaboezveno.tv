@extends('layouts.selection')

@section('content')
    <section class="fullscreen_section section1680">
        <div class="container-fluid">
            <div class="middle-Spacer"></div>
            <div class="row align-items-center">
                <div class="col-12 col-md-2 ">
                    <div class="row  align-items-center">
                        @for( $i=1; $i<=10; ++$i)
                            <div class="points  col col-md-12 order-{{11-$i}} order-md-{{$i}}
                            @if(11-$i == 10) active @endif">
                                {{11-$i}}</div>
                        @endfor
                    </div>
                </div>
                <div class="col-12 col-md-10 text-center">
                    <div class="row Question  align-items-center">
                        <div class="col-12  Question_text">
                            <p> ПОЗДРАВЛЯЕМ, ВЫ ПРАВИЛЬНО
                                <br>ОТВЕТИЛИ НА ВСЕ ВОПРОСЫ!</p>

                            <p class="sucsess">Для подачи заявки на участие во втором туре кастинга необходимо заполнить
                                анкету о себе и прислать нам короткую видеовизитку с небольшим рассказом о себе</p>
                        </div>
                        <div class="col-12">
                            <a href="{{route("selection.getProfile")}}" class="buttonMainStyle7">
                                Заполнить анкету
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
