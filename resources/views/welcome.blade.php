<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <script src="https://js.pusher.com/4.3/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
    <body>
        <div class="container w-75 mt-5 pt-5" style="height: 100vh;">
            <h1>Zip Details</h1>
            <hr/>
            {{-- <div class="row m-auto w-75"> --}}
                <table id="table_id" class="display w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Zip Code</th>
                            <th>Reason Code</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            {{-- </div> --}}

        </div>

    </body>
    <script>

        $(document).ready( function () {
            $('#table_id').DataTable({
               processing: true,
               serverSide: true,
               ajax: '{{ route('get-zip-codes') }}',
               columns: [
                        { data: 'DT_RowIndex', orderable: false, searchable: false},
                        { data: 'zip_code', name: 'zip_code' },
                        { data: 'reason_code', name: 'reason_code.reason_code', defaultContent: '' },
                        { data: 'status', name: 'status' }
                     ]
            });
         });
    </script>
    <script>
        var pusher = new Pusher("4f6db9f8f3c40c2bdca8", {
            cluster: "ap2",
        });
        var channel = pusher.subscribe('zip-updated');
        channel.bind('zip-updated', function(data) {
            $('#table_id').DataTable().ajax.reload();
        });
    </script>
</html>
