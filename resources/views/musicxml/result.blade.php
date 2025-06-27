<x-layout>
    <div class="container mt-5">
        <h1>MusicXML Analysis Result</h1>
    
        <ul class="list-group my-4">
            <li class="list-group-item"><strong>Title:</strong> {{ $title }}</li>
            <li class="list-group-item"><strong>Key Signature (Fifths):</strong> {{ $key }}</li>
            <li class="list-group-item"><strong>Tempo:</strong> {{ $tempo }}</li>
            <li class="list-group-item"><strong>Number of Notes:</strong> {{ $noteCount }}</li>
        </ul>
    

    </div>
    
    <script src="https://unpkg.com/opensheetmusicdisplay/build/opensheetmusicdisplay.min.js"></script>
    <script>
        const osmd = new opensheetmusicdisplay.OpenSheetMusicDisplay("osmdContainer");
        fetch("{{ asset('storage/musicxml/' . $filename) }}")
            .then(response => response.text())
            .then(xml => {
                osmd.load(xml).then(() => osmd.render());
            });
    </script>
    </x-layout>
    