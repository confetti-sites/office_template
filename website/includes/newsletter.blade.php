@php($model = newRoot(new \model\newsletter))

<div class="mx-auto max-w-[510px] m-8 p-8 pt-8 border-blue-500 relative overflow-hidden rounded-xl border border-opacity-20 bg-white">
    <div class="js-edit:{{ $model->getId() }}"></div>
    @if($model->newsletter->embed())
        <div class="text-blue-500 mb-4 block text-lg font-semibold">
            {{ $model->text('description')->max(200) }}
        </div>
        <div class="mb-4 text-[30px] font-bold">
            {{ $model->newsletter->getTitle() }}
        </div>
        <div class="mt-4">
            {!! $model->form('newsletter')->embed() !!}
        </div>
    @else
        <div class="mb-4 text-[30px] font-bold">
            The newsletter
        </div>

        <div class=" flex items-center justify-center">
            <p class="text-gray-500 italic font-serif font-body text-sm">
                No form has been added yet. @guest Login @else Press Option or Alt and click the edit button @endguest to add a form.
            </p>
        </div>
    @endif
</div>
