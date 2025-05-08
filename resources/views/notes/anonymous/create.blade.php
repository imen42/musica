<x-layout>
    <div class="container mt-5">
        <h2>Create Anonymous Note</h2>

        <form action="{{ route('notes.anonymous.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="note" class="form-label">Your Note</label>
                <textarea class="form-control" name="note" id="note" rows="6" required></textarea>
            </div>
<p class="text-muted">Note: Your note will be available only for a limited time (30 minutes) and cannot be saved.</p>

 <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITEKEY') }}"></div>
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}

            <button type="submit" class="btn btn-primary mt-3">Generate Link</button>
        </form>
    </div>
</x-layout>
