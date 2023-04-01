@php ($footer = section('pages'))

@foreach ($footer->list('column')->min(2)->max(3) as $column)
    <h3>{{ $column->text('title') }}</h3>
    <ul>
        @foreach($column->list('$row')->min(2)->max(10) as $row)
            <li>
                <a href="{{ $row->url('url') }}">
                    {{ $row->text('title') }}
                </a>
            </li>
        @endforeach
    </ul>
@endforeach
