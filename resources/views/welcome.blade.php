@extends('layout')

@section('content')
    <div class="jumbotron col-lg-8 col-lg-offset-2" ng-hide="authenticated">
        <div class="col-lg-4 col-sm-12" id="home-signup-form">
            <form>
                <p>Please fill out the fields below to create an account:</p>
                <div class="form-group" ng-class="">
                    <label for="login-email">Email:</label>
                    <input type="email" class="form-control" id="login-email" ng-model="loginEmail" placeholder="user@example.com">
                    <span class="help-block" ng-show="registrationError.username" ></span>                
                </div>
                <div class="form-group">
                    <label for="login-password">Password:</label>
                    <input type="password" class="form-control" id="login-password" ng-model="loginPassword" placeholder="*******">
                </div>
                <button type="submit" class="btn btn-primary" ng-click="loginUser()">Login</button>
                <button type="submit" class="btn btn-secondary" ng-click="registerUser()">Register</button>
                <input type="hidden" name="_token" value="">
            </form>
        </div>
        <div class="col-lg-6 col-lg-offset-2">
            <p>Become a dataGo member and you will be given access to the following features:</p>
                <ul>
                    <li>Submit new entities for consideration and review by other users.</li>
                    <li>Rate and review entities submitted by other users.</li>
                    <li>Participate in discussions regarding organizations and current events.</li>
                    <li>Begin accruing credibility as a user, giving your account more influence.</li>
                </ul>
        </div>
    </div>
    <div class="jumbotron col-lg-8 col-lg-offset-2" id="home-logged-in-content" ng-show="authenticated">
        <h1>Welcome to dataGo<span ng-show="$rootScope.currentUser.username">, (username)</span>!</h1>
        <p>To submit a new entity to our database, please click the button below...</p>
        <p><a class="btn btn-primary btn-large" ui-sref="submit-new-entity">Submit New Entity</a></p>
    </div>
@stop