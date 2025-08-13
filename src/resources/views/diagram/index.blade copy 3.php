<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>3D UML Class Diagram</title>
    <style>
        body { margin: 0; }
        #3d-graph { width: 100vw; height: 100vh; }
    </style>

    <!-- 3D Force Graph JS -->
    <script src="https://unpkg.com/3d-force-graph"></script>
</head>
<body>
<div id="3d-graph"></div>

<script>
const data = {
    nodes: [
        { id: 'Animal', group: 1 },
        { id: 'Duck', group: 2 },
        { id: 'Fish', group: 2 },
        { id: 'Zebra', group: 2 }
    ],
    links: [
        { source: 'Animal', target: 'Duck', label: 'inherits' },
        { source: 'Animal', target: 'Fish', label: 'inherits' },
        { source: 'Animal', target: 'Zebra', label: 'inherits' },
        { source: 'Duck', target: 'Fish', label: 'preys on' },
        { source: 'Fish', target: 'Zebra', label: 'coexists with' },
        { source: 'Zebra', target: 'Animal', label: 'related to' }
    ]
};

const Graph = ForceGraph3D()(document.getElementById('3d-graph'))
    .graphData(data)
    .nodeLabel(node => node.id)
    .nodeAutoColorBy('group')
    .linkLabel(link => link.label)
    .linkWidth(2)
    .linkDirectionalArrowLength(3)
    .linkDirectionalArrowRelPos(1);
</script>

</body>
</html>
