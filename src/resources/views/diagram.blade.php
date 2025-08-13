<!DOCTYPE html>
<html>
<head>
    <title>Class Diagram</title>
</head>
<body  class="bg-[#FDFDFC] dark:bg-[#fff] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <h1>Class Diagram (UML)</h1>

    <iframe 
        src="https://www.plantuml.com/plantuml/svg/{{ urlencode($uml) }}" 
        width="100%" height="600px" frameborder="0">
    </iframe>

    <pre>{{ $uml }}</pre>
</body>
</html>
