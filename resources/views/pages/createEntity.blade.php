@extends('layout')

@section('content')
    <div class="col-lg-6 col-lg-offset-3 main-form" style="clear:both;">
        <h2>Entity Submission</h2>
        <p>To start the creation and submission of a new entity, please fill out the form below:</p>
        <form id="entity-submission-form">
            <div class="form-group">
                <label for="entityName">Entity Name:</label>
                <input class="form-control" name="entityName" ng-model="entityName" placeholder="eg. McDonald's" ng-change="searchEntities()">
                <span class="help-block" ng-show="entitySubmitError.entityName"></span>
            </div>
            <div class="form-group">
                <label for="entityWebsite">Entity's Official Website (optional):</label>
                <input class="form-control" name="entityWebsite" ng-model="entityWebsite" placeholder="www.McDonalds.com" />
                <span class="help-block" ng-show="entitySubmitError.entityWebsite"></span>
            </div>        
            <button type="submit" class="btn btn-success" ng-click="submitNewEntity()">Submit New Entity</button>
        </form>
    </div>
@stop

@section('footerCode')
    <script src="/js/controllers/entitySubmissionController.js"></script>
    <script src="/js/pages/entity.new.js"></script>
@stop