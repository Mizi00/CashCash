<div>
    <div class="table-search spaced">
        <label>Show <select wire:model.live="perPage" name="" id=""><option value="10">10</option><option value="25">25</option><option value="50">50</option></select> entries</label>
        <label>Search:<input type="date" wire:model.live="searchDate" aria-controls="table"><input type="number" placeholder="Registration number" wire:model.live="searchTech" aria-controls="table"></label>
    </div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Visit date</th>
                <th>Client</th>
                <th>Technician</th>
                <th>Materials</th>
                <th>Status</th>                
                <th></th>
            </tr>
        </thead>                
        <tbody>
            @forelse($interventions as $intervention)
                <tr>
                    <td>{{ $intervention->id }}</td>
                    <td>{{ Carbon\Carbon::parse($intervention->dateTimeVisit)->isoFormat('MMM D, YYYY HH[:]mm A') }}</td>
                    <td>{{ $intervention->client->socialReason }}</td>
                    <td>{{ optional($intervention->technician)->id ?? 'N/A' }}</td>
                    <td>{{ $intervention->number_of_materials }}</td>
                    <td><span class="badge {{ is_null($intervention->technician) ? 'red' : ($intervention->isCompleted() ? 'green' : 'orange') }}">{{ is_null($intervention->technician) ? 'Unassigned' : ($intervention->isCompleted() ? 'Completed' : 'In progress') }}</span></td>                    
                    <td><div class="table-actions"><a href="{{ route('interventions.show', $intervention->id) }}"><i class="fa-regular fa-eye"></i></a><a href="{{ route('interventions.edit', $intervention->id) }}"><i class="fa-regular fa-pen-to-square"></i></a></div></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No interventions found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $interventions->links('livewire.pagination') }}
</div>