@php($jobs = section('job_board'))
<ul>
    @foreach($jobs->list('job1')->columns(['name', 'age']) as $job)
        <li>{{ $job->text('name')->default('default name') }}</li>
        <li>{{ $job->number('age')->default('20') }}</li>
    @endforeach
</ul>

<ul>
    @foreach($jobs->list('job2')->columns(['name']) as $job)
        <li>{{ $job->text('name')->default('default name') }}</li>
    @endforeach
</ul>

