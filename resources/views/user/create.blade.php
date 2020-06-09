@extends('layouts.app')
@section('title', 'Пользователи - создание')

@section('content')
    <div class="col-6 mt-5">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            @include('partials.user.form')
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Создать">
            </div>
        </form>
    </div>
@endsection

