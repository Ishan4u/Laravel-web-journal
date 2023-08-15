<x-layout>

    <!-- <============ Content section Starts ==========> -->
    <div class="h-container">
        <!-- <========= left-sidebar starts =========> -->
        <div class="left-sidebar">
            <div class="imp-links">
                {{-- <a href="/profile/{{ auth()->user()->username }}"><img style="border-radius: 20px;"
                        src="{{ auth()->user()->avatar }}"> My Profile</a> --}}
                <a class="{{Request::segment(1) == "" ? "active" : ""}}" href="/"><i class='fas fa-home imp-icon ' ></i> Home </a>
                <a class="{{Request::segment(1) == "feautured" ? "active" : ""}}" href="/feautured"><i class='fas fa-star imp-icon'  ></i>Feautured articles </a>
                <a href="/profile/{{auth()->user()->username}}/followers"><i class='fas fa-users imp-icon' ></i> Followers</a>
                <a href="/profile/{{auth()->user()->username}}/following"><i class='fas fa-user-plus imp-icon' ></i> Following</a>
                {{-- <a href="#"><img src="images/marketplace.png" > Marketplace</a> --}}
                {{-- <a href="#"><img src="images/news.png"> HNDIT</a> --}}
                <a href="#">See more</a>
            </div>

            
        </div>
        <!-- <========= left-sidebar ends =========> -->

        <!-- <========= main-content starts =========> -->
        <div class="main-content">

            {{$slot}}
        </div>
        <!-- <========= main-content ends =========> -->

        <!-- <========= right-sidebar starts =========> -->
        <div class="right-sidebar">

            <div class="shortcut-links">
                <p>Your reading list</p>
                <a href="#"><img src="images/shortcut-1.png">Web developers</a>
                <a href="#"><img src="images/shortcut-2.png">Web design course</a>
                <a href="#"><img src="images/shortcut-3.png">Full stack development </a>
                <a href="#"><img src="images/shortcut-4.png">Web developers</a>
            </div>


        </div>
        <!-- <========= right-sidebar ends =========> -->

    </div>
    <!-- <============ Content section Starts ==========> -->

</x-layout>
