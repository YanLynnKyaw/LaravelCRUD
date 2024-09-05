<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>LARAVEL CRUD</title>
</head>
<body>
    <div class="container pt-5">
        <div class="card">
            <div class="card-header">
                CRUD USER
                <a href="{{route('store')}}" class="btn btn-success btn-sm float-end">Add User</a>
            </div>
            @if (Session::has('success'))
                <span class="alert alert-success p-2">{{Session::get('success')}}</span>
            @endif
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
            @endif
            <div class="card-body">
                <table class="table table-sm table-striped table-bordered">
                    <thead class="">
                        <th>No</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Registration Date</th>
                        <th>Last Update</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @if (count($users) > 0)
                            @foreach ($users as $all_users)
                                <tr>
                                    <td>{{$all_users->id}}</td>
                                    <td>{{$all_users->name}}</td>
                                    <td>{{$all_users->email}}</td>
                                    <td>{{$all_users->phone_number}}</td>
                                    <td>{{$all_users->created_at}}</td>
                                    <td>{{$all_users->updated_at}}</td>
                                    <td class="p-2">
                                        <a href="/user/edit/{{$all_users->id}}" class="btn btn-primary btn-sm m-1">Edit</a>
                                        <a href="/user/delete/{{$all_users->id}}" class="btn btn-danger btn-sm m-1">Delete</a>
                                        <a class="dropdown">
                                          <button class="btn btn-secondary btn-sm dropdown-toggle m-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Role
                                          </button>
                                          <ul class="dropdown-menu">
                                            <li><button class="dropdown-item" type="button">Admin</button></li>
                                            <li><button class="dropdown-item" type="button">Moderator</button></li>
                                            <li><button class="dropdown-item" type="button">User</button></li>
                                          </ul>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">No Data Found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>