@extends('admin.layouts.admin')

@section('content')
<div class="card-body">
    <form>
        <div class="form-group"> <!-- Country Button -->
            <label for="pais_id" class="control-label">Pais</label>
            <select class="form-control" id="pais_id" autofocus>
                <option value="">--Seleccione--</option>
                {{-- @foreach ($paises as $pais)
                <option value="{{ $pais->id }}"
                    @isset($user->paises[0]->Pais)
                        @if ($pais->Pais == $user->paises[0]->Pais)
                            selected
                        @endif
                    @endisset
                    >{{ $pais->Pais }}</option>

            @endforeach --}}
            </select>
        </div>
        <div class="form-group"> <!-- User -->
            <label for="user" class="control-label">User</label>
            <input type="text" class="form-control" id="user" name="user" placeholder="User">
        </div>

        <div class="form-group"> <!-- Full Name -->
            <label for="name" class="control-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
        </div>

        <div class="form-group"> <!-- email -->
            <label for="email" class="control-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="email@web.com">
        </div>

        <div class="form-group"> <!-- Institution Button -->
            <label for="Institution_id" class="control-label">Institution</label>
            <select class="form-control" id="Institution_id" autofocus>
                <option value="">--Seleccione--</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
            </select>
        </div>

        <hr>
        <div class="form-group"> <!-- Password -->
            <label for="password" class="control-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>

        <div class="form-group"> <!-- Confirm Password -->
            <label for="password-confirm" class="control-label">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
        </div>
        <hr>

        <div class="form-group"> <!-- Div Admin-->
            <label class="control-label">División Administrative</label>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->

                            <li class="nav-item has-treeview">

                                <a href="#" class="nav-link"><i class="nav-icon fas fa-circle"></i><p>Level 1<i class="right fas fa-angle-left"></i></p></a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Level 2
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Level 3</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Level 3</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="far fa-dot-circle nav-icon"></i>
                                                    <p>Level 3</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="form-group"> <!-- City-->
            <label for="city_id" class="control-label">City</label>
            <input type="text" class="form-control" id="city_id" name="city" placeholder="Smallville">
        </div>

        <div class="form-group"> <!-- State Button -->
            <label for="state_id" class="control-label">State</label>
            <select class="form-control" id="state_id">
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District Of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
            </select>
        </div>

        <div class="form-group"> <!-- Zip Code-->
            <label for="zip_id" class="control-label">Zip Code</label>
            <input type="text" class="form-control" id="zip_id" name="zip" placeholder="#####">
        </div>

        <div class="form-group"> <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Buy!</button>
        </div>

    </form>
</div>


@endsection
