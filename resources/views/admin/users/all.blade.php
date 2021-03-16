@component('admin.layout.content' , ['title'=>'پنل مدیریت'])
    @slot('breadcrumb')
        <li class="breadcrumb-item "> <a href="/admin" class="active">  پنل مدیریت </a>  </li>
        <li class="breadcrumb-item  active " > لیست کاربران </li>

    @endslot

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جدول کاربران</h3>

                    <div class="card-tools d-flex">
                        <form action="" method="post">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو" value="{{request('search')}}">

                                <div class="input-group-append ">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                        </form>
                        </div>
                        <div class="btn-group-sm mr-1">

                                <a href="{{route('admin.users.create')}}" class="btn btn-info">ایجاد کاربر جدید</a>

                                <a href="{{request()->fullUrlWithQuery(['admin'=>1])}}" class="btn btn-dark">کاربران مدیر</a>


                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>آیدی کاربر</th>
                            <th>نام کاربر</th>
                            <th>ایمیل کاربر</th>
                            <th>وضعیت ایمیل</th>
                            <th>اقدامات</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                @if($user->email_verified_at)
                                    <td><span class="badge badge-success">فعال</span></td>
                                @else
                                    <td><span class="badge badge-danger">غیر فعال</span></td>

                                @endif
                                <td class="btn-group">

                                        <form method="post" action="{{route('admin.users.destroy', ['user'=>$user->id])}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger ml-1"> حذف </button>
                                        </form>


                                            <a href="{{route('admin.users.edit',['user'=>$user->id])}}" class="btn btn-sm btn-primary ml-2">ویرایش</a>

                                    @if($user->isStaff())
                                        @can('')
                                             <a href="" class="btn btn-sm btn-warning">دسترسی ها</a>
                                        @endcan
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{$users->render()}}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>


@endcomponent
