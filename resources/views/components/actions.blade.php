<td>
    <div class="d-flex justify-content-center">
        @if ($delete)
            <a type="button" class="text-danger  fa-lg me-2 ms-2" wire:click='delete({{ $id }})'
                title="Delete">
                <i class="fas fa-trash-can"></i>
            </a>
        @endif

        @if ($edit)
            <a type="button" data-mdb-toggle="modal" data-mdb-target="#user-modal"
                class="text-dark fa-lg me-2 ms-2 editButton" href="#user-modal"
                wire:click="openModal({{ $id }})" title="Edit">
                <i class="far fa-pen-to-square"></i>
            </a>
        @endif

        @if ($show)
            <a type="button" class="text-primary  fa-lg me-2 ms-2"
                href="{{ route('admin.panel.viewer', ['user' => $id]) }}" title="Show">
                <i class="fas fa-eye"></i>
            </a>
        @endif

    </div>
</td>
