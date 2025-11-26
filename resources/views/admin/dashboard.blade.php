@extends('admin.layouts.app')

@section('title', 'Admin Dashboard - Info Konser')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
       

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Total News</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $totalNews ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center">
                    <i class="ri-newspaper-line text-2xl text-orange-600 dark:text-orange-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Published</p>
                    <p class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $publishedNews ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                    <i class="ri-checkbox-circle-line text-2xl text-green-600 dark:text-green-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Total Views</p>
                    <p class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ number_format($totalViews ?? 0) }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                    <i class="ri-eye-line text-2xl text-blue-600 dark:text-blue-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Featured</p>
                    <p class="text-3xl font-bold text-yellow-600 dark:text-yellow-400">{{ $featuredNews ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center">
                    <i class="ri-star-line text-2xl text-yellow-600 dark:text-yellow-400"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
        <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Aksi Cepat</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('admin.page-content.edit', 'welcome') }}" class="p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg hover:border-purple-500 dark:hover:border-purple-500 transition-colors group">
                <div class="flex items-center gap-3 mb-2">
                    <i class="ri-home-line text-2xl text-purple-600 dark:text-purple-400"></i>
                    <h4 class="font-semibold text-gray-900 dark:text-gray-100">Edit Halaman Welcome</h4>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400">Kelola konten halaman utama</p>
            </a>

            <a href="{{ route('admin.page-content.edit', 'pembelian-tiket') }}" class="p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg hover:border-purple-500 dark:hover:border-purple-500 transition-colors group">
                <div class="flex items-center gap-3 mb-2">
                    <i class="ri-ticket-line text-2xl text-pink-600 dark:text-pink-400"></i>
                    <h4 class="font-semibold text-gray-900 dark:text-gray-100">Edit Halaman Pembelian</h4>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400">Kelola konten halaman pembelian tiket</p>
            </a>

            <a href="{{ route('admin.page-content.edit', 'konfirmasi-pembayaran') }}" class="p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg hover:border-purple-500 dark:hover:border-purple-500 transition-colors group">
                <div class="flex items-center gap-3 mb-2">
                    <i class="ri-bank-card-line text-2xl text-indigo-600 dark:text-indigo-400"></i>
                    <h4 class="font-semibold text-gray-900 dark:text-gray-100">Edit Halaman Konfirmasi</h4>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400">Kelola konten halaman konfirmasi pembayaran</p>
            </a>

            <a href="{{ route('admin.news.index') }}" class="p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg hover:border-orange-500 dark:hover:border-orange-500 transition-colors group">
                <div class="flex items-center gap-3 mb-2">
                    <i class="ri-newspaper-line text-2xl text-orange-600 dark:text-orange-400"></i>
                    <h4 class="font-semibold text-gray-900 dark:text-gray-100">Kelola News</h4>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400">Kelola berita dan artikel</p>
            </a>

            <a href="{{ route('admin.events.index') }}" class="p-4 border-2 border-gray-200 dark:border-gray-700 rounded-lg hover:border-purple-500 dark:hover:border-purple-500 transition-colors group">
                <div class="flex items-center gap-3 mb-2">
                    <i class="ri-calendar-event-line text-2xl text-purple-600 dark:text-purple-400"></i>
                    <h4 class="font-semibold text-gray-900 dark:text-gray-100">Kelola Events</h4>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400">Kelola event konser</p>
            </a>
        </div>
    </div>

    <!-- News Statistics Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Views Trend Chart -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
            <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Trend Viewer News (30 Hari Terakhir)</h3>
            <div class="h-80">
                <canvas id="viewsTrendChart"></canvas>
            </div>
        </div>

        <!-- News by Category Chart -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
            <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">News Berdasarkan Kategori</h3>
            <div class="h-80">
                <canvas id="categoryChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Top Viewed News -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
        <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Top 5 News Paling Banyak Dilihat</h3>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Judul</th>
                        <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Tanggal Publikasi</th>
                        <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Views</th>
                        <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($topViewedNews ?? [] as $news)
                        <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                            <td class="py-3 px-4">
                                <span class="font-medium text-gray-900 dark:text-gray-100">{{ $news->title }}</span>
                            </td>
                            <td class="py-3 px-4 text-gray-600 dark:text-gray-400">
                                {{ $news->published_date->format('d M Y') }}
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-400 rounded-full text-xs font-semibold">
                                    {{ number_format($news->views) }} views
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <a href="{{ route('admin.news.edit', $news->id) }}" class="text-orange-600 dark:text-orange-400 hover:text-orange-700 dark:hover:text-orange-300 transition-colors">
                                    <i class="ri-edit-line"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-8 text-center text-gray-500 dark:text-gray-400">
                                Belum ada news yang dipublikasikan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pages List -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
        <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Daftar Halaman</h3>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Nama Halaman</th>
                        <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Judul</th>
                        <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Status</th>
                        <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pages as $page)
                        <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                            <td class="py-3 px-4">
                                <span class="font-medium text-gray-900 dark:text-gray-100">{{ ucfirst(str_replace('-', ' ', $page->page_name)) }}</span>
                            </td>
                            <td class="py-3 px-4 text-gray-600 dark:text-gray-400">
                                {{ $page->title ?? '-' }}
                            </td>
                            <td class="py-3 px-4">
                                @if($page->content)
                                    <span class="px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 rounded-full text-xs font-semibold">
                                        Terkelola
                                    </span>
                                @else
                                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-400 rounded-full text-xs font-semibold">
                                        Belum Dikelola
                                    </span>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                <a href="{{ route('admin.page-content.edit', $page->page_name) }}" class="text-purple-600 dark:text-purple-400 hover:text-purple-700 dark:hover:text-purple-300 transition-colors">
                                    <i class="ri-edit-line"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-8 text-center text-gray-500 dark:text-gray-400">
                                Belum ada halaman yang dikelola
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Show welcome toast
    if (typeof showToast === 'function') {
        showToast('Selamat datang, Super Admin!', 'success');
    }
    
    console.log('DOM loaded, initializing charts...');
    
    // Check if Chart.js is loaded
    if (typeof Chart === 'undefined') {
        console.error('Chart.js is not loaded! Please check the CDN link.');
        document.getElementById('viewsTrendChart')?.parentElement?.insertAdjacentHTML('beforeend', '<p class="text-red-500">Error: Chart.js library tidak dapat dimuat. Silakan refresh halaman.</p>');
        document.getElementById('categoryChart')?.parentElement?.insertAdjacentHTML('beforeend', '<p class="text-red-500">Error: Chart.js library tidak dapat dimuat. Silakan refresh halaman.</p>');
        return;
    }
    
    console.log('Chart.js version:', Chart.version);
    
    // Helper function to get text color based on theme
    function getTextColor() {
        if (document.documentElement.classList.contains('dark')) {
            return '#f3f4f6';
        }
        return '#1f2937';
    }
    
    function getGridColor() {
        if (document.documentElement.classList.contains('dark')) {
            return 'rgba(255, 255, 255, 0.1)';
        }
        return 'rgba(0, 0, 0, 0.1)';
    }
    
    function getTickColor() {
        if (document.documentElement.classList.contains('dark')) {
            return '#9ca3af';
        }
        return '#6b7280';
    }
    
    // Views Trend Chart
    const viewsTrendCtx = document.getElementById('viewsTrendChart');
    if (viewsTrendCtx) {
        console.log('Initializing Views Trend Chart...');
        const viewsTrendData = @json($viewsTrend ?? []);
        console.log('Views Trend Data:', viewsTrendData);
            
            // If no data, show empty chart
            if (viewsTrendData.length === 0) {
                new Chart(viewsTrendCtx, {
                    type: 'line',
                    data: {
                        labels: [],
                        datasets: []
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });
            } else {
                const labels = viewsTrendData.map(item => {
                    const date = new Date(item.date);
                    return date.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' });
                });
                const viewsData = viewsTrendData.map(item => parseInt(item.total_views) || 0);
                const newsCountData = viewsTrendData.map(item => parseInt(item.news_count) || 0);

                new Chart(viewsTrendCtx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Total Views',
                                data: viewsData,
                                borderColor: 'rgb(251, 146, 60)',
                                backgroundColor: 'rgba(251, 146, 60, 0.1)',
                                tension: 0.4,
                                fill: true,
                                yAxisID: 'y',
                            },
                            {
                                label: 'Jumlah News',
                                data: newsCountData,
                                borderColor: 'rgb(147, 51, 234)',
                                backgroundColor: 'rgba(147, 51, 234, 0.1)',
                                tension: 0.4,
                                fill: true,
                                yAxisID: 'y1',
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: {
                            mode: 'index',
                            intersect: false,
                        },
                        plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: getTextColor()
                        }
                    },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                            }
                        },
                        scales: {
                            x: {
                                display: true,
                        grid: {
                            color: getGridColor()
                        },
                        ticks: {
                            color: getTickColor()
                        }
                            },
                            y: {
                                type: 'linear',
                                display: true,
                                position: 'left',
                                title: {
                                    display: true,
                                    text: 'Total Views',
                                    color: getTextColor()
                                },
                        grid: {
                            color: getGridColor()
                        },
                        ticks: {
                            color: getTickColor()
                        }
                            },
                            y1: {
                                type: 'linear',
                                display: true,
                                position: 'right',
                                title: {
                                    display: true,
                                    text: 'Jumlah News',
                                    color: getTextColor()
                                },
                                grid: {
                                    drawOnChartArea: false,
                                },
                                ticks: {
                                    color: window.matchMedia('(prefers-color-scheme: dark)').matches ? '#9ca3af' : '#6b7280'
                                }
                            }
                    }
                }
            });
            console.log('Views Trend Chart initialized successfully');
        }
    } else {
        console.error('Views Trend Chart canvas not found!');
    }

    // Category Chart
    const categoryCtx = document.getElementById('categoryChart');
    if (categoryCtx) {
        console.log('Initializing Category Chart...');
        const categoryData = @json($newsByCategory ?? []);
        console.log('Category Data:', categoryData);
        
        // If no data, show empty chart
        if (categoryData.length === 0) {
            console.log('No category data, showing empty chart');
            new Chart(categoryCtx, {
                type: 'doughnut',
                data: {
                    labels: [],
                    datasets: []
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        } else {
            const labels = categoryData.map(item => item.category);
            const data = categoryData.map(item => parseInt(item.count));
            
            console.log('Category labels:', labels);
            console.log('Category data:', data);
            
            // Color palette
            const colors = [
                'rgba(251, 146, 60, 0.8)',  // Orange
                'rgba(147, 51, 234, 0.8)',  // Purple
                'rgba(236, 72, 153, 0.8)',  // Pink
                'rgba(59, 130, 246, 0.8)',  // Blue
                'rgba(34, 197, 94, 0.8)',   // Green
                'rgba(234, 179, 8, 0.8)',   // Yellow
                'rgba(239, 68, 68, 0.8)',   // Red
            ];
            const borderColors = [
                'rgb(251, 146, 60)',
                'rgb(147, 51, 234)',
                'rgb(236, 72, 153)',
                'rgb(59, 130, 246)',
                'rgb(34, 197, 94)',
                'rgb(234, 179, 8)',
                'rgb(239, 68, 68)',
            ];

            new Chart(categoryCtx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah News',
                        data: data,
                        backgroundColor: colors.slice(0, labels.length),
                        borderColor: borderColors.slice(0, labels.length),
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: getTextColor(),
                                padding: 15,
                                font: {
                                    size: 12
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += context.parsed + ' news';
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
            console.log('Category Chart initialized successfully');
        }
    } else {
        console.error('Category Chart canvas not found!');
    }
    
    console.log('All charts initialization completed');
});
</script>
@endpush
@endsection


