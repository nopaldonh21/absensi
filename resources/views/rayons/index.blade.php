@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Daftar Rayon</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success mb-3" href="{{ route('rayons.create') }}"> Create</a>
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
            <th>Rayon</th>
            <th>Pembimbing</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($rayons as $rayon)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $rayon->rayon }}</td>
            <td>{{ $rayon->pembimbing }}</td>
            <td>
                <form action="{{ route('rayons.destroy',$rayon->id) }}" method="POST">
                    
                    <a class="btn btn-primary" href="{{ route('rayons.edit',$rayon->id) }}">Edit</a>
                    
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $rayons->links() !!}
        
@endsection