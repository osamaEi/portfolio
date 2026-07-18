<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\Testimonial;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::ordered()->get();
        $skills = Skill::ordered()->get()->groupBy('category');
        $experiences = Experience::ordered()->get();
        $testimonials = Testimonial::ordered()->get();
        $settings = Setting::all_values();

        return view('portfolio.index', compact('projects', 'skills', 'experiences', 'testimonials', 'settings'));
    }

    public function project(Project $project)
    {
        return view('portfolio.project', compact('project'));
    }
}
