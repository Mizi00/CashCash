<div>
    <div class="table-search">
        <label>Search:<input type="date" wire:model.live="searchDate" aria-controls="table"><input type="number" placeholder="Registration number" wire:model.live="searchTech" aria-controls="table"></label>
    </div>
    <table>
        <thead>
            <tr>
                <th>Visit date</th>
                <th>Client</th>
                <th>Technician</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>                
        <tbody>
            @forelse($interventions as $intervention)
                <tr>
                    <td>{{ Carbon\Carbon::parse($intervention->dateTimeVisit)->isoFormat('MMM D, YYYY HH[:]mm A') }}</td>
                    <td>{{ $intervention->client->socialReason }}</td>
                    <td>{{ optional($intervention->technician)->id ?? 'N/A' }}</td>
                    <td>2009/10/09</td>
                    <td>$1,200,000</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No interventions found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $interventions->links('livewire.pagination') }}
</div>