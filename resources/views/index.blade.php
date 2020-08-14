@extends('master')

@section('content')
<div class="card">
<div class="card-body">
<table class="table table-hover table-striped" style="width: 100%">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Father's Name</th>
            <th>Mother's Name</th>
            <th>Education Level</th>
            <th>Points</th>
            <th>Images</th>
        </tr>

        @foreach ($students as $student)
        <tr>
            <td> {{ $student->name }}</td>
            <td> {{ $student->phone }}</td>
            <td> {{ $student->fname }}</td>
            <td> {{ $student->mname }}</td>

            @foreach ($student->degrees as $degree)
            @if($degree->degree_id == 1)
            <td> {{ 'SSC' }}</td>
            @endif
            @if($degree->degree_id == 2)
            <td> {{ 'HSC' }}</td>
            @endif
            @if($degree->degree_id == 3)
            <td> {{ 'O LEVEL' }}</td>
            @endif
            @if($degree->degree_id == 4)
            <td> {{ 'A LEVEL' }}</td>
            @endif
            @if($degree->degree_id == 5)
            <td> {{ 'BSC' }}</td>
            @endif
            @if($degree->degree_id == 6)
            <td> {{ 'BBA' }}</td>
            @endif
            @if($degree->degree_id == 7)
            <td> {{ 'MSC' }}</td>
            @endif
            @if($degree->degree_id == 8)
            <td> {{ 'MBA' }}</td>
            @endif

            <td> {{ $degree->point }}</td>
            @endforeach

            @php $i=1; @endphp
            @foreach ($student->images as $image)
                @if($i>0)
                    <td> <img src="{{ asset('images/students/'.$image->image) }}" style="width: 50px;height: 50px"></td>
                @endif
                @php $i--; @endphp
            @endforeach
        </tr>
        @endforeach

</table>
</div>
</div>
@endsection
    