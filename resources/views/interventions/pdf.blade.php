<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intervention sheet #{{ $intervention->id }}</title>
</head>
<body>
    <h1>Intervention sheet #{{ $intervention->id }}</h1>
    <hr>
    <p><strong>Client:</strong> {{ $intervention->client->socialReason }}, {{ $intervention->client->address }}</p>
    <p><strong>Visit date:</strong> {{ \Carbon\Carbon::parse($intervention->dateTimeVisit)->isoFormat('MMM D, YYYY HH[:]mm A') }}</p>
    <p><strong>Technician:</strong> {!! $intervention->technician === null ? '<span style="color: red;">No technician assigned</span>' : $intervention->technician->employee->firstName . ' ' . $intervention->technician->employee->lastName . ' #' . $intervention->technician->id !!}</p>

    <h2>Materials</h2>
    @forelse($intervention->materials as $material)
        <p><strong>ID:</strong> {{ $material->id }}</p>
        <p><strong>Label:</strong> {{ $material->materialtype->label }}</p>
        <p><strong>Installation date:</strong> {{ \Carbon\Carbon::parse($material->installationDate)->isoFormat('MMM D, YYYY') }}</p>
        <p><strong>Passing time:</strong> {{ $material->pivot->passingTime ?? '-' }}</p>
        <p><strong>Comment works:</strong> {{ $material->pivot->commentWorks ?? '-' }}</p>
        <hr>
    @empty
        <p>No materials for this intervention</p>
    @endforelse
    <h4 style="text-align: right;">Creation date: {{ \Carbon\Carbon::parse(Carbon\Carbon::now())->isoFormat('MMM D, YYYY HH[:]mm A') }}</h4>
</body>
</html>