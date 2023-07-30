<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Fortune Telling</title>
</head>
<body>
<h1>おみくじ</h1>
<p>
    あなたの運勢は{{ $fortune }}です!!
</p>
<hr>
<p>
    <a href="{{route('fortune.index')}}">戻る</a>
</p>
</body>
</html>
