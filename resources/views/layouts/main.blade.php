@include('layouts.head')
@if(request()->route()->getName() != 'login')
    <div id="navbar"></div>
@endif
@yield('content')
<div id="footer"></div>

</html>
