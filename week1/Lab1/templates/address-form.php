<br /><br />


<h1>Address</h1> 
<div class="container-fluid">
    <h1><span class="label label-primary">New Address</span></h1>
    <form class="form-horizontal" method="post" action="#"> 
        <div class="form-group">
            <label for="fullname" class="col-sm-2 control-label">Full Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="fullname" 
                       value="<?php echo$fullName ?>" name="fullname" placeholder="Full Name">
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-5">
                <div class="input-group">                 
                    <input type="text" class="form-control" id="email" 
                           value="<?php echo$email ?>" name="email" placeholder="Email">
                    <span class="input-group-addon" id="basic-addon2">@example.com</span>     
                </div> 
            </div>
        </div><!--
-->
        <div class="form-group">
            <label for="addressline1" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="addressline1" 
                       value="<?php echo$addressLine1 ?>" name="addressline1" placeholder="Address">
            </div>
        </div><!--
-->        <div class="form-group">
            <label for="city" class="col-sm-2 control-label">City</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="addressline1" 
                       value="<?php echo$city ?>" name="city" placeholder="City">
            </div>
        </div>
        <div class="form-group">
            <label for="state" class="col-sm-2 control-label">State</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="state" 
                       value="<?php echo$state ?>" name="state" placeholder="State">
            </div>
        </div>
        <div class="form-group">
            <label for="zip" class="col-sm-2 control-label">Zip Code</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="zip" 
                       value="<?php echo$zip ?>" name="zip" placeholder="Zip Code">
            </div>
        </div>
        <div class="form-group">
            <label for="birthday" class="col-sm-2 control-label">Birth Date</label>
            <div class="col-sm-3">
                <input type="date" class="form-control" id="birthday" 
                       value="<1?php echo $birthDay ?>"  name="birthday" >
            </div>
        </div>

<input type="submit" value="Submit" class="btn-primary" />
<br> <br>
            
    </form>
</div>


