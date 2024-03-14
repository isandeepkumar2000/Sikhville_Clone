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

    <!-- Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span style="color: #ffffff;">Dashboard</span></a>
    </li>

    <!-- Website Content -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
            <i class="fas fa-cog"></i>
            <span style="color: #ffffff;">Website Content</span>
        </a>
        <div id="collapseNine" class="collapse" aria-labelledby="headingtwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header" style="color: #000000;">Website Content:</h6>
                <a class="collapse-item" href="{{ route('websitecontentlist') }}">
                    Website Content
                </a>
            </div>
        </div>
    </li>

    <!-- Homepage Slider -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwenty" aria-expanded="true" aria-controls="collapseTwenty">
            <i class="fas fa-chart-area"></i>
            <span style="color: #ffffff;">HomePage Slider Screen</span>
        </a>
        <div id="collapseTwenty" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header" style="color: #000000;">ImageSlider Components:</h6>
                <a class="collapse-item" href="{{ route('homepage_imageslider_route') }}">Image Slider</a>
            </div>
        </div>
    </li>

    <!-- Games -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-gamepad"></i>
            <span style="color: #ffffff;">Games</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header" style="color: #000000;">Games Components:</h6>
                <a class="collapse-item" href="{{ route('gamesfolder') }}">Games</a>
                <a class="collapse-item" href="{{ route('gamesCategories') }}">Games Category</a>
            </div>
        </div>
    </li>

    <!-- Video -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-video"></i>
            <span style="color: #ffffff;">Video</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header" style="color: #000000;">Video Components:</h6>
                <a class="collapse-item" href="{{ route('videofolder') }}">Video</a>
                <a class="collapse-item" href="{{ route('videoCategories') }}">Video Category</a>
            </div>
        </div>
    </li>

    <!-- Music -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
            <i class="fas fa-music"></i>
            <span style="color: #ffffff;">Music</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header" style="color: #000000;">Music Components:</h6>
                <a class="collapse-item" href="{{ route('musicfolder') }}">Music</a>
                <a class="collapse-item" href="{{ route('musicCategories') }}">Music Category</a>
                <a class="collapse-item" href="{{ route('musicSong') }}">Music Song</a>
            </div>
        </div>
    </li>

    <!-- Download -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-download"></i>
            <span style="color: #ffffff;">Download</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header" style="color: #000000;">Download Components:</h6>
                <a class="collapse-item" href="{{ route('downloadfolder') }}">Download</a>
                <a class="collapse-item" href="{{ route('downloadCategories') }}">Download Category</a>
            </div>
        </div>
    </li>

    <!-- Learning -->
    <li class="nav-item mb-2">
        <a class="nav-link collapsed text-white" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
            <i class="fas fa-graduation-cap"></i>
            <span style="color: #ffffff;">Learning</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-light py-2 collapse-inner rounded">
                <h6 class="collapse-header text-dark" style="color: #000000;">Learning Components</h6>

                <!-- Punjabi Reading -->
                <a class="collapse-item text-dark" data-toggle="collapse" href="#musicComponents" style="background-color: #f7d794;">
                    Punjabi Reading Screen
                </a>
                <div class="collapse" id="musicComponents">
                    <a class="collapse-item text-dark" href="{{ route('punjabireadingFolder') }}">Punjabi</a>
                    <a class="collapse-item text-dark" href="{{ route('punjabireadingCategories') }}">Punjabi
                        Category</a>
                </div>

                <!-- Sentence Making -->
                <a class="collapse-item text-dark" data-toggle="collapse" href="#folderOne" style="background-color: #f3a683;">
                    Sentence Making Screen
                </a>
                <div class="collapse" id="folderOne">
                  
                    <a class="collapse-item text-dark" href="{{ route('sentancemakingCategories') }}">Sentence
                        Category</a>
                </div>

                <!-- Shabadkosh -->
                <a class="collapse-item text-dark" data-toggle="collapse" href="#folderTwo" style="background-color: #778beb;">
                    Shabadkosh
                </a>
                <div class="collapse" id="folderTwo">
                    <a class="collapse-item text-dark" href="{{ route('shabdkoshFolder') }}">Shabadkosh</a>
                </div>
            </div>
        </div>
    </li>
</ul>
