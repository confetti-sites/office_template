@php($jobs = section('jobs'))
<ul>
    @foreach($jobs->list('job') as $job)
        <li>{{ $job->text('name')->default('default name') }}</li>
    @endforeach
</ul>
