<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
    @include('partials/_header')
    <body>
 
     @include('partials/_nav')
       
     <div class="container">
        @yield('content')
     </div>
       
       <script src="{!! asset('js/jquery.min.js') !!}"></script>
       <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
       <script src="{!! asset('js/parsley.min.js') !!}"></script>
       <script src="{!! asset('select2/dist/js/select2.full.min.js') !!}"></script>
       <script type="text/javascript">
$(".js-example-basic-multiple").select2();
</script>
    </body>
</html>