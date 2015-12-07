@extends('../layout')

@section('contain')

        <div class="col-md-4 col-md-offset-4">
        @if($succes=="1")
        <div class="alert alert-success" role="alert">===加分成功===</div>
        @endif
        @foreach ($point as $points)
            <form class="form-inline" method="post">
                <div class="form-group">
                    <label for="exampleInputAmount">{{{ $points->name }}}</label>
                    <div class="input-group">
                        <div class="input-group-addon">加</div>
                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" name="plus">
                        <div class="input-group-addon">分</div>
                    </div>
                    <input type="hidden" name="team" value="{{{ $points->id }}}" />
                </div>
                <button type="submit" class="btn btn-primary">送出</button>
            </form>           
        @endforeach
        </div>

@stop
