<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pages = PageContent::all();
        $pageCount = $pages->count();
        
        // News Statistics
        $totalNews = News::count();
        $publishedNews = News::where('is_published', true)->count();
        $draftNews = News::where('is_published', false)->count();
        $totalViews = News::sum('views');
        $featuredNews = News::where('is_featured', true)->count();
        
        // News views by date (last 7 days)
        $viewsByDate = News::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(views) as total_views')
        )
        ->where('created_at', '>=', now()->subDays(7))
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get();
        
        // News by category
        $newsByCategory = News::select('category', DB::raw('count(*) as count'))
            ->groupBy('category')
            ->get();
        
        // Top 5 most viewed news
        $topViewedNews = News::where('is_published', true)
            ->orderBy('views', 'desc')
            ->take(5)
            ->get(['id', 'title', 'views', 'published_date']);
        
        // Views trend (last 30 days)
        $viewsTrend = News::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(views) as total_views'),
            DB::raw('COUNT(*) as news_count')
        )
        ->where('created_at', '>=', now()->subDays(30))
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get();
        
        return view('admin.dashboard', compact(
            'pages', 
            'pageCount',
            'totalNews',
            'publishedNews',
            'draftNews',
            'totalViews',
            'featuredNews',
            'viewsByDate',
            'newsByCategory',
            'topViewedNews',
            'viewsTrend'
        ));
    }
}
