<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @livewireStyles
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> -->

    <!-- Scripts -->
    @routes
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
            {{ __('Logout') }}
        </x-jet-responsive-nav-link>
    </form>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table>
        <thead>
            <th>No </th>
            <th> Name </th>
            <th>Address </th>
            <th>Website </th>
            <th>Phone Number</th>
            <th>Action</th>
        </thead>
        <tbody>
            @php($itter= 1)
            @foreach ($companies as $company)
            <tr>
                <td>{{ $itter }}</td>
                @php($itter++)
                <td>{{ $company->name }}</td>
                <td>{{ $company->address }}</td>
                <td>{{ $company->website }}</td>
                <td>{{ $company->phone_number }}</td>
                <td>

                    <a href="{{route('company.show',$company->id)}}">go</a>
                    <a href="{{ route('company.edit', $company->id) }}">
                        <i class="fas fa-edit  fa-lg"></i> Edit
                    </a>
                    <form action="{{ route('company.destroy', $company->id) }}" method="POST">
                        <a href="{{ route('company.show', $company->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>
                        <a href="{{ route('company.edit', $company->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>
                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                            Delete
                        </button>
                    </form>
                </td>



            </tr>
            @endforeach
        </tbody>
    </table>


    <a href="{{route('company.create')}} ">Create Company</a>


</html>