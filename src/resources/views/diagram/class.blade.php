<!DOCTYPE html>
<html lang="en" class="__variable_e66fe9 __variable_829c8b">

<head>
  <meta charSet="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="preload" href="{{ asset('vendor/lara-care/schema-visualizr/media/162bf645eb375add-s.p.ttf') }}" as="font" crossorigin type="font/ttf" />
  <link rel="preload" href="{{ asset('vendor/lara-care/schema-visualizr/media/c9a5bc6a7c948fb0-s.p.woff2') }}" as="font" crossorigin
    type="font/woff2" />
  <link rel="stylesheet" href="{{ asset('vendor/lara-care/schema-visualizr/css/visualizr.css') }}" crossorigin data-precedence="next" />
  <link rel="preload" href="{{ asset('vendor/lara-care/schema-visualizr/js/webpack-b5efe19e8ee15463.js') }}" as="script" fetchPriority="low"
    crossorigin />
  <script src="{{ asset('vendor/lara-care/schema-visualizr/js/f42e5159-56eb28c3a582d27e.js') }}" async crossorigin></script>
  <script src="{{ asset('vendor/lara-care/schema-visualizr/js/83-9a28d55a570b8009.js') }}" async crossorigin></script>
  <script src="{{ asset('vendor/lara-care/schema-visualizr/js/main-app-9224f8e6676d9871.js') }}" async crossorigin></script>
  <script src="{{ asset('vendor/lara-care/schema-visualizr/js/beam.min.js') }}" data-token="e08d63f1-631b-4eeb-89b3-7799fedde74f"
    async></script>
  <title>Schema-visualizr</title>
  <meta name="description" content="Co-founder of unkey.dev and founder of planetfall.io" />
  <meta name="robots" content="index, follow" />
  <meta name="googlebot" content="index, follow, max-video-preview:-1, max-image-preview:large, max-snippet:-1" />
  <meta property="og:title" content="Schema-visualizr" />
  <meta property="og:description" content="Co-founder of unkey.dev and founder of planetfall.io" />
  <meta property="og:url" content="https://Schema-visualizr" />
  <meta property="og:site_name" content="Schema-visualizr" />
  <meta property="og:locale" content="en-US" />
  <meta property="og:image" content="https://Schema-visualizr/og.png" />
  <meta property="og:image:width" content="1920" />
  <meta property="og:image:height" content="1080" />
  <meta property="og:type" content="website" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Chronark" />
  <meta name="twitter:description" content="Co-founder of unkey.dev and founder of planetfall.io" />
  <meta name="twitter:image" content="https://Schema-visualizr/og.png" />
  <meta name="twitter:image:width" content="1920" />
  <meta name="twitter:image:height" content="1080" />
  <link rel="shortcut icon" href="/favicon.png" />
  <meta name="next-size-adjust" />
</head>


<body class="bg-black undefined">
    <div class="from-zinc-900/0 via-zinc-900 to-zinc-900/0"
        style="
                background-color: #2d2d31;
                opacity: 0.8;
                background-image:  radial-gradient(#ffffff 0.5px, transparent 0.5px), radial-gradient(#ffffff 0.5px, #2d2d31 0.5px);
                background-size: 20px 20px;
                background-position: 0 0,10px 10px;
            ">
        <header>
            <div
                class="fixed inset-x-0 top-0 z-50 backdrop-blur  duration-200 border-b  bg-zinc-900/0 border-transparent">
                <div class="container flex flex-row-reverse items-center justify-between p-6 mx-auto">
                    <div class="flex justify-between gap-8"><a class="duration-200 text-zinc-400 hover:text-zinc-100"
                            href="/svr/diagrams">Diagrams</a><a class="duration-200 text-zinc-400 hover:text-zinc-100"
                            href="#">Contact</a></div>
                            <a class="duration-200 text-zinc-300 hover:text-zinc-100"
                        href="javascript:history.back()"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-6 h-6 ">
                            <path d="m12 19-7-7 7-7"></path>
                            <path d="M19 12H5"></path>
                        </svg></a>
                </div>
            </div>
        </header>
        
        <div class=" container flex items-center justify-center min-h-screen  mx-auto"
            >
            <div class="mermaid" id="class-diagram">
                {{$uml}}
            </div>
            <script type="module">
              import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@11/dist/mermaid.esm.min.mjs';
              mermaid.initialize({ startOnLoad: true });
            </script>
        </div>
          <!-- Mermaid + Panzoom -->
          <script src="{{ asset('vendor/lara-care/schema-visualizr/js/panzon.min.js') }}"></script>
          <script src="https://unpkg.com/@panzoom/panzoom@4.6.0/dist/panzoom.min.js"></script>
          <script>
            const elem = document.getElementById('class-diagram')
            const panzoom = Panzoom(elem, {
            maxScale: 5
            })
            panzoom.pan(10, 10)
            panzoom.zoom(2, { animate: true })

            // Panning and pinch zooming are bound automatically (unless disablePan is true).
            // There are several available methods for zooming
            // that can be bound on button clicks or mousewheel.
            button.addEventListener('click', panzoom.zoomIn)
            elem.parentElement.addEventListener('wheel', panzoom.zoomWithWheel)
          </script>
    </div>
</body>

</html> 