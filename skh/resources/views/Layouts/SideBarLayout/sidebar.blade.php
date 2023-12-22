<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SikhVille</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNine"
            aria-expanded="true" aria-controls="collapseNine">
            <i class="fas fa-fw fa-cog"></i>
            <span>Website Content</span>
        </a>
        <div id="collapseNine" class="collapse" aria-labelledby="headingtwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Website Content:</h6>
                <a class="collapse-item text-dark" href="{{ route('websitecontentlist') }}"
                    style="background-color: #30cf35; margin-bottom: 5px; font-weight: 700;">
                    Website Content
                </a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Games</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Games Components:</h6>
                <a class="collapse-item" href="{{ route('gamesfolder') }}">Games</a>
                <a class="collapse-item" href="{{ route('gamesCategories') }}">Games Categories</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
            aria-controls="collapseThree">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Video</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Video Components:</h6>
                <a class="collapse-item" href="{{ route('videofolder') }}">Video</a>
                <a class="collapse-item" href="{{ route('videoCategories') }}">Video Categories</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
            aria-controls="collapseFour">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Music</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Music Components:</h6>
                <a class="collapse-item" href="{{ route('musicfolder') }}">Music</a>
                <a class="collapse-item" href="{{ route('musicCategories') }}">Music Categories</a>
                <a class="collapse-item" href="{{ route('musicSong') }}">Music Song</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Download</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Download Components:</h6>
                <a class="collapse-item" href="{{ route('downloadfolder') }}">Download</a>
                <a class="collapse-item" href="{{ route('downloadCategories') }}">Download Categories</a>
            </div>
        </div>
    </li>
    <li class="nav-item mb-2">
        <a class="nav-link collapsed text-white " data-toggle="collapse" data-target="#collapseFive"
            aria-expanded="true" aria-controls="collapseFive">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Learning</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <h6 class="collapse-header text-dark ">Learning Components</h6>

                <a class="collapse-item text-dark" data-toggle="collapse" href="#musicComponents"
                    style="background-color: #f7d794; margin-bottom: 5px; font-weight: 700;">
                    Punjabi Reading Screen
                </a>
                <div class="collapse" id="musicComponents">
                    <a class="collapse-item  text-dark" href="{{ route('punjabireadingFolder') }}">Punjabi
                    </a>
                    <a class="collapse-item  text-dark" href="{{ route('punjabireadingCategories') }}">Punjabi
                        Categories</a>
                </div>

                <a class="collapse-item text-dark " data-toggle="collapse" href="#folderOne"
                    style="background-color: #f3a683; margin-bottom: 5px; font-weight: 700;">
                    Sentence Making Screen
                </a>
                <div class="collapse" id="folderOne">
                    <a class="collapse-item  text-dark" href="{{ route('sentancemakingFolder') }}">Sentence</a>
                    <a class="collapse-item  text-dark" href="{{ route('sentancemakingCategories') }}">Sentence
                        Categories</a>
                </div>

                <a class="collapse-item text-dark " data-toggle="collapse" href="#folderTwo"
                    style="background-color: #778beb; margin-bottom: 5px; font-weight: 700;">
                    Shabadkosh
                </a>
                <div class="collapse" id="folderTwo">
                    <a class="collapse-item  text-dark" href="{{ route('shabdkoshFolder') }}">Shabadkosh</a>
                </div>
            </div>
        </div>
    </li>
</ul>
