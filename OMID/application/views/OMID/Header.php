<?php

$SessionData = $this->session->userdata('LoggedIn');

?>
<header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav class="z-depth-1" style="background-color: #055b7b">
            <div class="nav-wrapper">
                <h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1"><img src="<?php echo base_url() ?>/assets/images/omid.svg" style="width: 200px" alt="materialize logo"></a> <span class="logo-text">پورتال امید</span></h1>

                <ul class="left hide-on-med-and-down">
                    <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                    </li>
                    <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><i class="mdi-social-notifications">
                          <span class="lable-danger">
                            2
                          </span>
                            </i>
                        </a>
                    </li>
                    <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><i class="mdi-content-markunread">
                          <span class="lable-danger">
                            2
                          </span>
                            </i>
                        </a>
                    </li>
                    <!-- Dropdown Trigger -->
                    <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i>
                            <span class="lable2-danger">
                            2
                          </span>
                        </a>
                    </li>
                    <!-- navbar search -->
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light show-search"><i class="mdi-action-search"></i></a>
                    </li>
                    <li class="search-out">
                        <input type="text" class="search-out-text">
                    </li>

                </ul>
            </div>
        </nav>
    </div>
    <!-- end header nav-->
</header>


