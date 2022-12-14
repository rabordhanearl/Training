<x-admin-master>
    @section('content')
    @if (session()->has('permission-updated'))
        <div class="alert alert-success">
            {{session('permission-updated')}};
        </div>
        
    @endif

    <div class="row">
        <div class="col-sm-6">
            <h1>Edit Permission : {{$permission->name}}</h1>
            <form method="post" action="{{route('permissions.update', $permission->id)}}" >
                @csrf
                @method('PUT')
                <div class="from-group">
                    <label for="name">Name</label>
                    <input type="text" id="" name="name"class="form-control" value="{{$permission->name}}">
    
                </div>
                    <button class="btn btn-primary mt-2" type="submit">Update</button>
            </form>
        </div>
    </div>

    @endsection
</x-admin-master>