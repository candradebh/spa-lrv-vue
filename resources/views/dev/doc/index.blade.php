<html>
<head>

</head>
<body>
<h3>Name: {{ $config['app']['name'] }} </h3>

    <ul>
                <li>URL: {{$config['app']['url']}} </li>
                <li>TIMEZONE: {{$config['app']['timezone']}} </li>
                <li>LOCALE: {{$config['app']['locale']}} </li>
                <li>DEBUG{{$config['app']['debug']}} </li>
    </ul>

<h3>Providers</h3>
<ul>
    @foreach($config['app']['providers'] as $provider)
        <li>{{$provider}}</li>
    @endforeach
</ul>

<h3>Aliases</h3>
<table>
    @foreach($config['app']['aliases'] as $name=>$aliase)
        <tr>
            <td>{{$name}}</td>
            <td>{{$aliase}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>