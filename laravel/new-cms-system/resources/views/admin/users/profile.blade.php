<x-admin-master>

    @section('content')
        <h1>User Profile for : {{ $user->name }}</h1>

        <div class="row">

            <div class="col-sm-6">

                <form action="{{route('user.profile.update', $user)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <img height="100px" src="{{auth()->user()->avatar}}" class="img-profile rounded-circle">
                    </div>
                    <div class="form-group">
                        <input type="file" name="avatar">
                    </div>
                    
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input 
                            type="text" 
                            name="username" 
                            id="username"
                            class="form-control
                            {{$errors->has('username') ? 'is-invalid' : ' '}}
                            " 
                            value="{{$user->username}}">
                            @error('username')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name"
                            class="form-control" 
                            value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input 
                            type="text" 
                            name="email" 
                            id="email" 
                            class="form-control"
                            value="{{$user->email}}"
                            >
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            class="form-control"
                            >
                    </div>
                    <div class="form-group">
                        <label for="password-confirmation">Confirm Password</label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            id="password-confirmation" 
                            class="form-control"
                            >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>
    @endsection
</x-admin-master>


