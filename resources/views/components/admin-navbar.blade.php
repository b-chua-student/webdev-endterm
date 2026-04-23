<nav class="d-flex flex-column" style="width: 260px; min-height: 100vh; background-color: #7d0a0a;">
    <div class="p-4">
        <img src="{{ asset('img/bethebeau-horizontal.png') }}" alt="Logo" class="w-100">
    </div>
    <div class="d-flex flex-column p-3 gap-1">
        <a href="{{ route('admin.dashboard.index') }}" class="admin-nav-link">
            <i class="bi bi-tags me-2"></i> Dashboard
        </a>
        <a href="{{ route('test-admin-user') }}" class="admin-nav-link">
            <i class="bi bi-people me-2"></i> User Management
        </a>
        <a href="{{ route('test-admin-product') }}" class="admin-nav-link">
            <i class="bi bi-box me-2"></i> Product Management
        </a>
        <a href="{{ route('test-admin-order') }}" class="admin-nav-link">
            <i class="bi bi-receipt me-2"></i> Order Management
        </a>
    </div>
</nav>

<style>
    .admin-nav-link {
        color: rgba(255,255,255,0.8);
        text-decoration: none;
        padding: 10px 16px;
        border-radius: 8px;
        font-size: 0.9rem;
        transition: background-color 0.2s ease, color 0.2s ease, padding-left 0.2s ease;
    }
    .admin-nav-link:hover {
        background-color: rgba(255,255,255,0.15);
        color: white;
        padding-left: 22px;
    }
    .admin-nav-link.active {
        background-color: rgba(255,255,255,0.2);
        color: white;
        font-weight: 600;
    }
</style>
