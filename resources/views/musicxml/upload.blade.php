<x-layout>

<div class="container">
    <h1>Upload MusicXML</h1>
    <form action="{{ route('musicxml.analyze') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="musicxml" class="form-control my-3" accept=".xml,.musicxml" required>
        <button type="submit" class="btn btn-girly">Analyze</button>
    </form>
</div>
</x-layout>