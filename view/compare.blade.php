@php($compare = section('compare'))
<div class="bg-gray-50 flex items-center justify-center">
    @php($cases = $compare->list('cases')->columns(['title'])->min(1)->max(4))
    <div class="relative w-full max-w-5xl" x-data="{ tab: '1'}">
        <div class="absolute top-0 -right-4 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute top-20 -left-4 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob "></div>
        <div class="absolute -bottom-32 left-20 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
        <div class="relative">
            <div class="flex mt-8 mb-10 space-x-4 text-xl border-b border-gray-300">
                @php($i = 0)
                @foreach($cases as $case)
                    @php($i++)
                    <div class="hover:text-indigo-600 py-2 cursor-pointer" :class="{'text-indigo-600 border-b border-indigo-600': tab == '{{ $i }}'}" @click="tab = '{{ $i }}'">
                        <span>{{ $case->text('title')->min(1)->max(20) }}</span>
                    </div>
                @endforeach
            </div>
            @php($i = 0)
            @foreach($cases as $case)
                @php($i++)
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2" x-show="tab == {{ $i }}">
                    @foreach($case->list('columns')->columns(['title'])->min(2)->max(2) as $column)
                        <div class="m-10 mt-0 relative space-y-4">
                            <div class="rounded-lg p-4 bg-blue-300 text-xl flex justify-center m-8">
                                <h3>{{ $column->text('title')->min(1)->max(50) }}</h3>
                            </div>
                            @php($stepI = 0)
                            @foreach($column->list('step')->columns(['description'])->min(1)->max(10) as $step)
                                @php($stepI++)
                                <div>
                                    <div class="p-4 bg-white rounded-lg flex items-center justify-between space-x-8">
                                        <div class="rounded-lg p-2 bg-blue-300">
                                            Step {{ $stepI }}
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
            @endforeach
        </div>
    </div>
</div>