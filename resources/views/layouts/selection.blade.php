<!DOCTYPE html>
<html lang="en">
@include('/partials/head')
<body>
<div class="bg_block"></div>

@section('content')
@show

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/jquery-3.3.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap-4.3.1.js"></script>
<script src="/js/moment.js"></script>
{{--<script src="/js/daterangepicker.js"></script>--}}

@section('javascript')
    <script>
        $(function () {
            $('#date').daterangepicker({
                singleDatePicker: true,
                locale: {
                    format: 'DD.MM.YYYY'
                }
            });
        });
    </script>
@show

</body>
</html>