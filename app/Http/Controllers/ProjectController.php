<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    protected $project_mdl;
    
    public function __construct(Project $project_mdl) {
        $this->project_mdl = $project_mdl;
    }
    
    public function index(){
        
    }
}
