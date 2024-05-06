<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Date d'embauche</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($technicians as $technician)
                <tr>
                    <td>{{ $technician->id }}</td>
                    <td>{{ $technician->employee->firstName }}</td>
                    <td>{{ $technician->employee->lastName }}</td>
                    <td>{{ $technician->employee->mailAddress }}</td>
                    <td>{{ $technician->employee->hireDate }}</td>
                    <td><div class="table-actions"><a href="{{ route('chieftechnicians.show', $technician->id) }}"><i class="fa-regular fa-eye"></i></a><a href="{{ route('chieftechnicians.edit', $technician->id) }}"><i class="fa-regular fa-pen-to-square"></i></a></div></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No technicians found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $technicians->links('livewire.pagination') }}
</div>