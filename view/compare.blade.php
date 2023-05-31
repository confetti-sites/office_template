@php($compare = section('compare'))
<div class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="relative w-full max-w-5xl">
        <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob "></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-32 left-20 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            @foreach($compare->list('columns')->columns(['title'])->min(2)->max(2) as $column)
                <div class="m-10 relative space-y-6">
                    <div class="rounded-lg p-4 bg-purple-300 text-xl flex justify-center m-8">
                        <h3>{{ $column->text('title')->min(1)->max(50) }}</h3>
                    </div>
                    @php($i = 0)
                    @foreach($column->list('step')->columns(['description'])->min(1)->max(10) as $step)
                        @php($i++)
                        <div>
                            <div class="p-5 bg-white rounded-lg flex items-center justify-between space-x-8">
                                <div class="rounded-lg p-2 bg-purple-300">
                                    Step {{ $i }}
                                </div>
                                <div class="flex-1 flex justify-between items-center">
                                    {{ $step->text('description')->min(1)->max(100) }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>