@extends('layouts.app')

<!-- @section('customcss')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/financial.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/financial_responsive.css') }}">
@endsection -->

@section('content')
@if(Auth::guest())
    @php
        header("Location: " . URL::to('/'), true, 302);
        exit();
    @endphp
@endif
<br><br>
<div class="container">
    <div class="reg_form">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group row{{ $errors->has('role') ? ' has-error' : '' }}">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Mendaftar Sebagai') }}</label>

                                <div class="col-md-6">

                                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                                        <option value="pegawai">Pegawai</option>
                                        <option value="nasabah">Nasabah</option>
                                    </select>

                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nama</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('no_handphone') ? ' has-error' : '' }}">
                                <label for="no_handphone" class="col-md-4 control-label">No. Handphone</label>

                                <div class="col-md-6">
                                    <input id="no_handphone" type="text" class="form-control" name="no_handphone" value="{{ old('no_handphone') }}" required>

                                    @if ($errors->has('no_handphone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('no_handphone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Konfirmasi Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <input id="status" type="hidden" class="form-control" name="status" value="1">

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customjs')
<script src="{{ asset('js/financial_custom.js') }}"></script>
@endsection