 @extends(Auth::user()->role == 'admin' ? 'layout.main2' : 'layout.main')


@section('content')

@endsection
