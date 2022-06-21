@extends('layouts.app')
@section('title', 'homepage')

@section('container')
    <div class="container-fluid">
        <h1 class="alert alert-danger text-center p-0 mx-0">Student CRUD</h1>
        <div class="row">
            <div class="col-4 shadow">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="students" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" value="{{ old('email') }}"
                            name="email" aria-describedby="emailHelp">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" value="{{ old('first_name') }}" id="first_name"
                            name="first_name">
                        @error('first_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" value="{{ old('middle_name') }}" id="middle_name"
                            name="middle_name">
                        @error('middle_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Lame</label>
                        <input type="text" class="form-control" value="{{ old('last_name') }}" id="last_name"
                            name="last_name">
                        @error('last_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" value="{{ old('city') }}" id="city"
                            name="city">
                        @error('city')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="roll" class="form-label">Roll</label>
                        <input type="text" class="form-control" value="{{ old('roll') }}" id="roll"
                            name="roll">
                        @error('roll')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">email</th>
                            <th scope="col">first name</th>
                            <th scope="col">last name</th>
                            <th scope="col">city</th>
                            <th scope="col">actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $stu)
                            <tr>
                                <th scope="row">{{ $stu->id }}</th>
                                <td>{{ $stu->email }}</td>
                                <td>{{ $stu->first_name }}</td>
                                <td>{{ $stu->last_name }}</td>
                                <td>{{ $stu->city }}</td>
                                <td>
                                    <a href="{{ route('students.edit', ['student' => $stu->id]) }}" class="btn btn-primary">
                                        {{-- @method('PUT') --}}
                                        {{-- @csrf --}}

                                        edit
                                    </a>
                                    <form action="{{ route('students.destroy', $stu->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
