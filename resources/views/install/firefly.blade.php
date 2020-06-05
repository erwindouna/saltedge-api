@extends('app')

@section('content')
    <div class="container">

        <div class="form-sec">
            <h4>Firefly settings</h4>

            <form name="qryform" id="qryform" method="post" action="{{ route('fireflyOauthRequest') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" id="fireflyEndpoint"
                           placeholder="Firefly authorize URL (e.g. http://firefly.local/oauth/authorize)"
                           name="fireflyEndpoint" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="clientId" placeholder="Client ID" name="clientId"
                           required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="secret" placeholder="Secret" name="secret" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>


    </div>
@endsection