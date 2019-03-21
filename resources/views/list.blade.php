<div class="col-sm">
    <p>The clients for {{$agent['name']}} with the ZIP code {{$agent['zip_code']}} are: </p>
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">ZIP code</th>
        </tr>
    </thead>
    <tbody>
        @foreach($agent['clients'] as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->zip_code }}</td>
            </tr>
        @endforeach
    </tbody>    
    </table>
</div>