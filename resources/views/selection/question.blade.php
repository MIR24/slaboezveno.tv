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
                            @if(11-$i == $currentQuestionNumber) active @endif">
                                {{11-$i}}</div>
                        @endfor
                    </div>
                </div>
                <div class="col-12 col-md-10 text-center">
                    <div class="row Question  align-items-center">
                        <form action="{{ route('selection.giveAnswer') }}" method="post">
                            @csrf
                            <div class="col-12 text-center align-items-center">
                                <div class="timer">
                                    <div class="text-vertical-al">
                                        @include('/partials/timer')
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 QuestionNumber">Вопрос {{ $currentQuestionNumber }}</div>
                            <div class="col-12 Question_text">
                                {{ $question->question }}
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control inputTextBlock text-center" id="answ1"
                                       name="answer1"
                                       enable>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="buttonMainStyle6">Ответить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
