@php
    echo(new ComponentGenerator(
        name: 'text',
        decorations: [
            Decoration::MIN->comment('Minimum number of characters'),
            Decoration::MAX->comment('Maximum number of characters'),
        ],
        phpClass: file_get_contents(currentViewDirectory() . 'text_component.class.php'),
    ))->toJson();
@endphp
