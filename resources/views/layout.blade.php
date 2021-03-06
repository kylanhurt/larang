<!DOCTYPE html>
<html lang="en" ng-app="dataGoMain">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="dataGo is aapplication that helps the public record and analyze ethical decisions made by organizations.">
        <meta name="author" content="Kylan Hurt">
        <link rel="icon" href="../../favicon.ico">
        <title>Welcome to dataGo | dataGo</title>
        <!-- Bootstrap core CSS -->
        <link href="/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="/css/jumbotron.css" rel="stylesheet">
        <link href="/css/main.css" rel="stylesheet">        
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="/docs/assets/js/ie-emulation-modes-warning.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body ng-controller="mainCtrl" >
        <nav class="navbar navbar-inverse navbar-fixed-top" >
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">dataGo</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li ng-show="authenticated"><a href="#" ng-click="logout()" style="color:white;">Logout</a></li>                  
                    <form class="navbar-form navbar-right" ng-hide="authenticated">
                        <div class="form-group">
                            <input type="email" class="form-control" id="login-email" ng-model="user.email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="login-password" ng-model="user.password">
                        </div>
                        <button type="submit" class="btn btn-success" ng-click="login()">Login</button>
                    </form>
                </ul>
            </div>
        </nav>

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <ui-view name="main-cont"> 
            @yield('content')
        </ui-view>        

        <div class="container col-lg-6 col-lg-offset-3">
            <footer>
                <p>&copy; dataGo 2016</p>
            </footer>
        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <script src="/dist/js/jquery-2.2.0.min.js"></script>
        <script src="/docs/dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
        <script src="/dist/js/angular.js"></script>   
        <script src="/dist/js/angular-route.js"></script>
        <script src="/node_modules/angular-ui-router/release/angular-ui-router.js"></script>     
        <script src="/node_modules/satellizer/satellizer.js"></script>    
        <script src="/js/app.js"></script>
        <script src="/js/controllers/authController.js"></script>  
        <script src="/js/controllers/welcomeController.js"></script><!--          
        <script src="/bower_components/angular-encode-uri/dist/angular-encode-uri.min.js"></script>-->        
        @yield('footerCode')
    </body>
</html>