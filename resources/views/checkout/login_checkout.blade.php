@extends('layout')

@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Dang nhap vao tai khoan cua ban</h2>
                    <form action="{{'/login-cus'}}" method="POST">
                        {{ csrf_field() }}
                        <input type="email" name="email_acc" placeholder="Email" />
                        <input type="password" name="password_acc" placeholder="Password" />
                        <span>
                            <input type="checkbox" class="checkbox"> 
                            Luu dang nhap
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">Hoac</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Tao tai khoan</h2>
                    <form action="{{'/add-customer'}}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="customer_name" placeholder="Name"/>
                        <input type="email" name="customer_email" placeholder="Email Address"/>
                        <input type="password" name="customer_pass" placeholder="Password"/>
                        <input type="text" name="customer_phone" placeholder="phone"/>
                        <button type="submit" class="btn btn-default">Dang ky</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection