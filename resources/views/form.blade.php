<div class="row" display: inline-block>
    <form class="row" action="/zipcode" method="POST">
        {{ csrf_field() }}
            <div class="col-sm" >
                <input type="text" class="form-control" name="agent1" placeholder="Name of the first agent" margin="2px">
                <input type="text" class="form-control" name="zipcode1" placeholder="ZIP code of the first agent" margin="2px">
            </div>
            <div class="col-sm">
                <input type="text" class="form-control" name="agent2" placeholder="Name of the second agent" margin="2px">  
                <input type="text" class="form-control" name="zipcode2" placeholder="ZIP of the second agent" margin="2px">
            </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-left: 45px;">MATCH</button>
    </form>
</div>