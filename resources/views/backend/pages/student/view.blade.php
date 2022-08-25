{{-- <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
  <div class="card-header">Student Details</div>
  <div class="card-body">
    @foreach($user as $key=> $value)
    Student Id: {{ $value->student_id}}<br>
    Student Name: {{ $value->user->name}}<br>
    Student Phone No: {{ $value->user->phone}}<br>
    Student's Father Name: {{ $value->father_name}}<br><br>
    @endforeach
  </div>
</div> --}}
@foreach($user as $key=> $value)
    {{ $value->student_id}}<br>
    {{ $value->user->name}}<br>
    {{ $value->user->phone}}<br>
    {{ $value->father_name}}<br><br>
    @endforeach