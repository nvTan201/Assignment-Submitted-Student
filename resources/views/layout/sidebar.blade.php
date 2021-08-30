<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{ asset('assets') }}/img/sidebar-1.jpg">
            <div class="logo">
                {{-- <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                   
                </a> --}}
                <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                    Assignment Submitted
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="{{ asset('assets') }}/img/faces/avatar.jpg" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>
                               Chào {{Session::get('lastNameStudent')}}
                                <b class="caret"></b>
                            </span>
                        </a>
                        <div class="clearfix"></div>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#">
                                        <span class="sidebar-mini"> MP </span>
                                        <span class="sidebar-normal"> My Profile </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sidebar-mini"> EP </span>
                                        <span class="sidebar-normal"> Edit Profile </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}">
                                        <span class="sidebar-mini"> S </span>
                                        <span class="sidebar-normal"> logout </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    
                 
                  <li>
                        <a href="{{ route('file.get-all-file') }}">
                            <i class="material-icons">apps</i>
                            <p> ExerciseFinish
                                <b class="caret"></b>
                            </p>
                        </a>
                        {{-- <div class="collapse" id="componentsExamples">
                            <ul class="nav">
                                <li>
                                    <a href="./components/buttons.html">
                                        <span class="sidebar-mini"> B </span>
                                        <span class="sidebar-normal"> Buttons </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./components/grid.html">
                                        <span class="sidebar-mini"> GS </span>
                                        <span class="sidebar-normal"> Grid System </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./components/panels.html">
                                        <span class="sidebar-mini"> P </span>
                                        <span class="sidebar-normal"> Panels </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./components/sweet-alert.html">
                                        <span class="sidebar-mini"> SA </span>
                                        <span class="sidebar-normal"> Sweet Alert </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./components/notifications.html">
                                        <span class="sidebar-mini"> N </span>
                                        <span class="sidebar-normal"> Notifications </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./components/icons.html">
                                        <span class="sidebar-mini"> I </span>
                                        <span class="sidebar-normal"> Icons </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./components/typography.html">
                                        <span class="sidebar-mini"> T </span>
                                        <span class="sidebar-normal"> Typography </span>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                    </li>
                    <li>
                        <a href="{{ route('Exercise.index') }}">
                            <i class="material-icons">content_paste</i>
                            <p> Exercise
                                <b class="caret"></b>
                            </p>
                        </a>
                       
                        
                    </li>
                    <li>
                        <a href="{{ route('Points.index') }}">
                            <i class="material-icons">content_paste</i>
                            <p> Xem điểm
                                <b class="caret"></b>
                            </p>
                        </a>
                    </li>
                   
                   
                    <li>
                        <a href="{{ route('calender.index') }}">
                            <i class="material-icons">date_range</i>
                            <p> Calendar </p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>