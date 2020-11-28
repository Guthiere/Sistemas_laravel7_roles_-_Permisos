@extends('admin.layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
            <h1>Edit User</h1>

            @include('custom.message')

            <form method="POST" action="{{ route('user.update',$user->id) }}">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group">
                    <label for="name">Role name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Role name..." value="{{ old('name',$user->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"  class="form-control" placeholder="Email..." value="{{ old('email',$user->email) }}" required>
                </div>

                <div class="form-group">
                    <select class="form-control" name="roles" id="roles">
                        <option value="">Seleccione un Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}"
                                @isset($user->roles[0]->name)
                                    @if ($role->name == $user->roles[0]->name)
                                        selected
                                    @endif
                                @endisset
                                >{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <hr>



                <div class="form-group pt-2">
                    <input class="btn btn-primary" type="submit" value="Save">
                </div>
            </form>


        </div>
    </div>
@endsection
