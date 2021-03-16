@component('admin.layout.content' , ['title'=>'ثبت دسترسی'])
    @slot('breadcrumb')
        <li class="breadcrumb-item "> <a href="/admin" class="active">  پنل مدیریت </a>  </li>
        <li class="breadcrumb-item " > <a href="{{route('admin.users.index')}}" class="active"> لیست کاربران </a> </li>
        <li class="breadcrumb-item active">ثبت دسترسی </li>

    @endslot
    @slot('script')
        <script>

            $('#roles').select2({
                placeholder:'مقام مورد نظر خود را انتخاب کنید'
            })
            $('#permissions').select2({
                placeholder:'دسترسی مورد نظر خود را انتخاب کنید'
            })
        </script>
    @endslot

    <div class="row">
        <div class="col-lg-12">
                @include('admin.layout.errors')
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">فرم ثبت دسترسی</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('admin.users.permissions.store',$user->id)}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">مقام ها</label>
                            <select name="roles[]" class="form-control" id="roles" multiple>
                                @foreach(\App\Models\Role::all() as $role)
                                    <option value="{{$role->id}}" {{in_array($role->id , $user->roles->pluck('id')->toArray())? 'select': ''}}>{{$role->name}} - {{$role->label}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">دسترسی ها</label>
                            <select name="permissions[]" class="form-control" id="permissions" multiple>
                                @foreach(\App\Models\Permission::all() as $permission)
                                    <option value="{{$permission->id}}" {{in_array($permission->id , $role->permissions->pluck('id')->toArray())? 'select': ''}}>{{$permission->name}} - {{$permission->label}}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت مقام</button>
                        <a href="{{route('admin.roles.index')}}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>

        </div>
    </div>


@endcomponent
