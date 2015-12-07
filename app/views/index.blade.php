@extends('layout')

@section('contain')

        <div class="col-md-4 col-md-offset-4">
            <form class="form-signin" method="post">
                <center><h2 class="form-signin-heading">學生登入</h2></center>
                @if(Session::get('error')=="#")
                <div class="alert alert-warning" role="alert">===通關密碼錯誤===</div>
                @endif
                @if(Session::get('logout')=="#")
                <div class="alert alert-success" role="alert">===登出成功===</div>
                @endif
                <label for="inputPassword" class="sr-only">通關密碼</label>
                <input name="inputPassword" class="form-control" placeholder="請輸入通關密碼" required="" type="password"></input>
                <br />
                <button class="btn btn-lg btn-primary btn-block" type="submit">登入</button>
            </form>
            <li class="admin"><a href="admin">管理登入</a>
            </li>
        </div>

@stop
