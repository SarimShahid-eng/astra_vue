<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="{{ asset('asset') }}/lib/select2/select2.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('asset') }}/css/sweetalert2.min.css" />
        <link rel="stylesheet" href="{{ asset('asset') }}/css/sweetalert2.css" />
    </head>

    <body>
        <h1>Data</h1>
        <form action="{{route('data_check')}}" method="POST" class="ajaxForm">
            @csrf
            <input type="text" name="data" id="">
            <input type="submit" value="Submit">
        </form>
        <table class="table dt_table table-bordered w-100 nowrap">
            <thead>
                <tr>
                    <th>Title</th>
                   
                </tr>
            </thead>
            <tbody>
                <td>Saeed</td>
            </tbody>

        </table>
    </body>
    @include('partials.datatable')
    
    <script src="{{ asset('asset') }}/js/compressed.js"></script>
    <script src="{{ asset('asset') }}/js/jquery.form.js"></script>
    <script src="{{ asset('asset') }}/js/select2.min.js"></script>
    <script src="{{ asset('asset') }}/js/parsley.min.js"></script>
    <script src="{{ asset('asset') }}/js/sweetalert2.min.js"></script>
    <script src="{{ asset('asset') }}/js/custom.js"></script>
</html>
