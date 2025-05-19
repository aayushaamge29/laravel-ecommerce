<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | My E-Commerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: #fff;
        }
        .sidebar a {
            color: #ccc;
            display: block;
            padding: 15px 20px;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #495057;
            color: #fff;
        }
        .content {
            padding: 30px;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2 sidebar d-flex flex-column p-0">
            <h4 class="text-center py-4 border-bottom">Admin Panel</h4>
            <a href="{{ url('/dashboard') }}" class="active"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
            <a href="{{ url('/products') }}"><i class="bi bi-box-seam me-2"></i>Products</a>
            <a href="#"><i class="bi bi-cart-check me-2"></i>Orders</a>
            <a href="#"><i class="bi bi-people me-2"></i>Users</a>
            <a href="#"><i class="bi bi-gear me-2"></i>Settings</a>
            <a href="{{ route('logout') }}"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 content">
            <h2>Welcome, Admin 👋</h2>
            <p class="text-muted">Here is a quick summary of your store:</p>

            <div class="row g-4 mt-4">
                <div class="col-md-3">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <h5 class="card-title">Products</h5>
                            <p class="card-text fs-4">{{ $productCount ?? 0 }}</p>
                            <i class="bi bi-box-seam fs-2"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Orders</h5>
                            <p class="card-text fs-4">{{ $orderCount ?? 0 }}</p>
                            <i class="bi bi-cart-check fs-2"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-white bg-warning">
                        <div class="card-body">
                            <h5 class="card-title">Users</h5>
                            <p class="card-text fs-4">{{ $userCount ?? 0 }}</p>
                            <i class="bi bi-people fs-2"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            <h5 class="card-title">Revenue</h5>
                            <p class="card-text fs-4">₹{{ $revenue ?? '0.00' }}</p>
                            <i class="bi bi-currency-rupee fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Orders Table -->
            <div class="mt-5">
                <h4>Recent Orders</h4>
                <table class="table table-striped table-hover mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>#Order ID</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($orders) && count($orders))
                            @foreach($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->customer_name }}</td>
                                    <td>₹{{ $order->total }}</td>
                                    <td><span class="badge bg-success">{{ $order->status }}</span></td>
                                    <td>{{ $order->created_at->format('d M Y') }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center text-muted">No recent orders.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
