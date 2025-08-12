<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing History</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    <x-navbar></x-navbar>

    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mt-10">
            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800">Billing History</h2>
                <a href = "/dashboard">
                    <button class="text-gray-500 hover:text-red-500 transition duration-200">
                    ✕
                    </button>
                </a>
            </div>

            <!-- Table Container -->
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-gray-600">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-4 py-3 text-left font-medium">Date &amp; Time</th>
                            <th class="px-4 py-3 text-left font-medium">Payment Type</th>
                            <th class="px-4 py-3 text-right font-medium">Amount (PHP)</th>
                            <th class="px-4 py-3 text-right font-medium">Tax (12%)</th>
                            <th class="px-4 py-3 text-right font-medium">Total (PHP)</th>
                            <th class="px-4 py-3 text-left font-medium">Location</th>
                            <th class="px-4 py-3 text-center font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-4 py-4 whitespace-nowrap">April 8, 2025 – 4:30 PM</td>
                            <td class="px-4 py-4">Credit</td>
                            <td class="px-4 py-4 text-right">21,317.19</td>
                            <td class="px-4 py-4 text-right">2,557.81</td>
                            <td class="px-4 py-4 text-right font-semibold text-gray-800">23,875.00</td>
                            <td class="px-4 py-4">Somewhere on Earth</td>
                            <td class="px-4 py-4 text-center">
                                <span class="px-3 py-1 text-xs font-bold text-green-700 bg-green-100 rounded-full">Paid</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Mobile Card View -->
    <div class="max-w-7xl mx-auto p-6 space-y-4 lg:hidden">
        <div class="bg-white rounded-lg shadow p-4 space-y-2">
            <div class="flex justify-between text-sm text-gray-500">
                <span>April 8, 2025 – 4:30 PM</span>
                <span class="px-2 py-0.5 text-xs font-bold text-green-700 bg-green-100 rounded-full">Paid</span>
            </div>
            <div class="text-gray-800 font-medium">Credit</div>
            <div class="text-gray-600 text-sm">Location: Somewhere on Earth</div>
            <div class="flex justify-between text-sm">
                <span>Amount:</span>
                <span class="font-semibold">₱21,317.19</span>
            </div>
            <div class="flex justify-between text-sm">
                <span>Tax (12%):</span>
                <span class="font-semibold">₱2,557.81</span>
            </div>
            <div class="flex justify-between text-sm">
                <span>Total:</span>
                <span class="font-bold text-gray-800">₱23,875.00</span>
            </div>
        </div>
    </div>
</body>
</html>
