@php
    use Confetti\Helpers\ComponentGenerator;
    use Confetti\Helpers\Decoration;
    echo(new ComponentGenerator(
        name: 'text',
        decorations: [
            Decoration::DEFAULT->comment('Default will be used if no value is saved'),
            Decoration::LABEL->comment('Label is used as a field title in the admin panel'),
            Decoration::MAX->comment('Maximum number of characters'),
        ],
        phpClass: file_get_contents(repositoryPath() . '/structure/text_component.class.php'),
    ))->toJson();
@endphp
