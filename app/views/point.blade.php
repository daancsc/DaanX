@extends('layout')

@section('contain')

        <div class="col-md-4 col-md-offset-4">
            @if(Session::get('id')=="1")
                <center>
                  <img src="img/danger.jpg" width="100%" />
                  <p>分數：{{{ $point->point }}}</p>
                </center>
            @endif
            @if(Session::get('id')=="2")
                <center>
                  <img src="img/noapple.png" width="100%" />
                  <p>分數：{{{ $point->point }}}</p>
                </center>
            @endif
            @if(Session::get('id')=="3")
                <center>
                  <img src="img/goodog.png" width="100%" />
                  <p>分數：{{{ $point->point }}}</p>
                </center>
            @endif
            @if(Session::get('id')=="4")
                <center>
                  <img src="img/faselose.png" width="320px" />
                  <p>分數：{{{ $point->point }}}</p>
                </center>
            @endif

        <a href="logout">
            <button type="button" class="btn btn-lg btn-danger btn-block">登出系統</button>
        </a>
        </div>
        <script language="JavaScript">
        function myrefresh()
        {
          window.location.reload();
        }
        setTimeout('myrefresh()',10000); //指定1秒刷新一次
        </script>
@stop
