<!-- Sign in Modal -->
<div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center" id="myModalLabel">Member Login</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::open(['url' => '/auth/login', 'id'=>'reg-form', 'autocomplete'=>'off']) !!}
                    {!! csrf_field() !!}
                    <div class="input-group input-group-lg">
                        <input class="form-control"
                               aria-describedby="sizing-addon1"
                               value="{{ old('email') }}"
                               data-validate="required"
                               id="email"
                               type="email"
                               name="email"
                               placeholder="Email">
                    </div>
                    <br>
                    <div class="input-group input-group-lg">
                        <input class="form-control"
                               aria-describedby="sizing-addon1"
                               value=""
                               data-validate="required,min(6)"
                               id="password"
                               type="password"
                               name="password"
                               placeholder="Password">
                    </div>
                    <br>
                    <input class="btn btn-lg btn-primary btn-block"
                           type="submit"
                           value="Login">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>