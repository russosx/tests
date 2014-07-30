<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Test application">
    <meta name="author" content="Ruslan Kladko">
    <link rel="icon" href="img/favicon.ico">

    <title>Userlist App (Ruslan Kladko Trial)</title>

    <link href="vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar-fixed-top.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        div.ajaxprogress {
            margin-top: 10em;
            min-height: 20em;
            display: block;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
    </style>

</head>

<body ng-app="UsersApp" ng-controller="userController" ng-init="init()" >

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Userlist App</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-left">
                    <button ng-click="createUser()" type="submit" class="btn btn-primary">New user</button>
                </form>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<!-- Container -->
<div class="container">

<!--    <div id="progress" class="ajaxprogress"><img src="img/ajax-loader.gif" alt="Loading data..."/></div>-->

    <table id="user-list" class="table table-hover">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Код</th>
                <th>Почта</th>
                <th>Адрес</th>
                <th></th>
            </tr>
        </thead>
        <tbody ng-repeat="user in users">
            <tr>
                <td>{{ user.name }}</td>
                <td>{{ user.surname }}</td>
                <td>{{ user.code }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.address }}</td>
                <td>
                    <div class="btn-group">
                        <button ng-click="editUser(user)" type="button" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-edit"></span>
                        </button>
                        <button ng-click="deleteUser(user)" type="button" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-remove-sign"></span>
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <edit-user></edit-user>

</div> <!-- /container -->


<!-- LIBS -->
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="vendor/angular/angular.min.js"></script>
<script src="vendor/angular-resource/angular-resource.min.js"></script>

<!-- Application -->
<script src="js/app/app.js"></script>
<script src="js/app/services/userService.js"></script>
<script src="js/app/controllers/userController.js"></script>

</body>
</html>

