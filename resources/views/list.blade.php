<div class="col-sm">
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Agent</th>
            <th scope="col">Client Name</th>
            <th scope="col">ZIP code</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ $client['agentName'] }}</td>
                <td>{{ $client['clientName'] }}</td>
                <td>{{ $client['clientZip'] }}</td>
            </tr>
        @endforeach
    </tbody>    
    </table>
</div>