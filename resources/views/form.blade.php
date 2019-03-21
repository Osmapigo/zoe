<div class="row">
    <form class="row" action="/zipcode" method="POST">
        {{ csrf_field() }}
            <div class="col-sm" >
                <input type="text" class="form-control" name="agent1" placeholder="Agent name" margin="2px">
                <input type="text" class="form-control" name="zipcode1" placeholder="ZIP code" margin="2px">
            </div>
            <div class="col-sm">
                <input type="text" class="form-control" name="agent2" placeholder="Agent name" margin="2px">  
                <input type="text" class="form-control" name="zipcode2" placeholder="ZIP code 2" margin="2px">
            </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sort clients</button>
    </form>
</div>