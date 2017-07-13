<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation highlight">
        <li class="user-details">
            <div class="row">

                <!-- this is for Personal Avatar photo -->
                <?php
                $this->db->db_select('omidservice');
                $this->db->where("Email", $SessionData['Email']);
                $Ministrant = $this->db->get("ministrantpersonalinfo")->result();
                $ImageAddress='avatar.jpg';
                foreach ($Ministrant as $row)
                {
                    if($row->ImageName)
                        $ImageAddress= 'Ministrant/'.$SessionData['UserId'].'/Personal/'.$row->ImageName;
                }
                ?>
                <!-- End Avatar -->

                <div class="col col s4 m4 l4">
                    <img src="<?php echo base_url();?>assets/images/<?php echo $ImageAddress;?>" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="<?php echo base_url() ?>index.php/<?php echo $SessionData['PersonTypeId'];?>/manage_profile"><i class="mdi-action-face-unlock"></i> پروفایل</a>
                        </li>
                        <li><a href="#"><i class="mdi-action-settings"></i> تنظیمات</a>
                        </li>
                        <li><a href="#"><i class="mdi-communication-live-help"></i> راهنما</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="mdi-action-lock-outline"></i> بسته شدن</a>
                        </li>
                        <li><a href="<?php echo base_url();?>index.php/Login/Logout"><i class="mdi-hardware-keyboard-tab"></i> خروج</a>
                        </li>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light profile-btn" href="#" data-activates="profile-dropdown">
                        <?php if($SessionData['PersonTypeId']=='MINISTRANT') echo 'کارجو';
                        elseif($SessionData['PersonTypeId']=='EMPLOYER') echo 'کارفرما';
                        ?>
                        <i class="mdi-navigation-arrow-drop-down left"></i></a>
                    <p class="user-roal">
                        <?php echo $SessionData['Email'] ?>
                    </p>
                    <a style="display: inline-block;;padding: 0 2px" href="#" class="waves-effect waves-blue-grey darken-3 btn-flat red-text text-darken-1"><i class="mdi-action-settings-power" style="font-size: 18px"></i></a>
                    <a style="display: inline-block;;padding: 0 2px" href="#" class="waves-effect waves-blue-grey darken-3 btn-flat"><i class="mdi-communication-forum" style="font-size: 18px"></i></a>
                    <a style="display: inline-block;;padding: 0 2px" href="#" class="waves-effect waves-blue-grey darken-3 btn-flat grey-text text-lighten-1"><i class="mdi-communication-email" style="font-size: 18px"></i></a>
                </div>
            </div>

        </li>

        <li class="bold"><a href="<?php echo base_url();?>index.php/MINISTRANT/Dashboard" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>داشبورد کاربری</a>
        </li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li class="bold">
                    <a class="collapsible-header waves-effect waves-cyan">
                        <i class="mdi-action-invert-colors"></i> اطلاعات کاربری
                        <i class="mdi-hardware-keyboard-arrow-down left" style="font-size: 20px">
                        </i>
                    </a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="<?php echo base_url();?>index.php/Ministrant/PersonalInfo">اطلاعات فردی</a>
                            </li>
                            <li><a href="<?php echo base_url();?>index.php/Ministrant/ContactInfo">اطلاعات تماس</a>
                            </li>
                            <li><a href="<?php echo base_url();?>index.php/Ministrant/JobExperiencesInfo">تجربیات شغلی</a>
                            </li>
                            <li><a href="<?php echo base_url();?>index.php/Ministrant/EducationalInfo">اطلاعات تحصیلی</a>
                            </li>
                            <li><a href="<?php echo base_url();?>index.php/Ministrant/Capabilities">توانمندی ها</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="bold">
                    <a href="<?php echo base_url();?>index.php//Ministrant/MySkills" class="waves-effect waves-cyan">
                        <i class="mdi-editor-insert-invitation"></i> مهارت های من
                    </a>
                </li>
                <li class="bold">
                    <a href="<?php echo base_url();?>index.php//Ministrant/CooperationRequests" class="waves-effect waves-cyan">
                        <i class="mdi-editor-insert-invitation"></i>درخواست همکاری با من
                    </a>
                </li>
                <li class="bold">
                    <a href="app-calendar.html" class="waves-effect waves-cyan">
                        <i class="mdi-editor-insert-invitation"></i>علاقه مندی ها
                    </a>
                </li>
                <li class="bold">
                    <a href="app-calendar.html" class="waves-effect waves-cyan">
                        <i class="mdi-editor-insert-invitation"></i>معرفی به دوستان
                    </a>
                </li>
                <li class="bold">
                    <a href="app-calendar.html" class="waves-effect waves-cyan">
                        <i class="mdi-editor-insert-invitation"></i>
                        <span class="new badge left" data-badge-caption="جدید" style="position: relative;right: 0 !important; ">۴
                                    </span>لغو عضویت
                    </a>
                </li>
                <li class="bold">
                    <a href="app-widget.html" class="waves-effect waves-cyan">
                        <i class="mdi-device-now-widgets"></i>
                        <span class="new badge left" data-badge-caption="دانلود" style="position: relative;right: 0 !important;background-color: #ff7171 ">۲
                                    </span>امار دانلود رزومه
                    </a>
                </li>
            </ul>
        <li class="li-hover"><div class="divider"></div></li>
        <li class="li-hover"><p class="ultra-small margin center">درصد پیشرفت رزومه</p></li>
        <li class="li-hover">
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="sample-chart-wrapper">
                        <!-- <div class="ct-chart ct-golden-section" id="ct2-chart"></div> -->
                        <div class="center small" id="bluecircle" data-percent="78">
                        </div>
                    </div>
                    <a class="waves-effect waves-teal btn-flat center modal-trigger" href="#modal1">راهنما</a>
                </div>

            </div>
        </li>
    </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light btn-flat hide-on-large-only right"><i class="mdi-navigation-menu text-white" ></i></a>

</aside>
