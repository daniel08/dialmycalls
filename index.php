<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DialMyCalls Exercise</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/toastr/2.1.2/toastr.min.css" rel="stylesheet">

    <style type="text/css">
        .input-group{
            margin-top: 10px;
        }
        .buffer{height: 60px;}
    </style>
</head>

<body>
    <div class="navbar navbar-default navbar-fixed-top">
         <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">Daniel Renaud</a>
            </div>
        </div>      
    </div>
    <div class="buffer"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Create New Contact</h4>
                </div>
                <div class="panel-body">
                    <form action="backend.php" method="POST" id="addContactForm">
                            
                        <div class="input-group">
                            <div class="input-group-addon">
                                First Name
                            </div>
                            <input type="text" name="firstname" class="form-control">
                        </div>

                        <div class="input-group">
                            <div class="input-group-addon">
                                Last Name
                            </div>
                            <input type="text" name="lname" class="form-control">
                        </div>

                        <div class="input-group">
                            <div class="input-group-addon">
                                Email
                            </div>
                            <input type="text" name="email" class="form-control">
                        </div>

                        <div class="input-group">
                            <div class="input-group-addon">
                                Phone
                            </div>
                            <input type="text" name="phone" class="form-control">
                        </div>

                        <div class="input-group">
                            <input type="submit" name="addContact" class="btn btn-primary" id="submit-form">
                        </div

                    </form>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class='all-contacts table table-striped'>
                    <thead>
                        <tr class=>
                            <th>Firstname</th><th>Lastname</th><th>Email</th><th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/toastr/2.1.2/toastr.min.js"></script>
    <script src="app.js"></script>

</body>

</html>

<?php


