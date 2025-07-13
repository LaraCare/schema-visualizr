<!DOCTYPE html>
<html>
<head>
    <title>Class Diagram</title>
</head>
<body>
    <h1>Class Diagram (UML)</h1>

    <iframe 
        src="https://www.plantuml.com/plantuml/svg/{{ urlencode($uml) }}" 
        width="100%" height="600px" frameborder="0">
    </iframe>

    <pre>{{ $uml }}</pre>
</body>
</html>
