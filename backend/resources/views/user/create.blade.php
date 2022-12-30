@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создание пользователя</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Имя">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{ old('surname') }}" name="surname" class="form-control" placeholder="Фамилия">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{ old('patronymic') }}" name="patronymic" class="form-control" placeholder="Отчество">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{ old('age') }}" name="age" class="form-control" placeholder="Возраст">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{ old('address') }}" name="address" class="form-control" placeholder="Адрес">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{ old('email') }}" name="email" class="form-control" placeholder="Почта">
                    </div>

                    <div class="form-group">
                        <input type="password" value="{{ old('password') }}" name="password" class="form-control" placeholder="Пароль">
                    </div>
                    <div class="form-group">
                        <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control" placeholder="Пароль">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </div>
                </form>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
