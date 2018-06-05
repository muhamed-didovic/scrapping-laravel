@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reports</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/reports') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('from') ? ' has-error' : '' }}">
                                <label for="from" class="col-md-4 control-label">From</label>

                                <div class="col-md-6">
                                    <input id="from" type="text" class="form-control" name="from" value="{{ old('from') }}" autofocus>

                                    @if ($errors->has('from'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('from') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('to') ? ' has-error' : '' }}">
                                <label for="to" class="col-md-4 control-label">To:</label>

                                <div class="col-md-6">
                                    <input id="to" type="text" class="form-control" name="to">

                                    @if ($errors->has('to'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('to') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Send
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
