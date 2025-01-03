<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AchievementController extends Controller
{
    /**
     * Display a listing of the achievements.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search'); // Capture the search input from the request

        // Filter achievements based on user level and search query if provided
        $achievements = Achievement::when($user->level !== 'Admin', function ($query) use ($user) {
            // Extract sport category from user level if the user is not an Admin
            $sportCategory = str_replace('Pengurus Cabor ', '', $user->level);
            $query->where('sport_category', $sportCategory);
        })
            ->when($search, function ($query) use ($search) {
                // Apply search filter on sport category and athlete name fields
                $query->where(function ($query) use ($search) {
                    $query->where('sport_category', 'like', "%$search%")
                        ->orWhere('athlete_name', 'like', "%$search%");
                });
            })
            ->orderBy('created_at', 'asc') // Sort results by creation date in ascending order
            ->paginate(4); // Display 4 items per page

        // Fetch achievement counts per sport category, rank, and region_level
        $categories = Achievement::select('sport_category', 'rank', DB::raw('COUNT(*) as total'))
            ->groupBy('sport_category', 'rank')
            ->get();

        // Transform data into a format suitable for the chart
        $chartData = $categories->groupBy('sport_category')->map(function ($item) {
            $ranks = [
                'Juara 1' => 0,
                'Juara 2' => 0,
                'Juara 3' => 0,
            ];

            // Fill the counts for each rank
            foreach ($item as $entry) {
                $rank = $entry->rank;
                if (array_key_exists($rank, $ranks)) {
                    $ranks[$rank] = $entry->total;
                }
            }

            return $ranks;
        });

        // Fetch achievement counts per region_level for the pie chart
        $regionData = Achievement::select('region_level', DB::raw('COUNT(*) as total'))
            ->groupBy('region_level')
            ->get();

        // Pass the regionData to the view for rendering the pie chart
        return view('Prestasi.daftar', [
            'achievements' => $achievements,
            'search' => $search,
            'chartData' => $chartData,
            'regionData' => $regionData, // Pass region-level data to the view
        ]);
    }





    /**
     * Show the form for creating a new achievement.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Prestasi.tambah');
    }

    /**
     * Store a newly created achievement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'sport_category' => ['required', 'string'],
            'event_type' => ['required', 'string'],
            'athlete_name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'region_level' => ['required', 'string'],
            'rank' => ['required', 'string'],
            'certificate_date' => ['required', 'date'],
        ]);

        $achievement = new Achievement;
        $data['id'] = $achievement->generateId();

        Achievement::create($data);

        return redirect('/achievements')->with('message', 'Achievement successfully created!');
    }

    /**
     * Display the specified achievement.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $achievement = Achievement::findOrFail($id);
        return view('Achievement.show', compact('achievement'));
    }

    /**
     * Show the form for editing the specified achievement.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $achievement = Achievement::findOrFail($id);
        return view('Achievement.edit', compact('achievement'));
    }

    /**
     * Update the specified achievement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $achievement = Achievement::findOrFail($id);

        // Validate the incoming request
        $request->validate([
            'sport_category' => ['required', 'string'],
            'event_type' => ['required', 'string'],
            'athlete_name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'region_level' => ['required', 'string'],
            'rank' => ['required', 'string'],
            'certificate_date' => ['required', 'date'],
        ]);

        // Assign values from the request to the achievement model
        $achievement->sport_category = $request->sport_category;
        $achievement->event_type = $request->event_type;
        $achievement->athlete_name = $request->athlete_name;
        $achievement->description = $request->description;
        $achievement->region_level = $request->region_level;
        $achievement->rank = $request->rank;
        $achievement->certificate_date = $request->certificate_date;

        // Save the updated achievement data
        $achievement->save();

        return redirect()->back()->with('message', 'Achievement data successfully updated!');
    }

    /**
     * Remove the specified achievement from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();

        return redirect()->back()->with('message', 'Achievement data successfully deleted!');
    }

    public function cetakPrestasi()
    {
        $user = Auth::user(); // Get the authenticated user

        // Filter achievements based on user level
        $achievements = Achievement::when($user->level !== 'Admin', function ($query) use ($user) {
            // Extract sport category from user level if not an Admin
            $sportCategory = str_replace('Pengurus Cabor ', '', $user->level);
            $query->where('sport_category', $sportCategory);
        })
            ->orderBy('created_at', 'asc') // Sort results by creation date in ascending order
            ->get(); // Retrieve all results based on filtering

        return view('Prestasi.cetak-prestasi', compact('achievements'));
    }
    public function showPrestasi(Request $request)
    {
        $search = $request->input('search');
        $achievements = Achievement::when($search, function ($query, $search) {
            $query->where('athlete_name', 'like', "%$search%")
                ->orWhere('sport_category', 'like', "%$search%");
        })->paginate(8);

        // Fetch achievement counts per sport category, rank, and region_level
        $categories = Achievement::select('sport_category', 'rank', DB::raw('COUNT(*) as total'))
            ->groupBy('sport_category', 'rank')
            ->get();

        // Transform data into a format suitable for the chart
        $chartData = $categories->groupBy('sport_category')->map(function ($item) {
            $ranks = [
                'Juara 1' => 0,
                'Juara 2' => 0,
                'Juara 3' => 0,
            ];

            // Fill the counts for each rank
            foreach ($item as $entry) {
                $rank = $entry->rank;
                if (array_key_exists($rank, $ranks)) {
                    $ranks[$rank] = $entry->total;
                }
            }

            return $ranks;
        });

        return view('viewpublik.Galeri.prestasi', compact('achievements','chartData'));
    }
}
