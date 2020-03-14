<!-- / header section -->
<section id="menu">
    <div class="container">
        <div class="menu-area">
            <!-- Navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <!-- Left nav -->
                    <ul class="nav navbar-nav">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{route('category', ['id' => 1])}}">CD <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('category', ['id' => 6])}}">CD Classical</a></li>
                                <li><a href="{{route('category', ['id' => 7])}}">CD Pop</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('category', ['id' => 2])}}">DVD <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('category', ['id' => 8])}}">DVD Classical</a></li>
                                <li><a href="{{route('category', ['id' => 9])}}">DVD Pop</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('category', ['id' => 3])}}">Tape <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('category', ['id' => 10])}}">Tape Classical</a></li>
                                <li><a href="{{route('category', ['id' => 11])}}">Tape Pop</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('category', ['id' => 4])}}">Music Instruments</a></li>
                        <li><a href="{{route('category', ['id' => 5])}}">Live Shows</a></li>
                        <li><a href="/contact-us">Contact Us</a></li>
                        <li><a href="/about-us">About Us</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
</section>
