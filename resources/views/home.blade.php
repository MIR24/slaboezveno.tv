@extends('layouts.default')

@section('content')
    <section>
        <div class="jumbotron text-center mt-2 block1" style="height:auto;">
            <div class="container">

                <div class="row">
                    <div class="col col-md-0"></div>
                    <div class="col-3 col-md-12 top_logo_Mir"><img src="images/logo.png"></div>
                    <div class="col col-md-0"></div>
                </div>
                <div class="row">
                    <div class="col-12 HeliosExtBlackC header1">
                        Возвращение легендарного шоу <br>на телеканале «МИР»
                    </div>
                </div>
                <div class="row">
                    <div class="col-0 col-md-2"></div>
                    <div class="col-12 col-md-8  logoZveno"><img src="images/szveno.png"></div>
                    <div class="col-0 col-md-2"></div>
                </div>
                <div class="row">
                    <div class="col-12 HeliosExtBlackC tag1">
                        ХОЧЕШЬ СТАТЬ УЧАСТНИКОМ?
                    </div>
                </div>
                <div class="row">
                    <a href="#rules" class="buttonMainStyle2">подробнее</a>
                </div>
            </div>
        </div>
    </section>
    <a id="rules"></a>
    <section style="height: auto;">
        <div class="container-fluid">
            <div class="row">
                <div class="col divider_h"></div>
                <div class="text-center header2"> ПРАВИЛА</div>
                <div class="col  divider_h"></div>

            </div>

        </div>

        <div class="container container1680">

            <div class="iImSpacer100px"></div>
            <div class="row">
                <div
                    class="col-xl-3  offset-xl-0    col-lg-5 offset-lg-1 col-sm-12 offset-sm-0 col-12 offset-0 text-center dig_here">
                    <img src="images/svg/block1.svg">
                </div>
                <div
                    class="col-xl-3  offset-xl-0    col-lg-5 offset-lg-1 col-sm-12 offset-sm-0 col-12 offset-0 text-center dig_here">
                    <img src="images/svg/block2.svg">
                </div>
                <div
                    class="col-xl-3  offset-xl-0    col-lg-5 offset-lg-1 col-sm-12 offset-sm-0 col-12 offset-0 text-center dig_here">
                    <img src="images/svg/block3.svg">
                </div>
                <div
                    class="col-xl-3  offset-xl-0    col-lg-5 offset-lg-1 col-sm-12 offset-sm-0 col-12 offset-0 text-center dig_here">
                    <img src="images/svg/block4.svg">
                </div>
            </div>
            <div class="row">
                <div class="iImSpacer100px"></div>
                <a href="{{ route("selection.getQuestion") }}" class="buttonMainStyle2">УЧАСТВОВАТЬ</a>
                <div class="iImSpacer100px"></div>

            </div>
        </div>
    </section>



{{--    <section style="height: auto;">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="col divider_h"></div>--}}
{{--                <div class="text-center header2"> ПРАВИЛА</div>--}}
{{--                <div class="col  divider_h"></div>--}}

{{--            </div>--}}

{{--        </div>--}}

{{--        <div class="container container1680">--}}

