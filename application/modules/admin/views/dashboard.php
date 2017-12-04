
<div class="eight wide tablet four wide computer column">
    <div class="ui horizontal segments">
        <div class="ui inverted teal segment center aligned" style="width: 50%;">

            <div class="ui inverted statistic">
                <div class="value">
                    0
                </div>
                <div class="label">
                    <?php echo lang('plants_to_deliver'); ?>
                </div>
            </div>
        </div>
        <div class="ui inverted teal tertiary segment center aligned">
            <i class="huge leaf icon"></i>
        </div>
    </div>
</div>

<div class="eight wide tablet four wide computer column">
    <div class="ui horizontal segments">
        <div class="ui inverted red segment center aligned" style="width: 50%;">

            <div class="ui inverted statistic">
                <div class="value">
                    0
                </div>
                <div class="label">
                    <?php echo lang('comments_to_validate'); ?>
                </div>
            </div>
        </div>
        <div class="ui inverted red tertiary segment center aligned">
            <i class="huge comments icon"></i>
        </div>
    </div>
</div>

<div class="eight wide tablet four wide computer column">
    <div class="ui horizontal segments">
        <div class="ui inverted blue segment center aligned" style="width: 50%;">

            <div class="ui inverted statistic">
                <div class="value">
                    <?php echo number_format($users_count); ?>
                </div>
                <div class="label">
                    <?php echo lang('users'); ?>
                </div>
            </div>
        </div>
        <div class="ui inverted blue tertiary segment center aligned">
            <i class="huge users icon"></i>
        </div>
    </div>
</div>

<div class="eight wide tablet four wide computer column">
    <div class="ui horizontal segments">
        <div class="ui inverted green segment center aligned" style="width: 50%;">

            <div class="ui inverted statistic">
                <div class="value">
                    0
                </div>
                <div class="label">
                    <?php echo lang('subscribers'); ?>
                </div>
            </div>
        </div>
        <div class="ui inverted green tertiary segment center aligned">
            <i class="huge mail icon"></i>
        </div>
    </div>
</div>

</div><!-- close the first row (in admin_template) -->

<div class="row">

    <div class="four wide column">
        <div class="ui segments">
            <div class="ui segment">
                <h3 class="ui header">ChartJs Radar Chart</h3>
            </div>
            <div class="ui segment">
                <canvas id="radar"></canvas>
            </div>
        </div>
    </div>
    <div class="four wide column">
        <div class="ui segments">
            <div class="ui segment">
                <h3 class="ui header">ChartJs Pie Chart</h3>
            </div>
            <div class="ui segment">
                <canvas id="chart-area"></canvas>
            </div>
        </div>
    </div>
    <div class="four wide column">
        <div class="ui segments">
            <div class="ui segment">
                <h3 class="ui header">ChartJs Line Chart</h3>
            </div>
            <div class="ui segment">
                <canvas id="line-area"></canvas>
            </div>
        </div>
    </div>
    <div class="four wide column">
        <div class="ui segments">
            <div class="ui segment">
                <h3 class="ui header">ChartJs Bar Chart</h3>
            </div>
            <div class="ui segment">
                <canvas id="bar-area"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="eight wide column">
        <div class="ui segments">
            <div class="ui segment">
                <h3 class="ui header">ChartJs Pie Chart</h3>
            </div>
            <div class="ui segment">
                <canvas id="pie-area"></canvas>
            </div>
        </div>
    </div>
    <div class="eight wide column">
        <div class="ui segments">
            <div class="ui segment">
                <h3 class="ui header">ChartJs Donut Chart</h3>
            </div>
            <div class="ui segment">

                <canvas id="donut-area"></canvas>
            </div>
        </div>
    </div>

<!-- no need to close the last row (will be closed in admin_template) -->
