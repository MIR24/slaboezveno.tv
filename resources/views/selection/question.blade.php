@extends('layouts.selection')

@section('content')
    <section class="fullscreen_section section1680">
        <div class="container-fluid">
            <div class="middle-Spacer"></div>
            <div class="row align-items-center">
                <div class="col-12 col-md-2 ">
                    <div class="row  align-items-center">
                        <div class="points  col col-md-12 order-10 order-md-1">10</div>
                        <div class="points  col col-md-12 order-9 order-md-2">9</div>
                        <div class="points  col col-md-12 order-8 order-md-3">8</div>
                        <div class="points  col col-md-12 order-7 order-md-4">7</div>
                        <div class="points  col col-md-12 order-6 order-md-5">6</div>
                        <div class="points  col col-md-12 order-5 order-md-6 active">5</div>
                        <div class="points  col col-md-12 order-4 order-md-7">4</div>
                        <div class="points  col col-md-12 order-3 order-md-8">3</div>
                        <div class="points  col col-md-12 order-2 order-md-9">2</div>
                        <div class="points  col col-md-12 order-1 order-md-10">1</div>
                    </div>
                </div>
                <div class="col-12 col-md-10 text-center">
                    <div class="row Question  align-items-center">
                        <div class="col-12 text-center align-items-center">
                            <div class="timer">
                                <div class="text-vertical-al">
                                    <p>20</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 QuestionNumber">Вопрос 7</div>
                        <div class="col-12 Question_text">Какой элемент таблицы Менделеева
                            <br>обозначается латинской буквой N?
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control inputTextBlock text-center" id="answ1" name="answer1"
                                   enable>
                        </div>
                        <div class="col-12"><a href="#" class="buttonMainStyle6">Ответить</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
