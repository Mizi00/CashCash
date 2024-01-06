<div>
    <div class="table-search spaced">
        <label>Show <select wire:model.live="perPage" name="" id=""><option value="10">10</option><option value="25">25</option><option value="50">50</option></select> entries</label>
        <label>Search:<input type="number" min="1" wire:model.live="search" aria-controls="table"></label>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Social Reason</th>
                <th>SIREN Number</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->socialReason }}</td>
                    <td>{{ trim(chunk_split($client->sirenNum, 3, ' '), ' ') }}</td>
                    <td>{{ trim(chunk_split($client->phoneNumber, 2, ' '), ' ') }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->mailAddress }}</td>
                    <td><div class="table-actions"><a href="{{ route('clients.show', $client->id) }}"><i class="fa-regular fa-eye"></i></a><a href="{{ route('clients.edit', $client->id) }}"><i class="fa-regular fa-pen-to-square"></i></a></div></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No clients found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $clients->links('livewire.pagination') }}
</div>