@extends('layouts/contentNavbarLayout')

@section('title', 'Get In Touch')

@section('content')
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Get In Touch</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Full name</th>
                        <th>Email Address</th>
                        <th>Mobile Number</th>
                        <th>Company</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if (is_array($contacts) || is_object($contacts))
                        @foreach ($contacts as $index => $contact)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $contact['full_name'] }}</td>
                                <td>{{ $contact['email_address'] }}</td>
                                <td>{{ $contact['mobile_number'] }}</td>
                                <td>{{ $contact['company'] }}</td>
                                <td>{{ $contact['description'] }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">No contacts available.</td>
                        </tr>
                    @endif
                </tbody>

            </table>
        </div>
    </div>
    <!--/ Responsive Table -->
@endsection