{{--            <div class="iImSpacer100px"></div>--}}
{{--            <div class="row">--}}
{{--                <div--}}
{{--                    class="col-xl-3  offset-xl-0 col-lg-5  offset-lg-1 col-sm-8 offset-sm-4 col-10 offset-2 text-center dig_here">--}}
{{--                    <div class="dig HeliosExtBlackC" id="dig1"> 1</div>--}}
{{--                    <div class="tags" id="subdig1">ответь на все <br> 10 вопросов</div>--}}
{{--                    <div class="subtag"> 20 секунд, чтобы <br>ответить правильно</div>--}}
{{--                </div>--}}
{{--                <div--}}
{{--                    class="col-xl-3  offset-xl-0 col-lg-5  offset-lg-1 col-sm-8 offset-sm-4 col-10 offset-2 text-center dig_here">--}}
{{--                    <div class="dig HeliosExtBlackC" id="dig2"> 2</div>--}}
{{--                    <div class="tags" id="subdig2">заполни<br>анкету</div>--}}
{{--                    <div class="subtag"> чтобы мы могли <br>связаться с тобой</div>--}}
{{--                </div>--}}
{{--                <div--}}
{{--                    class="col-xl-3  offset-xl-0 col-lg-5  offset-lg-1 col-sm-8 offset-sm-4 col-10 offset-2 text-center dig_here">--}}
{{--                    <div class="dig HeliosExtBlackC" id="dig3"> 3</div>--}}
{{--                    <div class="tags" id="subdig3">пришли свою <br> видеовизитку</div>--}}
{{--                    <div class="subtag"> расскажи почему <br>--}}
{{--                        ты должен сыграть в шоу--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div--}}
{{--                    class="col-xl-3  offset-xl-0 col-lg-5  offset-lg-1 col-sm-8 offset-sm-4 col-10 offset-2 text-center dig_here">--}}
{{--                    <div class="dig HeliosExtBlackC" id="dig4"> 4</div>--}}
{{--                    <div class="tags" id="subdig4">пройди<br>во 2-й тур</div>--}}
{{--                    <div class="subtag"> и получи шанс стать<br>участником телеигры</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="iImSpacer100px"></div>--}}
{{--                <a href="#" class="buttonMainStyle2">УЧАСТВОВАТЬ</a>--}}
{{--                <div class="iImSpacer100px"></div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}


    <a id="promo"></a>
    <section style="height: auto;">
        <div class="container-fluid">
            <div class="row">
                <div class="col divider_h"></div>
                <div class="text-center header2"> ВИДЕО</div>
                <div class="col  divider_h"></div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col text-center" style="position: relative; height: 0; padding-top: 56.25%; overflow: hidden;">
                    @foreach( [
                        "https://www.youtube.com/embed/videoseries?list=PLBZo8U17p9gzEwllwhVFB2-5rUbd4yHAp"
                    ] as $iframeSrc )
                        <iframe width="100%" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;" frameborder="0"
                                src="{{ $iframeSrc }}"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>

                    @endforeach
                </div>
            </div>
        </div>

{{--        <div class="container container1680">--}}
{{--            <div class="iImSpacer60px"></div>--}}
{{--            <div class="row">--}}
{{--                <ul id="youtubelist">--}}
{{--                    <li><a href="https://www.youtube.com/watch?v=iC_v67yeNXQ"--}}
{{--                           data-url="http://dynamicdrive.com/dynamicindex17/youtube-video-gallery.htm">Responsive--}}
{{--                            Youtube Video Gallery</a></li>--}}
{{--                    <li><a href="https://www.youtube.com/watch?v=gBJl1ODksNU">Best of Trance 2012</a></li>--}}
{{--                    <li><a href="https://youtu.be/oIlIVFBBbNw">Pigeons Animation</a></li>--}}
{{--                    <li><a href="https://youtu.be/Eoq5VKfCOLU"--}}
{{--                           data-url="http://dynamicdrive.com/dynamicindex16/featurebox/index.html">Blossom Opt-In--}}
{{--                            Box</a></li>--}}
{{--                    <li><a href="https://youtu.be/KWFfDyupGpQ">Who's Your Favorite</a></li>--}}
{{--                    <li><a href="https://youtu.be/GHWsBnQ178w"--}}
{{--                           data-url="http://dynamicdrive.com/dynamicindex1/sticky-horizontal-menu.htm">Sticky Horizontal--}}
{{--                            Menu</a></li>--}}
{{--                    <li><a href="https://youtu.be/ROipDjNYK4k">Alarm- Short Animation</a></li>--}}
{{--                    <li><a href="https://youtu.be/fzrfrXhE-w4">Sam- Short Animation</a></li>--}}
{{--                    <li><a href="https://youtu.be/8ZRLlyxvr6E">Paste Of Love</a></li>--}}
{{--                    <li><a href="https://youtu.be/O_yVo3YOfqQ">Changing Batteries</a></li>--}}
{{--                    <li><a href="https://youtu.be/gMRScklkpa4">Panda Bear</a></li>--}}
{{--                    <li><a href="https://youtu.be/OXVcMogNVRE">Wild Animals</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}


{{--            <div class="row" style="display: none;">--}}
{{--                <div class="col-4 promo"><img src="images/promo/preview.jpg"></div>--}}
{{--                <div class="col-4 promo"><img src="images/promo/preview.jpg"></div>--}}
{{--                <div class="col-4 promo"><img src="images/promo/preview.jpg"></div>--}}

{{--                <div class="col-4 promo"><img src="images/promo/preview.jpg"></div>--}}
{{--                <div class="col-4 promo"><img src="images/promo/preview.jpg"></div>--}}
{{--                <div class="col-4 promo"><img src="images/promo/preview.jpg"></div>--}}


{{--            </div>--}}
{{--            <div class="row">--}}

{{--                <nav aria-label="Page navigation" class="pagBlock">--}}
{{--                    <ul class="pagination justify-content-center">--}}
{{--                        <!--<li class="page-item disabled">   <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a></li>-->--}}
{{--                        <li class="page-item-circle PageActive"><a class="page-link-circle" href="#">1</a></li>--}}
{{--                        <li class="page-item-circle"><a class="page-link-circle" href="#">2</a></li>--}}
{{--                        <li class="page-item-circle"><a class="page-link-circle" href="#">3</a></li>--}}
{{--                        <li class="page-item-circle"><a class="page-link-circle" href="#">4</a></li>--}}

{{--                        <li class="page-item-circle"><a class="page-link-circle" href="#">99</a></li>--}}
{{--                        <!--<li class="page-item">--}}
{{--                          <a class="page-link" href="#">Next</a>--}}
{{--                        </li>-->--}}
{{--                    </ul>--}}
{{--                </nav>--}}

{{--            </div>--}}


{{--        </div>--}}
    </section>
@endsection
