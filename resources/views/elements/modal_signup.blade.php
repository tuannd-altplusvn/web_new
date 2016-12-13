<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Register Shoppe</h1><br>
            <form role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full name" required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif

                <input type="text" class="form-control" name="email" placeholder="Email"  value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <input type="password" class="form-control" name="password" required placeholder="Password">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <input type="password" class="form-control" name="password_confirmation" required placeholder="Confirm password">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <input type="submit" name="register" class="login loginmodal-submit" value="Register">
            </form>
        </div>
    </div>
</div>