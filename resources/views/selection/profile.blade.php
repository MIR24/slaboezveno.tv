@extends('layouts.selection')

@section('content')
    <section class="section">
        <div class="container">
            <div class="middle-Spacer"></div>
            <!--<div class="row align-items-left"> -->
            <div class="row">
                <div class="col"></div>
                <div class="col-xl-8  col-ld-8 col-12">
                    <div class="row">
                        <div class="col">
                            <label for="form1">Фамилия</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="form1" aria-describedby="basic-addon3">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="form2">Имя</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="form2" aria-describedby="basic-addon3">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="form3">Отчество</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="form3" aria-describedby="basic-addon3">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="date">Дата рождения </label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="date" name="date" placeholder="Дата"
                                       required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="form4">Страна проживания</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="form4" aria-describedby="basic-addon3">
                            </div>
                        </div>
                        <div class="col">
                            <label for="form5">Город проживания</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="form5" aria-describedby="basic-addon3">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="form6">Контактный телефон</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="form6" aria-describedby="basic-addon3">
                            </div>
                        </div>
                        <div class="col">
                            <label for="form7">E-mail</label>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                       placeholder="name@example.com"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="form8">Ссылка на аккаунт в любой социальной сети</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="form8" aria-describedby="basic-addon3">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="form9">Ссылка на видеовизитку (социальные сети, файлообменники)</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="form9" aria-describedby="basic-addon3">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10 col-md-11">
                            <label class="form-check-label text-left " for="exampleCheck1">Отправляя информацию о себе,
                                я
                                подтверждаю согласие на обработку персональных данных, включая их сбор, хранение,
                                адаптирование, использование и распространение </label>
                        </div>
                        <div class="col-2 col-md-1">
                            <input type="checkbox" class="form-check-input form-control-lg" id="exampleCheck1">
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col"><a href="#TODO" target="_blank" class="linkRules">Подробные правила участия в
                                кастинге</a></div>
                    </div>
                    <div class="row  text-center">
                        <div class="col thankyou">Спасибо за то, что заполнили анкету!</div>
                    </div>
                    <div class="row  text-center">
                        <div class="col-0 col-md-1"></div>
                        <div class="col-6 col-md-5">
                            <button type="submit" value="Submit" class="btn btn-primary buttonMainStyle5">Отправить
                            </button>
                        </div>
                        <div class="col-6 col-md-5">
                            <button type="reset" value="Reset" class="btn btn-primary buttonMainStyle5Reset">Сбросить
                            </button>
                        </div>
                        <div class="col-0 col-md-1"></div>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </section>
@endsection
