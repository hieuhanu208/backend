<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forms</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
</head>

<body>

<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Log in</div>
            @if($errors->has('errorLogin'))
                <div class="alert alert-danger" role="alert">
                    <strong>{{$errors->first('errorLogin')}}</strong>
                </div>
            @endif

            <div class="panel-body">
                <form role="form" method="post">
                    {{csrf_field()}}
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="email" type="text" autofocus="">
                            @if($errors->has('email'))
                                <p style="color: red">{{$errors->first('email')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            @if($errors->has('email'))
                                <p  style="color: red">{{$errors->first('password')}}</p>
                            @endif
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me">Nhớ tôi
                            </label>
                        </div>
                        <input type="submit" name="sb" class="btn btn-primary">
                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->
</body>

</html>
