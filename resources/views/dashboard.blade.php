@can('role', 'admin')
    @include('dashboard.admin')
@elsecan('role', 'student')
    {{-- @include('dashboard.student') --}}
    @include('presences.presences-in')
@endcan
