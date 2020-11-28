@extends('admin.layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
            <h1>Create New Role</h1>

            @include('custom.message')

            <form method="POST" action="{{ route('role.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Role name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Role name..." value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="slug">Role Slug</label>
                    <input type="text" name="slug" id="slug" tag="role_slug" class="form-control" placeholder="Role Slug..." value="{{ old('slug') }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description">{{ old('description') }}</textarea>
                </div>
                <hr>
                <h3>Full Access</h3>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes" @if (old('full-access')=='yes') checked @endif>
                    <label class="custom-control-label" for="fullaccessyes">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no"  @if (old('full-access')=='no') checked @endif @if (old('full-access')===null) checked @endif>
                    <label class="custom-control-label" for="fullaccessno">No</label>
                </div>

                <hr>

                <div class="form-group" >
                    <h3>Add Permissions</h3>
                    <a href="#"class="btn btn-success float-md-right" data-toggle="modal" data-target="#examplemodal">Create Permission</a>
                    <br>
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
                                        @if (is_array(old('permission')) && in_array("$permission->id",old('permission')))
                                            checked
                                        @endif >
                                        <label class="custom-control-label" for="permission_{{ $permission->id }}">
                                            {{ $permission->id }}
                                        </label>
                                    </div>
                                </th>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->slug }}</td>
                                <td><em>{{ $permission->description }}</em></td>
                                <td>
                                    <a href="/permission/{{ $permission['id'] }}"><i class="fa fa-eye"></i></a>
                                    <a href="/permission/{{ $permission['id'] }}/edit"><i class="fa fa-edit"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#deleteModal" data-permissionid = "{{ $permission['id'] }}"><i class="fas fa-trash-alt"></i></a>
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

    </div>
</div>

                <!-- delete Modal-->
                <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="examplemodalLabel" aria-hidden="true">
                    <div class="modal-dialog" permission="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="examplemodalLabel">
                                    Are you shure you want to delete this?
                                </h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Select "delete" If you realy want to delete this role.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Cancel
                                </button>
                                <form action="" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary" onclick="$(this).closest('form').submit();">
                                        Delete
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


      @section('js_role_page')

      <script>

        $(document).ready(function(){
            $('#name').keyup(function(e){
                var str = $('#name').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//reemplaza spacios por "-"
                $('#slug').val(str);
                $('#slug').attr('placeholder', str);
            });
        });

      $('#deletemodal').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget)
              var role_id = button.data('permissionid')

              var modal = $(this)
              // modal.find('.modal-footer #role_id').val(role_id)
              modal.find('form').attr('action','/role/' + permissionid);
          })
      </script>

      @endsection

@endsection
