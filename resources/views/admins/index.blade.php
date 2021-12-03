@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb pb-3">
            <div class="pull-left">
                <h2>Data Admin</h2>
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
            <th>Nama</th>
            <th>Username</th>
            <th>Role</th>
            <th>Password</th>
            <th width="140px">
                <span>Action</span>
                <a class="btn btn-sm btn-success" href="{{ route('admins-create') }}"> Create</a>
            </th>
            {{-- <th> --}}
                {{-- <a class="btn btn-sm btn-success" href=" --}}
                {{-- {{ route('admins.create') }} --}}
                {{-- "> Create</a> --}}
            {{-- </th> --}}
        </tr>
        @foreach ($admins as $admin)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->username}}</td>
            <td>{{ $admin->role }}</td>
            {{-- <td>{{ $admin->password}}</td> --}}
            <td>***</td>
            <td>
                <form action="{{ route('admins-delete', $admin->id) }}" method="POST">
        
                    <a class="btn btn-sm btn-primary" href="{{ route('admins-edit', $admin->id) }}">Edit</a>
    
                    @csrf
                    {{-- @method('DELETE') --}}
        
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {{-- {!! $admins->links() !!} --}}
        
@endsection