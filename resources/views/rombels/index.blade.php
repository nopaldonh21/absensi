@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Daftar Rombel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success mb-3" href="{{ route('rombels.create') }}"> Create</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    
    <table class="table table-bordered">
        <tr>
            <th width="100px">No</th>
            <th>Rombel</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($rombels as $rombel)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $rombel->rombel }}</td>
            <td>
                <form action="{{ route('rombels.destroy',$rombel->id) }}" method="POST">
                    
                    <a class="btn btn-primary" href="{{ route('rombels.edit',$rombel->id) }}">Edit</a>
                    
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $rombels->links() !!}
        
@endsection