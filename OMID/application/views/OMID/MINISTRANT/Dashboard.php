<!-- START CONTENT -->

        <!--start container-->
        <div class="container">

            <!--card stats start-->
            <div id="card-stats">
                <div class="row">
                    <div class="col s12 m6 l3 right">
                        <div class="card">
                            <div class="card-content widget-green-1">
                                <p class="card-stats-title"><i class="mdi-social-group-add"></i>تعداد کل کارجویان</p>
                                <h4 class="card-stats-number">
                                    <?php $this->db->db_select('omidservice');
                                        echo $this->db->count_all('ministrantpersonalinfo')
                                    ?>
                                </h4>
                                <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 15% <span class="green-text text-lighten-5">از دیروز</span>
                                </p>
                            </div>
                            <!-- <div class="card-action  widget-green-1-2">
                                <div></div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col s12 m6 l3 right">
                        <div class="card">
                            <div class="card-content widget-darkblue-2">
                                <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>تعداد کل کارفرمایان</p>
                                <h4 class="card-stats-number">
                                    <?php $this->db->db_select('omidservice');
                                    echo $this->db->count_all('employerinfo');?>
                                </h4>
                                <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 70% <span class="purple-text text-lighten-5">اخیرا</span>
                                </p>
                            </div>
                            <!-- <div class="card-action widget-darkblue-2-2">
                                <div ></div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col s12 m6 l3 right">
                        <div class="card">
                            <div class="card-content widget-orange-4">
                                <p class="card-stats-title"><i class="mdi-action-trending-up"></i>درخواستهای همکاری</p>
                                <h4 class="card-stats-number">
                                    <?php
                                    $this->db->db_select('omidservice');
                                    $check	=	array(	'ReqDate' => date('Y-m-d') , 'Status' => '1' );
                                    $query = $this->db->get_where('servicerequests' , $check);
                                    $RequestToday		=	$query->num_rows();
                                    echo $RequestToday;
                                    ?>
                                </h4>
                                <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 80% <span class="blue-grey-text text-lighten-5">مجموع</span>
                                </p>
                            </div>
                            <!-- <div class="card-action widget-orange-4-2">
                                <div ></div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="card">
                            <div class="card-content widget-lightblue-1">
                                <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i> تعداد درخواست ها</p>
                                <h4 class="card-stats-number">1806</h4>
                                <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-down"></i> 3% <span class="deep-purple-text text-lighten-5">مجموع</span>
                                </p>
                            </div>
                            <!-- <div class="card-action  widget-lightblue-1-2">
                                <div ></div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!--card stats end-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->
        </div>
        <!--end container-->
    </section>
    <!-- END CONTENT -->
    <!-- LEFT RIGHT SIDEBAR NAV-->

