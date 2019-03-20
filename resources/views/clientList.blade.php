<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th {
        color: blue;
    }
    </style>

    <meta charset="UTF-8">
    <title>Clients for agents</title>
</head>
<body>
    <div class="col">
        <div>
            <table >
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>ZIP code</th>
            </tr>
            @foreach($agentOne['clients'] as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->zip_code }}</td>
                </tr>
            @endforeach
            </table>
        </div>

        <div>
            <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>ZIP code</th>
            </tr>
            @foreach($agentTwo['clients'] as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->zip_code }}</td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>
    <a href="/"> Go home</a>
</body>
</html>