<div>
    <div class="table-search">
        <label>Search:<input type="date" wire:model.live="searchDate" aria-controls="table"></label>
    </div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>                
        <tbody>
            @forelse($interventions as $intervention)
                <tr>
                    <td>{{ Carbon\Carbon::parse($intervention->dateTimeVisit)->format('d/m/Y H:i') }}</td>
                    <td>Chief Executive Officer (CEO)</td>
                    <td>Tokyo</td>
                    <td>33</td>
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
    {{ $interventions->links('pagination.default') }}
</div>