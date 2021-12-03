@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb pb-3">
            <div class="pull-left">
                <h2>Data Siswa</h2>
            </div>
            {{-- <div class="pull-right">
                <a class="btn btn-success mb-3" href="{{ route('students.create') }}"> Create</a>
            </div> --}}
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    
    <table class="table table-bordered">
        <tr>
            <th width="50px">No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Rombel</th>
            <th>Rayon</th>
            <th>Username</th>
            <th width="100px">Password</th>
            {{-- <th>Password</th> --}}
            <th width="140px"><span>Action</span>
                <a class="btn btn-sm btn-success" href="{{ route('students.create') }}"> Create</a></th>
            {{-- <th>
                <a class="btn btn-sm btn-success" href="{{ route('students.create') }}"> Create</a>
            </th> --}}
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->nis }}</td>
            <td>{{ $student->nama }}</td>
            <td>{{ $student->rombel }}</td>
            <td>{{ $student->rayon }}</td>
            <td>{{ $student->username}}</td>
            <td>***</td>
            {{-- <td>{{ $student->password}}</td> --}}
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
        
                    <a class="btn btn-sm btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
    
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $students->links() !!}
        
@endsection