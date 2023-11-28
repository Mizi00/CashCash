<div>
    <div class="table-search">
        <label>Search:<input type="number" min="1" wire:model.live="search" aria-controls="table"></label>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Social Reason</th>
                <th>SIREN Number</th>
                <th>APE Code</th>
                <th>Phone Number</th>
                <!-- <th>Fax Number</th> -->
                <th>Address</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->socialReason }}</td>
                    <td>{{ $client->sirenNum }}</td>
                    <td>{{ $client->apeCode }}</td>
                    <td>{{ $client->phoneNumber }}</td>
                    <!--<td>{{ $client->faxNum }}</td>-->
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->mailAddress }}</td>
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