@if($record->file_path)
    <iframe src="{{ asset('storage/' . $record->file_path) }}" width="100%" height="600px"></iframe>
@else
    <p>PDF file not found.</p>
@endif
