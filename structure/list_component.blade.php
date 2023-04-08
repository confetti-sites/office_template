@php
    use Confetti\Helpers\ComponentGenerator;
    use Confetti\Helpers\Decoration;
    echo(new ComponentGenerator(
        name: 'list',
        decorations: [
            Decoration::MIN->comment('Minimum number of items'),
            Decoration::MAX->comment('Minimum number of items'),
        ],
        phpClass: file_get_contents(repositoryPath() . '/structure/list_component.class.php'),

    ))->toJson();
@endphp

