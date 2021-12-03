@can('role', 'admin')

@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb pb-3">
            <div class="pull-left">
                <h2>Data Absensi Siswa</h2>
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
            <th>Tanggal</th>
            <th>Jam Kedatangan</th>
            <th>Jam Kepulangan</th>
            <th>Keterangan</th>
            <th width="140px"><span>Action</span>
                <a class="btn btn-sm btn-success" href="
                {{-- {{ route('historis.create') }} --}}
                "> Create</a></th>
            {{-- <th>
                <a class="btn btn-sm btn-success" href="{{ route('historis.create') }}"> Create</a>
            </th> --}}
        </tr>
        @foreach ($historis as $history)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $history->nis }}</td>
            <td>{{ $history->tgl }}</td>
            <td>
                @if ( $history->jam_dtng == '')
                    -
                @else
                {{ $history->jam_dtng }}
                @endif
            </td>
            <td>
                @if ( $history->jam_plng == '')
                    -
                @else
                {{ $history->jam_plng }}
                @endif
            </td>
            <td>
                {{ $history->ket}}
            </td>
            <td>
                <form action="
                {{-- {{ route('historis.destroy',$history->id) }} --}}
                " method="POST">
        
                    <a class="btn btn-sm btn-primary" href="
                    {{-- {{ route('historis.edit',$history->id) }} --}}
                    ">Edit</a>
    
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $historis->links() !!}
        
@endsection

@endcan