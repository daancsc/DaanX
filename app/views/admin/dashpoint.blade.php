@extends('../layout')

@section('contain')

<div id="container"></div>       

<script>
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '四校寒訓小隊計分版'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Population (millions)'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: '得分: <b>{point.y}</b>'
        },
        series: [{
            name: 'Population',
            data: [
                @for ($i = 0;$i<count($point);$i++)
                  @if ($i!=count($point)-1)
                    ['{{{ $point[$i]->name }}}',{{{ $point[$i]->point }}}],
                  @else
                    ['{{{ $point[$i]->name }}}',{{{ $point[$i]->point }}}]
                  @endif
                @endfor
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                x: 4,
                y: 10,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif',
                    textShadow: '0 0 3px black'
                }
            }
        }]
    });
});
</script>

<script language="JavaScript">                                          
   function myrefresh()
   {
     window.location.reload();
   }
   setTimeout('myrefresh()',5000); //指定1秒刷新一次
</script>

@stop
