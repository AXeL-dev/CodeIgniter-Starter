
        Built With <i class="heart icon red"></i> By AXeL
        <div class="ui right floated colorize button"><i class="icon red paint brush"></i></div>
            <div class="ui flowing popup top left transition hidden">
                <div class="ui two column divided center padded aligned grid">
                    <div class="column">
                        <h4 class="ui header"><?php echo lang('navbar_color'); ?></h4>

                        <ul class="colorlist">
                            <?php $this->load->view('parts/colorlist'); ?>
                        </ul>
                    </div>
                    <div class="column">
                        <h4 class="ui header"><?php echo lang('sidebar_color'); ?></h4>

                        <ul class="sidecolor">
                            <?php $this->load->view('parts/colorlist'); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
