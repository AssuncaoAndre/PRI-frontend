<body>
    <script defer src="search.js"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">G49</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav position-absolute">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="openings.php">Openings</a>
                
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="players.php">Players</a>
            </li>
        </ul>

        <form class="form-inline mx-auto" action="/search.php" method="get">
            <input name="search" id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
           
        </form>
        <div id="search-results"></div>
    </div>
    </nav>
    <div id="page_content"></div>