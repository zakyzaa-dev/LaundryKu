@props(['token'])
<div class="d-flex mt-3 justify-content-between bg-light align-items-center p-3 rounded shadow-sm border">
    <span class="text-muted small fw-bold">TOKEN RESI</span>

    <div class="d-flex gap-2 align-items-center">
        <i class="bi bi-copy"></i>
        <span class="text-white fw-bold badge bg-dark fs-6 font-monospace px-3 py-2">{{ $token }}</span>
    </div>
</div>
