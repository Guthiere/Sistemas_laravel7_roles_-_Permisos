@extends('admin.layouts.admin')

@section('content')

<div class="row py-lg-2">
    <div class="col-md-6">
        <h2>This Is Role List</h2>
    </div>
    <div class="col-md-6">
        @can('haveaccess', 'role.create')
            <a href="{{ route('role.create') }}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Create New Role</a>
        @endcan

    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Data Roles
      <br>
      @include('custom.message')
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Id</th>
                        <th scope="col">Role</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Description</th>
                        <th scope="col">Full Access</th>
                        <th scope="col">Permissions</th>
                        <th scope="col">Tools</th>
                  </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Role</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Description</th>
                        <th scope="col">Full Access</th>
                        <th scope="col">Permissions</th>
                        <th scope="col">Tools</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>

                            <th>{{ $role['id'] }}</th>
                            <td>{{ $role['name'] }}</td>
                            <td>{{ $role['slug'] }}</td>
                            <td>{{ $role['description'] }}</td>
                            <td>{{ $role['full-access'] }}</td>
                            <td>
                                @if ($role['full-access']!='yes')
                                    @if ($role->permissions != null)
                                        @foreach ($role->permissions as $permissions)
                                            <span class="badge badge-secondary">{{ $permissions->name }}</span>
                                        @endforeach
                                    @endif
                                @endif
                            </td>
                            <td>
                                @can('haveaccess', 'role.show')
                                    <a href="{{ route('role.show',$role->id) }}"><i class="fa fa-eye"></i></a>
                                @endcan
                                @can('haveaccess', 'role.edit')
                                    <a href="{{ route('role.edit',$role->id) }}"><i class="fa fa-edit"></i></a>
                                @endcan
                                @can('haveaccess', 'role.destroy')
                                    <a href="#" data-toggle="modal" data-target="#deleteModal" data-roleid = "{{ $role['id'] }}"><i class="fas fa-trash-alt"></i></a>
                                @endcan
                        </td>
                        </tr>
                    @endforeach

                </tbody>
              </table>

              {{ $roles->links() }}
        </div>
    </div>
</div>

<!-- delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you shure you want to delete this?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
      <div class="modal-body">
        Select "delete" If you realy want to delete this role.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="" method="post">
            @csrf
            @method('DELETE')
            <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Delete</a>
        </form>
      </div>
    </div>
  </div>
</div>

    @section('js_role_page')

    <script>
    $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var role_id = button.data('roleid')

            var modal = $(this)
            // modal.find('.modal-footer #role_id').val(role_id)
            modal.find('form').attr('action','/role/' + role_id);
        })

    </script>

    @endsection


@endsection
