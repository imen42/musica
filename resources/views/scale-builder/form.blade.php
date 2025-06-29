<x-layout>
    <div class="container mt-5">
        <h1>🎼 Scale Builder</h1>
        <form action="{{ route('scale.builder.generate') }}" method="POST">
            @csrf
    
            <div class="mb-3">
                <label for="root" class="form-label">Root Note</label>
                <select name="root" id="root" class="form-select" required>
                    @foreach ($allNotes as $note)
                        <option value="{{ $note }}">{{ $note }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-3">
                <label for="scale_type" class="form-label">Scale Type</label>
                <select name="scale_type" id="scale_type" class="form-select" required>
                    @foreach ($scaleTypes as $type)
                        <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                    @endforeach
                </select>
            </div>
    
            <button type="submit" class="btn btn-success">Generate Scale</button>
        </form>
    </div>
    </x-layout>
    