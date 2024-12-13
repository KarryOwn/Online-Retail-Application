@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Welcome, Admin!</h1>
    <p>Here is an overview of the site's activity:</p>
    <div class="stats-grid">
        <div class="stat-card">
            <h2>Products</h2>
            <p>Total: {{ $productCount }}</p>
        </div>
        <div class="stat-card">
            <h2>Orders</h2>
            <p>Pending: {{ $pendingOrders }}</p>
        </div>
        <div class="stat-card">
            <h2>Users</h2>
            <p>Registered: {{ $userCount }}</p>
        </div>
    </div>
@endsection
