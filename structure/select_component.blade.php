@php
    use Confetti\Helpers\ComponentGenerator;
    use Confetti\Helpers\Decoration;
    echo(new ComponentGenerator(
        name: 'select',
        decorations: [
            Decoration::BY_DIRECTORY->comment('List all files by the directory'),
            Decoration::DEFAULT->comment('Before saving this will be the default file. When byDirectory is provided, the file must be in the directory.'),
            Decoration::LABEL->comment('Label is used as a field title in the admin panel'),
        ],
        phpClass: file_get_contents(repositoryPath() . '/structure/select_component.class.php'),
    ))->toJson();
@endphp
