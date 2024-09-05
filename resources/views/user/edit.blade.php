<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Edit User</title>
</head>
<body>
    <div class="container pt-5">
        <div class="card">
            <div class="card-header">
                Edit User
            </div>
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
            @endif
            <div class="card-body">
                <form action="{{ route ('edit')}}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <div class="mb-3 ">
                      <label for="formGroupExampleInput" class="form-label">FullName</label>
                      <input type="text" name="full_name" value="{{$user->name}}" class="form-control"  id="formGroupExampleInput" placeholder="Full Name">
                      @error('full_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="formGroupExampleInput2" class="form-label">Email</label>
                      <input type="email" name="email" value="{{$user->email}}" class="form-control" id="formGroupExampleInput2" placeholder="Email">
                      @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="formGroupExampleInput2" class="form-label">Phone Number</label>
                      <input type="number" name="phone_number" value="{{$user->phone_number}}" class="form-control" id="formGroupExampleInput2" placeholder="Phone Number">
                      @error('phone_number')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>