@extends('admin.layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
            <h1>Edit Role</h1>

            @include('custom.message')

            <form method="POST" action="{{ route('role.update',$role->id) }}">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group">
                    <label for="name">Role name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Role name..." value="{{ old('name',$role->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="slug">Role Slug</label>
                    <input type="text" name="slug" id="slug" tag="role_slug" class="form-control" placeholder="Role Slug..." value="{{ old('slug',$role->slug) }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description">{{ old('description', $role->description) }}</textarea>
                </div>
                <hr>
                <h3>Full Access</h3>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes" @if ($role['full-access'] =='yes') checked @elseif (old('full-access')=='yes') checked @endif>
                    <label class="custom-control-label" for="fullaccessyes">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no" @if ($role['full-access'] =='no') checked @elseif (old('full-access')=='no') checked @endif>
                    <label class="custom-control-label" for="fullaccessno">No</label>
                </div>

                <hr>

                <div class="form-group" >
                    <h3>Add Permissions</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="tablepermissions" width="100%" cellspacing="0" >
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Tools</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($permissions as $permission)

                                    <tr>
                                    <th scope="row">
                                        <div class="custom-control custom-checkbox">
                                            <input readonly type="checkbox" class="custom-control-input" name="permission[]" id="permission_{{ $permission->id }}" value ="{{ $permission->id }}"
                                            @if (is_array(old('permission')) && in_array("$permission->id",old('permission'))) checked @elseif (is_array($permission_role) && in_array("$permission->id",$permission_role)) checked @endif >
                                            <label class="custom-control-label" for="permission_{{ $permission->id }}"> {{ $permission->id }} </label>
                                        </div>
                                    </th>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->slug }}</td>
                                    <td><em>{{ $permission->description }}</em></td>
                                    <td>
                                        <a href="#{{ $permission['id'] }}"><i class="fa fa-eye"></i></a>
                                        <a href="#{{ $permission['id'] }}/edit"><i class="fa fa-edit"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#deleteModal" data-roleid = "{{ $permission['id'] }}"><i class="fas fa-trash-alt"></i></a>
                                    </td>

                                    <tr>

                                @endforeach

                            </tbody>
                        </table>
                        <hr>
                    </div>
                </div>



                <div class="form-group pt-2">
                    <input class="btn btn-primary" type="submit" value="Save">
                </div>
            </form>

            @section('js_role_page')


                <script>

                    $(document).ready(function(){
                        $('#name').keyup(function(e){
                            var str = $('#name').val();
                            str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//rplace stapces with dash
                            $('#slug').val(str);
                            $('#slug').attr('placeholder', str);
                        });
                    });
                </script>

            @endsection
        </div>
    </div>
@endsection
