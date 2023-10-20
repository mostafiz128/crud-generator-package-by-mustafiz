<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD GENERATOR</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body class="bg-light">
    <div class="container bg-white pb-3">
        <div class="d-flex justify-content-between pt-4 mb-3">
            <h3>ENTRY LIST</h3>
            <div>
                <a href="{{route('crud.create')}}" class="btn btn-info btn-sm text-white">Add New</a>
            </div>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        <table class="table mb-3">
            <thead>
            <tr>
                <th scope="col">#SL</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data_list as $key=>$list)
            <tr>
                <th scope="row">{{$list->id}}</th>
                <td>{{$list->name}}</td>
                <td>{{$list->email}}</td>
                <td>{{$list->phone}}</td>
                <td>{{$list->address}}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('crud.edit',$list->id)}}" class="btn btn-info  btn-sm text-white">Edit</a>
                        <a href="{{route('crud.delete',$list->id)}}" class="btn btn-danger  btn-sm text-white">Delete</a>
                    </div>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $data_list->links() !!}
    </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
