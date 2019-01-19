@extends('layouts.layoutconexao')
@section('body')
<body>
    @section('sidebar')
        @include('layouts.topconexao')
    @show
    @section('header')
        @include('layouts.headerconexao')
    @show
    
    @yield('content')

    @section('footer')
        @include('layouts.footerconexao')
    @show
</body>
</html>
@endsection