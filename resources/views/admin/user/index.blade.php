@extends('admin.layouts.admin')

@section('content')

<div class="row py-lg-2">
    <div class="col-md-6">
        <h2>This Is User List</h2>
    </div>
    <div class="col-md-6">

    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Data users
      <br>
      @include('custom.message')
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                  <tr>
                        <th scope="col">Id</th>
                        <th scope="col">user</th>
                        <th scope="col">Email</th>
                        <th scope="col">Institution</th>
                        <th scope="col">Role(S)</th>
                        <th scope="col">Ubication</th>
                        <th scope="col">Tools</th>
                  </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">User</th>
                        <th scope="col">Email</th>
                        <th scope="col">Institution</th>
                        <th scope="col">Role(S)</th>
                        <th scope="col">Ubication</th>
                        <th scope="col">Tools</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($users as $user)

                        <tr>
                            <th>{{ $user['id'] }}</th>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['institution'] }}</td><!--pendiente agregar relaciones a instituciones-->
                            <td> @isset($user->roles[0]->name) {{ $user->roles[0]->name }} @endisset </td>
                            <td>
                                @if ($user['full-access']!='yes') <!--Pendiente agregar Ubicaciones-->
                                    @if ($user->roles != null)
                                        @foreach ($user->roles as $role)
                                            <span class="badge badge-secondary">{{ $role->name }}</span>
                                        @endforeach
                                    @endif
                                @endif
                            </td>
                            <td>
                                @can('view', [$user,['user.show','userown.show']])
                                    <a href="{{ route('user.show',$user->id) }}"><i class="fa fa-eye"></i></a>
                                @endcan
                                @can('update', [$user,['user.edit','userown.edit']])
                                    <a href="{{ route('user.edit',$user->id) }}"><i class="fa fa-edit"></i></a>
                                @endcan
                                @can('haveaccess', 'user.destroy')
                                    <a href="#" data-toggle="modal" data-target="#deleteModal" data-userid = "{{ $user['id'] }}"><i class="fas fa-trash-alt"></i></a>
                                @endcan

                        </td>
                        </tr>
                    @endforeach

                </tbody>
              </table>


              {{ $users->links() }}
        </div>
    </div>
</div>

<!-- delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" user="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you shure you want to delete this?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
      <div class="modal-body">
        Select "delete" If you realy want to delete this user.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action ="" method="POST">
            @csrf
            @method('DELETE')
            <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Delete</a>
        </form>
      </div>
    </div>
  </div>
</div>

    @section('js_user_page')

    <script>
    $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var user_id = button.data('userid')

            var modal = $(this)
            // modal.find('.modal-footer #user_id').val(user_id)
            modal.find('form').attr('action','/user/' + user_id);
        })

    </script>

    @endsection


@endsection
