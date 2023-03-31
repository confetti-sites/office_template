@php
    echo(new ComponentGenerator(
        name: 'text',
        decorations: [
        ],
        phpClass: file_get_contents(currentViewDirectory() . 'text_component.class.php'),
    ))->toJson();
@endphp
