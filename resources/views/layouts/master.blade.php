<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Quart</title>
    <link rel="shortcut icon" href="{{ URL::to('assets/images/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ URL::to('assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ URL::to('assets/vendors/simple-datatables/style.css') }}">
    
    {{-- message toastr --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
<style>
    .form-group[class*=has-icon-].has-icon-left .form-select {
    padding-left: 2.5rem;
}
    .divScroll {
    overflow:scroll;
    height:8rem;
    width:20rem;
}
}

</style>

<body>
    <div id="app">
        {{-- sidebar here --}}
        @yield('menu')
        {{-- content main page --}}
        @yield('content')
    </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script src="{{ URL::to('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::to('assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ URL::to('assets/js/pages/dashboard.js') }}"></script>
    <script src="{{ URL::to('assets/js/main.js') }}"></script>
    <script src="{{ URL::to('assets/js/jquery.countdown.js') }}"></script>
        
    <script src="{{ URL::to('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::to('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="{{ URL::to('assets/js/main.js') }}"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        $enddate = "{{Auth::user()->qperiod_end}}";
        $('#getting-started').countdown($enddate, function(event) {
            $('#day').html(event.strftime('%D'));
            $('#hour').html(event.strftime('%H'));
            $('#minutes').html(event.strftime('%M'));
            $('#seconds').html(event.strftime('%S'));
            
        });

    </script>
    
    <script>

        @if(Auth::user()->role_name == 'Patient')
        $(function(){
            Highcharts.chart('bar-chart', {
                chart: {
                    type: 'column',
                    zoomType: 'xy'
                },
                title: {
                    text: ''
                },
              
                yAxis: {
                    min: 35.,
                    max: 45.,
                    title: {
                        text: 'Temperature Range'
                    }
                },

                xAxis: {
                    title: {
                        text: 'Temperature Range'
                    },
                },

                tooltip: {
                    headerFormat: '<span style="font-size:10px">"{point.key}" Temperature</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">"temperature": </td>' +
                        '<td style="padding:0"><b>"{point.y}"</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: <?= $data ?>
            });
        });
        @endif
        
    </script>


     <script>

        @if(Auth::user()->role_name == 'Patient')
        $(function(){
            Highcharts.chart('bar-chart', {
                chart: {
                    type: 'column',
                    zoomType: 'xy'
                },
                title: {
                    text: ''
                },
              
                yAxis: {
                    min: 35.,
                    max: 45.,
                    title: {
                        text: 'Temperature Range'
                    }
                },

                xAxis: {
                    title: {
                        text: 'Temperature Range'
                    },
                },

                tooltip: {
                    headerFormat: '<span style="font-size:10px">"{point.key}" Temperature</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">"temperature": </td>' +
                        '<td style="padding:0"><b>"{point.y}"</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: <?= $data ?>
            });
        });
        @endif
        
    </script>

  
</body>

</html>