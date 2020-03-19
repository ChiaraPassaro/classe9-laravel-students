@extends('layouts.layout')
@section('main')
{{-- @dd(
  $students
) --}}

  @foreach ($students as $key => $student)
      <p>
       {{$key}}: <br>
       name: {{$student['name']}} <br>
       age: {{$student['age']}} <br>
       company: {{$student['company']}} <br>
        role: {{$student['role']}} <br>
        gender: {{$student['gender']}} <br>
        slug: {{$student['slug']}} <br>
      </p>
  @endforeach
@endsection
