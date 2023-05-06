@php($jobs = section('job_board'))
<ul>
    @foreach($jobs->list('job1') as $job)
        <li>{{ $job->text('name')->default('default name') }}</li>
    @endforeach
</ul>

<ul>
    @foreach($jobs->list('job2') as $job)
        <li>{{ $job->text('name')->default('default name') }}</li>
    @endforeach
</ul>

