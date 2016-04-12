@extends('navbarTop')

@section('content')


<link href="{!! asset('CSS/globalStyles.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('CSS/signIn.css') !!}" media="all" rel="stylesheet" type="text/css" />

    <div class = "pageTitle"> Sign In </div>    


@if (session('failure'))
    <div class="alert alert-warning">
        {{ session('failure') }}
    </div>
@endif

<form action = "login" method = "post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class = "row">
        <div class = "col-xs-1 col-sm-2 col-md-3"></div>
        <div class = "col-xs-10 col-sm-8 col-md-6">
            Email :  
            <input type = "text" class = "form-control" name = "email">
        </div>
    </div>  

    <div class = "row">
        <div class = "col-xs-1 col-sm-2 col-md-3"></div>
        <div class = "col-xs-10 col-sm-8 col-md-6">
            Password :  
            <input type = "password" class = "form-control" name = "password">
        </div>
    </div>  

    <div class = "row">
        <div class = "col-xs-1 col-sm-2 col-md-3"></div>
        <div class = "col-xs-7 col-sm-5 col-md-4">
            <button type="submit" class = "btn btn-default">Submit</button>
        </div>
        <div class = "col-xs-3 col-sm-3 col-md-2">
            <a href="../passwordRetrieval" id = "forgotPass"> Forgot your password </a>
        </div>  
    </div>


    <div class = "row" id = "registerInquiry">
        <div class = "col-xs-1 col-sm-2 col-md-3"></div>
        <div class = "col-xs-10 col-sm-8 col-md-6">
            <div class = "panel panel-default">
                Not Yet Registered? <a href="../signUp"> Sign up </a>
            </div>
        </div>
    </div>


</form>
@stop