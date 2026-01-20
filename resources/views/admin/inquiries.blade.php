<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sinolink Admin | Inquiries</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; margin: 0; padding: 40px; }
        .admin-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .admin-card { background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); overflow: hidden; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #E1061B; color: white; padding: 15px; text-align: left; }
        td { padding: 15px; border-bottom: 1px solid #eee; color: #333; }
        tr:hover { background-color: #f9f9f9; }
        .badge { background: #ffebeb; color: #E1061B; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; }
        .whatsapp-link { color: #25D366; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

    <div class="admin-header">
        <h1>Inquiry Dashboard</h1>
        <a href="{{ route('admin.inquiries.export') }}" 
       style="background: #333; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 14px;">
       📥 Download CSV (Excel)
    </a>
        <p>Total Leads: <strong>{{ $inquiries->count() }}</strong></p>
    </div>

    <div class="admin-card">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>Vehicle Type</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inquiries as $inquiry)
                <tr>
                    <td>{{ $inquiry->created_at }}</td>
                    <td><strong>{{ $inquiry->name }}</strong></td>
                    <td>{{ $inquiry->email }}</td>
                    <td>{{ $inquiry->phone }}</td>
                    <td>{{ $inquiry->country }}</td>
                    <td><span class="badge">{{ $inquiry->vehicle_type }}</span></td>
                    <td>{{ $inquiry->message }}</td>
                    <td>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inquiry->phone) }}" 
                           class="whatsapp-link" target="_blank">WhatsApp</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>