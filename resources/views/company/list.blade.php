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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>

<body>

    <div class=" container">

        <a href=" {{route('company.create')}} " class=" btn btn-warning">Create Company</a>

    </div>
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
    <div class="">

        <table class="table table-hover container text-justify">
            <thead>
                <th><b>#</b> </th>
                <th> Name </th>
                <th>Address </th>
                <th>Website </th>
                <th>Phone Number</th>
                <th colspan="5">Action</th>
            </thead>
            <tbody>
                @php($itter= 1)
                @foreach ($companies as $company)
                <tr>
                    <td>{{ $itter }}</td>
                    @php($itter++)
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->address }}</td>
                    <td><a href="">{{ $company->website }}</a></td>
                    <td><a href="" type="tel">{{ $company->phone_number }}</a></td>
                    <td colspan="5">


                        <form action="{{ route('company.destroy', $company->id) }}" method="POST">

                            <a href="{{ route('company.show', $company->id) }}" title="show" class="btn btn-primary">
                                <i class="fas fa-eye text-success"></i>Show
                            </a>
                            <a href="{{ route('company.edit', $company->id) }}" class='btn btn-secondary'>
                                <i class="fa fa-edit"></i>
                                Edit
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="delete" class='btn btn-danger'>
                                <i class="fa fa-trash" "></i>
                                Delete
</button>
                        </form>
                    </td>



                </tr>
                @endforeach
            </tbody>
        </table>
    </div>




</html>