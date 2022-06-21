@extends('layouts.app')
@section('title', 'homepage')

@section('container')
    <div class="container-fluid">
        <h1 class="alert alert-danger text-center p-0 mx-0">Update Student</h1>
        <div class="row">
            <div class="col-4 shadow">
                
                <form action="{{route('students.update',['student'=>$student->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" value="{{ $student->email }}"
                            name="email" aria-describedby="emailHelp">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" value="{{$student->first_name}}" id="first_name"
                            name="first_name">
                        @error('first_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" value="{{ $student->middle_name }}" id="middle_name"
                            name="middle_name">
                        @error('middle_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Lame</label>
                        <input type="text" class="form-control" value="{{ $student->last_name }}" id="last_name"
                            name="last_name">
                        @error('last_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" value="{{ $student->city }}" id="city"
                            name="city">
                        @error('city')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="roll" class="form-label">Roll</label>
                        <input type="text" class="form-control" value="{{ $student->roll }}" id="roll"
                            name="roll">
                        @error('roll')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="update" class="btn btn-primary">Submit</button>
                </form>
            </div>
            
        </div>
    </div>
@endsection
