<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($questions as $question)
    <div>
        {{ $question->content }}
    </div>
    <div>
        {{ $question->A }}
    </div>
    <div>
        {{ $question->B }}
    </div>
    <div>
        {{ $question->C }}
    </div>
    <div>
        {{ $question->D }}
    </div>
    <div>
        {{ $question->ans }}
    </div>
    <hr>
    @endforeach
</body>
</html>