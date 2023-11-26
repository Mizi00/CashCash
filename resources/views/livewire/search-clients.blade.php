<div>
    <div class="table-search">
        <label>Search:<input type="number" min="1" wire:model.live="search" aria-controls="table"></label>
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
            @forelse($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>Chief Executive Officer (CEO)</td>
                    <td>Tokyo</td>
                    <td>33</td>
                    <td>2009/10/09</td>
                    <td>$1,200,000</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No clients found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $clients->links('pagination.default') }}
</div>