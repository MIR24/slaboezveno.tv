<!DOCTYPE html>
<html lang="en">
@include('/partials/head')
<body>
<div class="bg_block"></div>
@include('/partials/navbar')

@section('content')
@show

@include('/partials/footer')

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/jquery-3.3.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap-4.3.1.js"></script>

@section('javascript')
    <script src="/js/youtubegallerywall.js"></script>
    <script>
        jQuery(function () { // on DOM load
            //syntax $(selector).youtubegallery()
            $('#youtubelist').youtubegallery();
        });
    </script>
@show

</body>
</html>
