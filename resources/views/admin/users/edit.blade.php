@component('admin.layout.content' , ['title'=>'ویرایش کاربر'])
    @slot('breadcrumb')
        <li class="breadcrumb-item "> <a href="/admin" class="active">  پنل مدیریت </a>  </li>
        <li class="breadcrumb-item " > <a href="{{route('admin.users.index')}}" class="active"> لیست کاربران </a> </li>
        <li class="breadcrumb-item active">ویرایش کاربر </li>

    @endslot

    <div class="row">
        <div class="col-lg-12">
                @include('admin.layout.errors')
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">فرم ویرایش کاربر</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('admin.users.update',['user'=>$user->id])}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">نام</label>
                            <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="نام کاربر را وارد کنید" value="{{$user->name}}">
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">ایمیل</label>
                            <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="ایمیل را وارد کنید" value="{{$user->email}}">
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">پسورد</label>
                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="پسورد را وارد کنید">
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">تکرار پسورد</label>
                            <input type="password" name="password_conformation" class="form-control" id="inputPassword3" placeholder="پسورد را وارد کنید">

                        </div>
                        @if( ! $user->hasVerifiedEmail())
                            <div class="form-check">
                                <input type="checkbox" name="verify" class="form-check-input" id="verify" >
                                <label class="form-check-label" for="verify" >اکانت فعال باشد</label>

                            </div>
                        @endif
                        @if(! $user->isSuperUser())
                            @can('select-a-position')
                                <div class="form-check">
                                    <input type="checkbox" name="is_superuser" class="form-check-input" id="verify" >
                                    <label class="form-check-label" for="is_superuser" >مدیر کل</label>
                                </div>
                            @endcan
                        @endif
                        @if(! $user->isStaff())
                            @can('select-a-position')
                                <div class="form-check">
                                    <input type="checkbox" name="is_staff" class="form-check-input" id="verify" >
                                    <label class="form-check-label" for="is_staff" >کارمند</label>

                                </div>
                            @endcan
                        @endif

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ویرایش کاربر</button>
                        <a href="{{route('admin.users.index')}}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>

        </div>
    </div>


@endcomponent
