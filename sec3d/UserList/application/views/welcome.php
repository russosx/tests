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

    <link href="vendor/bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar-fixed-top.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body ng-app="UserlistApp">

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">UserlistApp</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./">New user</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container" ng-controller="mainController" ng-init="init()">

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Код</th>
            <th>email</th>
            <th>Адрес</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Петр</td>
            <td>Чайковский</td>
            <td>001</td>
            <td>chak@gmail.com</td>
            <td>R.I.P.</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-remove-sign"></span>
                    </button>
                </div>
            </td>
        </tr>
        <tr>
            <td>Вася</td>
            <td>Пупкин</td>
            <td>002</td>
            <td>pup@gmail.com</td>
            <td>г. Пупкин, Пупкинский р-н, ул. Пупкинская, 89, кв. 89</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-remove-sign"></span>
                    </button>
                </div>
            </td>
        </tr>
        </tbody>
    </table>

    <!-- Main component for a primary marketing message or call to action -->
<!--    <div class="jumbotron">-->
<!--        <h1>Navbar example</h1>-->
<!--        <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>-->
<!--        <p>To see the difference between static and fixed top navbars, just scroll.</p>-->
<!--        <p>-->
<!--            <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>-->
<!--        </p>-->
<!--    </div>-->

</div> <!-- /container -->


<!--Vendor libs-->
<script src="vendor/jquery-2.1.1.min.js"></script>
<script src="vendor/bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
<script src="vendor/jquery-validation-1.13.0/dist/jquery.validate.min.js"></script>
<script src="vendor/jquery-validation-1.13.0/dist/additional-methods.min.js"></script>
<script src="vendor/angular-1.2.21.min.js"></script>

<!--App-->
<script src="js/app.js"></script>
<script src="js/controllers/mainController.js"></script>

</body>
</html>

