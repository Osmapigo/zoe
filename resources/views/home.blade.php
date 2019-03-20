<!doctype html>
<html>
    <head>
        <title>Laravel</title>
    </head>
    <body>
        <h1> Client locator </h1>
        <form action="/zipcode" method="POST">
            {{ csrf_field() }}
            <div>
                <div mar="10000px">
                    <input type="text" name="agent1" placeholder="Agent name">
                    <input type="text" name="zipcode1" placeholder="ZIP code">
                </div>
                <div>
                    <input type="text" name="agent2" placeholder="Agent name">  
                    <input type="text" name="zipcode2" placeholder="ZIP code 2">
                </div>
                
            </div>
            
            <button type="submit">Sort clients</button>
        </form>
    </body>
</html>