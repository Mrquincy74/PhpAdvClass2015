  
<form action="#" method="post" >
    <div class="form-horizontal">
        <div class=".form-group">
            <div class="col-xs-4">
                <label for="exampleInputEmail1">Email address</label>   
                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email"
                           name="email" value="<?php echo $email; ?>">  <br/>
                </div>
            </div>
        </div>
        <div class=".form-group">
            
            <label for="password">Password</label>
               <div class="input-group">
            <input type="password" name="password" value="" /> <br />
               </div>
        </div>
    </div>
    <input type="submit" value="submit" class="btn btn-primary" />
</form>
