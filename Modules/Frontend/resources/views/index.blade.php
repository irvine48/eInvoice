@extends('frontend::layouts.master')

@section('content')
    <div class="p-5 row">
        <div class="col">
            <h3 class="my-5">Application Programming Interface (API)</h3>
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ route('frontend.api.login-as-taxpayer-system') }}">Login as Taxpayer System</a></li>
                {{-- <li class="list-group-item"><a href="#">Login as Intermediary System</a></li> --}}
                {{-- <li class="list-group-item"><a href="#">Get All Document Types</a></li> --}}
                {{-- <li class="list-group-item"><a href="#">Get Document Type</a></li> --}}
                {{-- <li class="list-group-item"><a href="#">Get Notifications</a></li> --}}
            </ul>

            {{-- <h3 class="my-5">e-Invoice APIs</h3>
            <ul class="list-group">
                <li class="list-group-item"><a href="#">Validate Taxpayer's TIN</a></li>
                <li class="list-group-item"><a href="#">Submit Documents</a></li>
                <li class="list-group-item"><a href="#">Cancel Document</a></li>
                <li class="list-group-item"><a href="#">Reject Document</a></li>
                <li class="list-group-item"><a href="#">Get Recent Documents</a></li>
                <li class="list-group-item"><a href="#">Get Submission</a></li>
                <li class="list-group-item"><a href="#">Get Document</a></li>
                <li class="list-group-item"><a href="#">Get Document Details</a></li>
                <li class="list-group-item"><a href="#">Search Documentsn</a></li>
            </ul> --}}

        </div>
    </div>
@endsection
