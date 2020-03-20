@extends('layouts.layout')
@section('main')
{{-- @dd(
  $students
) --}}
  {{-- 'name' => 'Pippo',
  'age' => 30,
  'company' => 'Disney',
  'role' => 'Web Developer',
  'gender' => 'm' --}}
  <div class="form-group">
    <input type="text" name="name" id="name" placeholder="inserisci il nome" class="form-control">
    <input type="text" name="company" id="company" placeholder="inserisci l'azienda" class="form-control">
    <input type="text" name="role" id="role" placeholder="inserisci il ruolo" class="form-control">
    <input type="text" name="age" id="age"  placeholder="inserisci l'età" class="form-control">
    <select name="gender" id="gender">
      <option value="">all</option>
      <option value="m">uomo</option>
      <option value="f">donna</option>
    </select>
    <input id="filter-button" type="submit" value="cerca">
  </div>

  <div class="students">
    @foreach ($students as $key => $student)
      <div class="student">
        <p>
        {{$key}}: <br>
        name: {{$student['name']}} <br>
        age: {{$student['age']}} <br>
        company: {{$student['company']}} <br>
          role: {{$student['role']}} <br>
          gender: {{$student['gender']}} <br>
          slug: {{$student['slug']}} <br>
        </p>
      </div>
    @endforeach
  </div>

@endsection
@section('scripts')
    <script id="entry-template" type="text/x-handlebars-template">
      <div class="student">
        <p>
          @{{key}}: <br>
          name: @{{name}} <br>
          age: @{{age}} <br>
          company: @{{company}} <br>
          role: @{{role}} <br>
          gender: @{{gender}} <br>
          slug: @{{slug}} <br>
        </p>
      </div>
    </script>
    <script src="{{asset('js/app.js')}}"></script>
@endsection
