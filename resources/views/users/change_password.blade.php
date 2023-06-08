<link rel="stylesheet" href="{{asset('css/password.css')}}">
<div class="card">
        <div class="card-header">{{ __('Đổi mật khẩu') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('update.password',$user->id) }}">
                @csrf

                <div class="form-group row">
                    <label for="current_password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu hiện tại') }}</label>

                    <div class="col-md-6">
                        <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current_password">

                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <div>{{ $message }}</div>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="new_password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu mới') }}</label>

                    <div class="col-md-6">
                        <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new_password">

                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <div>{{ $message }}</div>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Xác nhận mật khẩu mới') }}</label>

                    <div class="col-md-6">
                        <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required autocomplete="new_password_confirmation">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Đổi mật khẩu') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>