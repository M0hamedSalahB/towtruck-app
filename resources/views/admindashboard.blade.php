
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        td{
            overflow: visible;
            margin: 10px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>
                name
            </th>
            <th>
                email
            </th>
            <th>
                delete
            </th>
        </tr>
        @foreach ( session('users') as $user)
        <form action="{{route('delete')}}" method="get">
                <tr>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                            <input type="hidden" name="email" value="{{$user->email}}">
                            <input type="submit" value="delete">
                        </td>
                    </tr>

                </form>
        @endforeach
    </table>
    <table>
        <tr>
            <th>
                name
            </th>
            <th>
                email
            </th>
            <th>
                Licenseplate Number
            </th>
            <th>
                update
            </th>
            <th>
                delete
            </th>
        </tr>
        @foreach ( session('drivers') as $user)
        <tr>
            <td>
                {{$user->name}}
            </td>
            <td>
                {{$user->email}}
            </td>
            <form action="{{route('adminupdate')}}" method="get">
                <td>
                    <input type="hidden" name="email" value="{{$user->email}}">
                    <input type="text" name="licenseplatenumber" value="{{$user->licenseplatenumber}}">
                </td>

                <td>
                    <input type="submit" value="update">
                </td>
            </form>
            <td>
                        <form action="{{route('delete')}}" method="get">
                            <input type="hidden" name="email" value="{{$user->email}}">
                            <input type="submit" value="delete">
                        </form>
                        </td>
                    </tr>

        @endforeach
    </table>
</body>
</html>
