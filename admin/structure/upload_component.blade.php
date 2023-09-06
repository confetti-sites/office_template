@php
    use Confetti\Helpers\ComponentGenerator;
    use Confetti\Helpers\Decoration;
    echo(new ComponentGenerator(
        name: 'upload',
        decorations: [
            Decoration::LABEL->comment('Label is used as a field title in the admin panel'),
            Decoration::HEIGHT->comment('Height of the image'),
            Decoration::WIDTH->comment('Width of the image'),
        ],
        phpClass: file_get_contents(repositoryPath() . '/admin/structure/upload_component.class.php'),
    ))->toJson();
@endphp

